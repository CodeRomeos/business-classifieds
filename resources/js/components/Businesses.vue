<template>
	<div class="businesses">
		<!-- <sidebar class='filter-sidebar'>
			<h2>Sidebar</h2>
			<div class="input-container">
				<input type='text' class='input-field'>
			</div>
		</sidebar> -->
		<section class="bg-primary py-3">
			<div class="container text-white text-center py-3">
				<div class='h2 text-white'><strong>Lorem ipsum dolor sit.</strong></div>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, eveniet consectetur. Dolorum!</p>

				<form @submit.prevent="fetchBusinesses()">
				<div class="business-search-form mt-5 text-dark text-left">
					<div class="input-container">
						<input type='text' class="input-field" value="" v-model="searchParams.keyword" placeholder="Search for...">
					</div>
					<div class="input-container">
						<select2 class="input-field" :options="cities" v-model="searchParams.city">
							<option value=''>Select city</option>
							<option v-for='(city, index) in cities' :key='index' :value='city.slug'>{{ city.city_and_state_name }}</option>
						</select2>
					</div>
					<div class="input-container">
						<button type='submit' class="btn btn-primary btn-block"><i class='icon-magnifier icons'></i> Search</button>
					</div>
				</div>
				</form>
			</div>
		</section>
        <div class='text-center' v-if='loading'>
            <img src='/images/loader.gif'>
        </div>
        <div class='business-cards container my-3' v-else>
			<span v-show="businesses.length == 0">No result found!</span>
			<business-card v-for="(business, index) in businesses" :key="index" :business="business"></business-card>
		</div>
        <pagination class='container' v-if='!loading' :pagedata='pagination' @fetchNext='fetchBusinesses(pagination.nextPageUrl)' @fetchPrevious='fetchBusinesses(pagination.previousPageUrl)'></pagination>
	</div>
</template>

<script>
import { mapGetters } from 'vuex';
import BusinessCard from './partials/BusinessCard';
import Sidebar from './partials/Sidebar';
import Pagination from './partials/Pagination';
import Select2 from './partials/Select2';

export default {
	name: 'businesses',
	created() {
		this.fetchBusinesses();
	},
	components: {
		BusinessCard,
        Sidebar,
		Pagination,
		Select2
	},
	data() {
		return {
			loading: false,
            businesses: [],
			pagination: {},
			searchParams: {
				keyword: "",
				city: ""
			}
		}
	},
	computed: {
		...mapGetters([
			'cities'
		])
	},
	methods: {
		fetchBusinesses(url) {
            if(!url)
            {
                url = '/spa/businesses';
            }
			this.loading = true;
			var params = this.searchParams;

			axios.get(url, {params: params}).then(response => {
				this.loading = false;
				this.businesses = response.data.data.businesses;
				this.pagination = response.data.pagination;
			});
		}
	}
}
</script>


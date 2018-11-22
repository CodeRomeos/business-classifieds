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
				<div class="business-search-form mt-5 text-dark">
					<div class="input-container">
						<input type='text' class="input-field" value="" v-model="searchParams.keyword" placeholder="Search for...">
					</div>
					<div class="input-container">
						<select name="" id="" class="input-field" v-model="searchParams.city" aria-placeholder="City">
							<option value="">Select city...</option>
							<option :value="city" v-for='(city, index) in cities' :key="index">{{ city }}</option>
						</select>
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
import BusinessCard from './partials/BusinessCard';
import Sidebar from './partials/Sidebar.vue';
import Pagination from './partials/Pagination.vue';

export default {
	name: 'businesses',
	created() {
		this.fetchCities();
		this.fetchBusinesses();
	},
	components: {
		BusinessCard,
        Sidebar,
        Pagination
	},
	data() {
		return {
			loading: false,
            businesses: [],
			pagination: {},
			searchParams: {
				keyword: "",
				city: ""
			},
			cities: []
		}
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
		},
		fetchCities() {
			axios.get('/spa/businesses/cities').then(response => {
				this.cities = response.data.data.cities;
			});
		}
	}
}
</script>


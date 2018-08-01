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

				<div class="business-search-form mt-5 text-dark">
					<div class="input-container">
						<select name="" id="" class="input-field">
							<option value="">Search for ...</option>
						</select>
					</div>
					<div class="input-container">
						<select name="" id="" class="input-field">
							<option value="">City</option>
						</select>
					</div>
					<div class="input-container">
						<button class="btn btn-primary btn-block"><i class='icon-magnifier icons'></i> Search</button>
					</div>
				</div>
			</div>
		</section>
        <div class='business-cards container my-3'>
			<div class='text-center' v-if='loading'>
				<img src='/images/loader.gif'>
			</div>
			<business-card v-else v-for="(business, index) in businesses" :key="index" :business="business"></business-card>
		</div>
	</div>
</template>

<script>
import BusinessCard from './partials/BusinessCard';
import Sidebar from './partials/Sidebar.vue';

export default {
	name: 'businesses',
	created() {
		this.fetchBusinesses();
	},
	components: {
		BusinessCard,
		Sidebar
	},
	data() {
		return {
			loading: false,
			businesses: []
		}
	},
	methods: {
		fetchBusinesses() {
			this.loading = true;
			axios.get('/api/v1/businesses').then(response => {
				this.loading = false;
				this.businesses = response.data.data.businesses;
			});
		}
	}
}
</script>


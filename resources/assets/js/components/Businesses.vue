<template>
	<div class="businesses">
		<sidebar class='filter-sidebar'>
			<h2>Sidebar</h2>
			<div class="input-container">
				<input type='text' class='input-field'>
			</div>
		</sidebar>
        <div class='business-cards'>
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


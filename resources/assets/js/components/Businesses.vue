<template>
	<div class="businesses">
		<business-card v-for="(business, index) in businesses" :key="index" :business="business"></business-card>
	</div>
</template>

<script>
import BusinessCard from './partials/business-card';
export default {
	name: 'businesses',
	created() {
		this.fetchBusinesses();
	},
	components: {
		BusinessCard
	},
	data() {
		return {
			businesses: []
		}
	},
	methods: {
		fetchBusinesses() {
			axios.get('/api/v1/businesses').then(response => {
				this.businesses = response.data.data.businesses;
			});
		}
	}
}
</script>


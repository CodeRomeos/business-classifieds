<template>
	<div class="businesses">
		<div class='text-center' v-if='loading'>
			<img src='/images/loader.gif'>
		</div>
		<business-card v-else v-for="(business, index) in businesses" :key="index" :business="business"></business-card>
	</div>
</template>

<script>
import BusinessCard from './partials/BusinessCard';
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


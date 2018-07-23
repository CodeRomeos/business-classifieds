<template>
	<div class="card mb-2" v-if="business">
		<div class="card-body">
			<h3 class="card-title">{{ business.title }}</h3>
			<div class="card-text">
				{{ business.body }}
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: 'business',
	mounted() {
		this.fetchBusiness();
	},
	data() {
		return {
			business: null
		}
	},
	methods: {
		fetchBusiness() {
			var businessId = this.$route.params.businessid
			axios.get('/api/v1/businesses/' + businessId).then(response => {
				this.business = response.data.data;
			});
		}
	}
}
</script>

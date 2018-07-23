<template>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-10 offset-md-1">
			<div class="card mb-2" v-if="business">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<img :src="business.image" style='width: 100%'>
						</div>
						<div class="col-md-9">
							<h3 class="card-title"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h3>
							<div class="card-text">
								<p>
									{{ business.contacts.join() }}
									<br>
									{{ business.address }}
								</p>
								{{ business.body }}
							</div>
						</div>
					</div>

				</div>
			</div>
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
				document.title = this.business.title;
			});
		}
	}
}
</script>

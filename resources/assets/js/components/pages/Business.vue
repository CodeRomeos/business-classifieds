<template>
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
			<div class="card business-card mb-4" v-if='business'>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img :src="business.image" style='width: 100%'>
                        </div>
                        <div class="col-md-6">
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

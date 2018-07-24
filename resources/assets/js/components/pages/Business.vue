<template>
    <div class="listings-page-container">
        <div>laksdj</div>
            <div class="card business-card mb-2" v-if='business'>
                <div class="crad-thumb">
                    <img :src="business.image" style='width: 100%'>
                </div>
                <div class="card-body">
                    <h3 class="card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h3>
                    <div class="card-text">
                        <p>
                            {{ business.contacts.join() }}
                            <br>
                            {{ business.address }}
                        </p>
                        {{ business.body }}
                        <p class='mt-2'>
                        <router-link class='btn btn-primary' :to="{ name: 'business', params: { businessid: business.businessid }}">Show</router-link>
                        </p>
                    </div>
                </div>
            </div>
        <div>laksdj</div>
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

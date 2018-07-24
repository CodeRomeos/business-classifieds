<template>
    <div class="listings-page-container" v-if='business'>
        <div style='background: #1e2c33' class='page-grid-item-1'></div>
        <div style='background: #ddd' class='pl-2 page-grid-item-2'><h2>{{ business.title }}</h2></div>
        <div style='background: #eee' class='page-grid-item-3'></div>

        <div style='background: rgb(38, 55, 64)' class='page-grid-item-4'></div>
        <div style='background: #555' class='page-grid-item-5'></div>
        <div style='background: rgb(38, 55, 64)' class='page-grid-item-6'></div>
        <div style='background: #1e2c33' class='page-grid-item-7'></div>
        <div class='page-grid-item-8'>
		    <div class="card business-card mb-2">
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
        </div>
        <div class='page-grid-item-9'>laksdj</div>
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

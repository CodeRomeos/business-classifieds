<template>
    <div class='card'>
        <p>Create your free business page.</p>
		<form @submit.prevent="postBusinessForm">

		</form>
    </div>
</template>

<script>
export default {
	name: "user-business",
	created() {
		this.fetchbusiness()
	},
	data() {
		return {
			business: {},
			notCreated: false
		}
	},
	methods: {
		fetchbusiness() {
			axios.get('/spa/user/business')
				.then(response => {
					if(response.data.notCreated) {
						this.notCreated = true
					}
					else {
						this.business = response.data.business
					}
				})
				.catch(error => {

				});
		},
		postBusinessForm() {
			var url = '/spa/user/business/update'
			if(this.notCreated) {
				var url = '/spa/user/business/create'
			}

			axios.post(url)
				.then(response => {
					console.log(response);
				})
				.catch(error => {
					console.log(error);
				})
		}
	}
}
</script>


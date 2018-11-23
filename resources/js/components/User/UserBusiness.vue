<template>
    <div class='card'>
		<h3 class='my-0'>My Business Page</h3>
        <p>Create your free business page.</p>
		<form @submit.prevent="postBusinessForm">
			<div class="grid-col-1-2">
				<label for="">Name</label>
				<div class="input-container">
					<input type='text' class="input-field" value="">
				</div>
				<label for="">Name</label>
				<div class="input-container">
					<input type='text' class="input-field" value="">
				</div>
				<label for="">Name</label>
				<div class="input-container">
					<input type='text' class="input-field" value="">
				</div>
				<label for="">Name</label>
				<div class="input-container">
					<input type='text' class="input-field" value="">
				</div>
			</div>

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

<style scoped>
form {
	max-width: 500px;
}
</style>

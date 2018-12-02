<template>
    <div id='user-business' class='card'>
        <h3 class='page-heading'>My Business Page <small>Create your free business page.</small></h3>
        <form @submit.prevent="postBusinessForm" class='mt-4'>
            <div class="grid-col-1-2">
                <label for="">Title</label>
                <div class="input-container">
                    <input type='text' class="input-field" value="" v-model="business.title">
                </div>
                <label for="">Body</label>
                <div class="input-container">
                    <input type='text' class="input-field" value="" v-model="business.body">
                </div>
                <label for="">Contacts</label>
                <div class="input-container">
                    <input type='text' class="input-field" value="" v-model="business.contacts">
                </div>
                <label for="">City</label>
                <div class="input-container">
                    <input type='text' class="input-field" value="" v-model="business.city">
                </div>
                <label for="">Address</label>
                <div class="input-container">
                    <input type='text' class="input-field" value="" v-model="business.address">
                </div>
                <label for="">Emails</label>
                <div class="input-container">
                    <input type='text' class="input-field" value="" v-model="business.emails">
                </div>
                <div class="input-container">
                    <button type='submit' class='btn btn-primary'>Submit</button>
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

            var params = {
                title: this.business.title,
                body: this.business.body,
                contacts: this.business.contacts,
                emails: this.business.emails,
                address: this.business.address,
                emails: this.business.emails
            }

			axios.post(url, {params: params})
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

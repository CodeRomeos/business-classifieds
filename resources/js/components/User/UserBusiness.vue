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
					<textarea class='input-field' v-model="business.body" rows='4'></textarea>
                </div>
                <label for="">Contacts</label>
                <div class="input-container">
					<div class='input-btn-group mb-1' v-for="(contact, index) in business.contacts" :key="index">
                    	<input type='text' class="input-field" value="" v-model="business.contacts[index]">
						<button type='button' class='btn btn-danger' @click="business.contacts.splice(index, 1)"><span class='fa fa-times'></span></button>
					</div>
					<button type='button' class='btn' @click="business.contacts.push('')"><span class='fa fa-plus'></span></button>
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
					<div class="input-btn-group mb-1" v-for="(email, index) in business.emails" :key="index">
                    	<input type='text' class="input-field" value="" v-model="business.emails[index]">
						<button type='button' class='btn btn-danger' @click="business.emails.splice(index, 1)"><span class='fa fa-times'></span></button>
					</div>
					<button type='button' class='btn' @click="business.emails.push('')"><span class='fa fa-plus'></span></button>
                </div>
				<div></div>
                <div class="input-container">
                    <button type='submit' class='btn btn-primary' :disabled='updating'>
						<span class='fa fa-save fa-fw'></span> Submit
					</button>
					<span v-if='updating'><span class='fa fa-spinner fa-spin'></span></span>
					<span v-if='message'>{{ message }}</span>
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
			notCreated: false,
			updating: false,
			message: null
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
						this.business.contacts = JSON.parse(this.business.contacts);
						this.business.emails = JSON.parse(this.business.emails);
					}
				})
				.catch(error => {

				});
		},
		postBusinessForm() {
			this.updating = true;
			var url = '/spa/user/business/' + this.business.id + '/update'
			if(this.notCreated) {
				var url = '/spa/user/business/create'
            }

            var params = {
                title: this.business.title,
                body: this.business.body,
                contacts: this.business.contacts,
                city: this.business.city,
                emails: this.business.emails,
                address: this.business.address,
                emails: this.business.emails
            }

			axios.post(url, params)
				.then(response => {
					this.updating = false;
					this.business = response.data.business;
					this.message = 'Updated successfully!'
				})
				.catch(error => {
					this.updating = false;
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

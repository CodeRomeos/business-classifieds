<template>
    <div id='user-business' class='card'>
        <h3 class='page-heading'>My Business Page <small>Create your free business page.</small></h3>
        <form @submit.prevent="postBusinessForm" class='mt-4' v-if='loadingForm'>
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
                <label for="">Cities</label>
                <div class="input-container">
                    <!-- <input type='text' class="input-field" :class="{ 'is-invalid': errors.city}" value="" v-model="business.city"> -->
                    <select2 class='input-field' multiple v-model='businessCities'>
						<option v-for='(city, index) in cities' :key='index' :value='city.slug'>{{ city.city_and_state_name }}</option>
                    </select2>
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
					<span v-if='updateMessage && !updating'>{{ updateMessage }}</span>
                </div>
            </div>

        </form>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Select2 from '../partials/Select2'

export default {
	name: "user-business",
    components: {
        Select2
    },

	created() {
		this.fetchbusiness()
	},
	data() {
		return {
			business: {},
            businessCities: [],
			notCreated: false,
			updating: false,
			updateMessage: null,
			errors: {},
			loadingForm: false
		}
	},
    computed: {
        ...mapGetters([
            'cities'
        ])
    },
	watch: {
		updateMessage() {
			setTimeout(function() {
				this.updateMessage = null;
			}.bind(this), 3000)
		},
		business(business) {
			business.cities.forEach(city => {
				this.businessCities.push(city.slug);
			});
		}
	},
	methods: {
		fetchbusiness() {
			this.loadingForm = false;
			axios.get('/spa/user/business')
				.then(response => {
					if(response.data.notCreated) {
						this.notCreated = true
					}
					else {
						this.business = response.data.business
						this.loadingForm = true;
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
                cities: this.businessCities,
                emails: this.business.emails,
                address: this.business.address,
                emails: this.business.emails
            }

			axios.post(url, params)
				.then(response => {
					this.updating = false;
					this.business = response.data.business;
					this.updateMessage = 'Updated successfully!'
				})
				.catch(error => {
					this.updating = false;
					//console.log(error.request);
					this.errors = error.response.data.errors
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

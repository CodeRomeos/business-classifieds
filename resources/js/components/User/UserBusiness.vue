<template>
    <div id='user-business' class='card'>
        <h3 class='page-heading'>My Business Page <small>Create your free business page.</small></h3>
        <form @submit.prevent="postBusinessForm" class='grid-col-2 my-4' enctype="multipart/form-data">
            <div class="grid-col-1-2">
                <label for="">Title</label>
                <div class="input-container">
                    <input type='text' class="input-field" value="" v-model="business.title">
                </div>
                <label for="">Image</label>
                <div class="input-container">
                    <image-input :src='imageUrl' @imageFileChange='imageFile = $event' @imageUrlChange='imageUrl = $event' @imageRemoved='removeImage = $event'></image-input>
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
            <div>
                <label for="">Keywords</label>
                <div class="input-container">
                    <select2 class='input-field' tags='true' multiple v-model='businessKeywords'>
						<option v-for='(keyword, index) in keywords' :key='index' :value='keyword.slug'>{{ keyword.title }}</option>
                    </select2>
                </div>
            </div>
        </form>

        <user-business-services :business='business' :services='business.services'>
            <h4 class="h4">Services</h4>
        </user-business-services>
        <user-business-products :business='business' :products='business.products'>
            <h4 class="h4">Products</h4>
        </user-business-products>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Select2 from '../partials/Select2'
import UserBusinessServices from './BusinessServices'
import UserBusinessProducts from './BusinessProducts'
import ImageInput from '../partials/ImageInput'

export default {
	name: "user-business",
    components: {
        Select2,
        UserBusinessServices,
        UserBusinessProducts,
        ImageInput
    },

	mounted() {
        this.fetchKeywords()
        this.fetchbusiness()
    },
	data() {
		return {
            business: {},
            keywords: [],
            businessCities: [],
            businessKeywords: [],
			notCreated: false,
			updating: false,
			updateMessage: null,
			errors: {},
            loadingForm: false,
            imageFile: null,
			imageUrl: null,
			removeImage: false
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
            this.imageUrl = this.business.image
			business.cities.forEach(city => {
				this.businessCities.push(city.slug);
            });

            business.keywords.forEach(keyword => {
				this.businessKeywords.push(keyword.slug);
            });

		}
	},
	methods: {
        fetchKeywords() {
            axios.get('/spa/keywords')
                .then(response => {
                    this.keywords = response.data.keywords
                })
        },
		fetchbusiness() {
			this.loadingForm = false;
			axios.get('/spa/user/business')
				.then(response => {
					if(response.data.notCreated) {
						this.notCreated = true
					}
					else {
                        this.loadingForm = true;
                        this.business = response.data.business
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

            const formData = new FormData()
			var image = this.business.image ? this.business.image : ""

			if(this.imageFile) {
				image = this.imageFile
			}

			if(this.removeImage) {
				image = ""
				formData.append('remove_image', true)
			}

            formData.append('image', image)
            formData.append('title', this.business.title)
            formData.append('body', this.business.body)
            formData.append('contacts', JSON.stringify(this.business.contacts))
            formData.append('cities', this.businessCities)
            formData.append('emails', JSON.stringify(this.business.emails))
            formData.append('address', this.business.address)
            formData.append('keywords', this.businessKeywords)


            // var params = {
            //     title: this.business.title,
            //     body: this.business.body,
            //     contacts: this.business.contacts,
            //     cities: this.businessCities,
            //     emails: this.business.emails,
            //     address: this.business.address,
            //     emails: this.business.emails
            // }

			axios.post(url, formData)
				.then(response => {
					this.updating = false;
					this.business = response.data.business;
                    this.updateMessage = 'Updated successfully!'
                    this.$store.commit('alert', { message: 'Updated successfully!', type: 'success' })
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

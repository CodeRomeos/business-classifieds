<template>
    <div class="serviceProductInputCard">
        <form @submit.prevent="save" enctype="multipart/form-data">
			<image-input :src='imageUrl' @imageFileChange='imageFile = $event' @imageUrlChange='imageUrl = $event' @imageRemoved='removeImage = $event'></image-input>
            <div class="input-container">
                <input type='text' class="input-field" value="" v-model="model.name" placeholder="Name">
            </div>
            <div class="input-container">
                <textarea class='input-field' v-model="model.description" rows='4' placeholder="Description"></textarea>
            </div>
            <div class="input-container">
                <button type='submit' class='btn btn-primary'>
					<template v-if='saving'><i class='fa fa-spinner fa-spin'></i> Saving</template>
					<template v-else><span class='fa fa-save'></span> Save</template>
				</button>
            </div>
        </form>
    </div>
</template>

<script>

import ImageInput from '../partials/ImageInput'

export default {
	name: 'service-product-input-card',
	components: {
		ImageInput
	},
    props: {
        model: { required: true },
        modelType: {
            required: true,
            validator: function(value) {
                return ['service', 'product'].indexOf(value) !== -1
            }
        },
        business: { required: true }
    },
    mounted() {
        this.imageUrl = this.model.image
    },
    data() {
        return {
            imageFile: null,
			imageUrl: null,
			saving: false,
			removeImage: false
        }
	},
	watch: {
		saving(value) {
			if(value == true) {
				setTimeout(function() {
					this.saving = false
				}.bind(this), 3000)
			}
		},
        model() {
            this.imageUrl = this.model.image
        }
	},
    computed: {
        actionUrl() {
            var url = '/spa/user/business/' + this.business.id + '/' + this.modelType
            if(this.model.hasOwnProperty('id')) {
                return  url + '/' + this.model.id + '/update'
            } else {
                return  url + '/create'
            }
        }
    },
    methods: {
        save() {
			this.saving = true
            const formData = new FormData()
			var image = this.model.image ? this.model.image : ""

			if(this.imageFile) {
				image = this.imageFile
			}

			if(this.removeImage) {
				image = ""
				formData.append('remove_image', true)
			}

            formData.append('image', image)
            formData.append('name', this.model.name)
            formData.append('description', this.model.description)
            axios.post(this.actionUrl, formData)
                .then(response => {
					this.saving = false;
                    if(response.data.successs) {
                        this.model = response.data[this.modelType]
                    }
                }).finally(() => {
					this.saving = false;
				})
        }
    }
}
</script>

<style lang='scss'>

.btn-bigAddMore {
    width: 100%;
    input[type=file] {
        display: none;
    }
}

.imagePreview {
    width: 100%;
    max-height: 150px;
    overflow: hidden;
    img {
        width: 100%;
        height: auto
    }
}
</style>



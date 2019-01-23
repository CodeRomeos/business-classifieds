<template>
    <div class="serviceProductInputCard">
        <form @submit.prevent="save" enctype="multipart/form-data">
            <div class="imagePreview">
                <div class="input-container" v-if='!image'>
                    <label class='btn btn-bigAddMore'>
                        <span class='fa fa-image'></span>
                        <input type="file" @change="onFileChange">
                    </label>
                </div>
                <div v-if='image'>
                    <img :src='imageUrl'>
                    <div class="image-controls">
                        <button type='button' class='btn btn-sm btn-danger' @click='image = null; imageUrl = null'>
                            <span class='fa fa-times'></span>
                        </button>
                    </div>
                </div>
            </div>
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
export default {
    name: 'service-product-input-card',
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
    data() {
        return {
            image: null,
			imageUrl: null,
			saving: false
        }
	},
	watch: {
		saving(value) {
			if(value == true) {
				setTimeout(function() {
					this.value = false
				}.bind(this), 3000)
			}
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
        onFileChange(event) {
            this.image = event.target.files[0]
            this.imageUrl = URL.createObjectURL(this.image)
        },
        save() {
			this.saving = true;
            const formData = new FormData()
            formData.append('image', this.image)
            formData.append('name', this.model.name)
            formData.append('description', this.model.description)
            axios.post(this.actionUrl, formData)
                .then(response => {
					this.saving = false;
                    console.log(response.data)
                })
        }
    }
}
</script>

<style lang='scss' scoped>

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



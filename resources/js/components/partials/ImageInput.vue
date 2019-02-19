<template>
	<div class="imagePreview">
		<div class="input-container" v-if='!imageFile && !imageUrl'>
			<label class='btn btn-bigAddMore'>
				<span class='fa fa-image'></span>
				<input type="file" @change="onFileChange">
			</label>
		</div>
		<img :src='imageUrl' v-show='imageUrl'>
		<div v-if='imageFile || imageUrl'>
			<div class="image-controls">
				<button type='button' class='btn btn-sm btn-danger' @click='imageFile = ""; imageUrl = ""; removeImage = true'>
					<span class='fa fa-times'></span>
				</button>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: 'image-input',
	props: [
		'src'
	],
	data() {
		return {
			imageFile: null,
			removeImage: false,
			imageUrl: null
		}
	},
	mounted() {

	},
	methods: {
		onFileChange(event) {
            this.imageFile = event.target.files[0]
			this.imageUrl = URL.createObjectURL(this.imageFile)
			this.removeImage = false
        }
	},
	watch: {
		src() {
			this.imageUrl = this.src
		},
		imageFile() {
			this.$emit('imageFileChange', this.imageFile)
		},
		imageUrl() {
			this.$emit('imageUrlChange', this.imageUrl)
		},
		removeImage() {
			this.$emit('imageRemoved', this.removeImage)
		}
	}
}
</script>

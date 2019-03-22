<template>
    <transition name="modal">
			<div class="modal-mask">
				<div class="modal-wrapper">
					<div class="modal-container">
						<button class="btn btn-close text-white" @click="close"><span class='fa fa-times'></span></button>
						<slot></slot>
					</div>
				</div>
			</div>
  	</transition>
</template>

<script>
export default {
	name: "modal",

	data() {
		return {

		}
    },
    methods: {
        close() {
            this.$emit('close');
        }
    }
}
</script>


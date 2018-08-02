<template>
    <transition name="modal">
    <div class="modal-mask">
		<div class="modal-wrapper">
			<div class="modal-container">
				<div class="card">
					<button class="btn btn-close" @click="close">X</button>
					<slot></slot>
				</div>
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


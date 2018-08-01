<template>
    <transition name="slide-fade">
	<div class='modal'>
        <div class="modal-backdrop" @click="close"></div>
        <div class="modal-content">
            <div class="card">
                <button @click="close" class='btn btn-close'><span class='fa fa-times fa-2x'></span></button>
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


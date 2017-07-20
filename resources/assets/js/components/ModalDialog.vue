<template>
<div class="modal-wrapper">
	<div class="modal-container">
		<div class="card">
			<button type='button' class='close-button btn btn-link btn-xs' @click='close'>
				<i class='fa fa-times'></i>
			</button>
			<slot></slot>
		</div>
    </div>
</div>
</template>

<script>
	export default {
		methods: {
			close() {
				Event.$emit("close_modal_dialog")
			}
		}
	}
</script>
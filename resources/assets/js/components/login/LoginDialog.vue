<template>
	<modal-dialog v-show='showDialog'>
		<div class="row">
			<div class="col-md-6">
			<login-form></login-form>
			</div>
		</div>
	</modal-dialog>
</template>

<script>
	export default {
		data() {
			return {
				showDialog: false
			}
		},
		mounted() {
			Event.$on('show_login_dialog', function() {
				this.showDialog = true;
			}.bind(this));
			Event.$on('close_modal_dialog', function() {
				this.showDialog = false;
			}.bind(this));
		},
		methods: {

		}
	}
</script>
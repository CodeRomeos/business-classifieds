<template>
	<div class="login-form">
		<form @submit.prevent='submitLogin'>
			<div class="form-group">
				<input type='email' class='form-control'>
			</div>
			<div class="form-group">
				<input type='password' class='form-control'>
			</div>
			<div class="form-group">
				<input type='submit' class='btn btn-block btn-primary'>
			</div>
		</form>
	</div>
</template>

<script>
	export default {
		data() {
			return {

			}
		},
		methods: {
			submitLogin() {
				console.log('submitting login form');
			}
		}
	}
</script>
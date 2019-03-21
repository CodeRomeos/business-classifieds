<template>
    <div class="login bg-primary">
		<div class="card p-5">
			<div class="card-body">
				<h3 class="card-title">Login<span v-if='loading'><small> <span class='fa fa-refresh fa-spin'></span></small></span></h3>
				<div class='alert alert-danger' v-if='error'>Wrong email or password</div>
				<div class='alert alert-success' v-if='success'>Login successful.</div>
				<form class='mt-3' @submit.prevent='authenticate'>
					<div class="input-container mb-3">
						<label for='email'>Email: </label>
						<input type='email' name='email' v-model="form.email" class='input-field' id='login_name'>
					</div>
					<div class="input-container mb-3">
						<label for='password'>Password: </label>
						<input type='password' name='password' v-model="form.password" class='input-field' id='login_password'>
					</div>
					<div class="input-container mb-3 clearfix">
						<input type='submit' value='Login' class='btn btn-success pull-right' id='login_submit'>
					</div>
				</form>
			</div>
		</div>
    </div>
</template>

<script>
import {login} from '../../helpers/auth';
export default {
    name: "login",
    data() {
        return {
            form: {
                email: "",
                password: ""
            },
			error: false,
			success: false,
			loading: false
        }
	},
	computed: {

	},
    methods: {
        authenticate() {
			this.loading = true;
			this.disable_inputs();
            this.$store.dispatch('login');
            login(this.$data.form)
                .then((res) => {
					this.success = true;
					this.error = false;
					this.loading = false;
					this.enable_inputs();

					if(res.data.redirect && res.data.isAdmin) {
						window.location.href = res.data.redirect;
					}
					else {
                        this.$store.commit('loginSuccess', res.data);
                        this.$store.commit('alert', { message: 'Login successful!', type: 'success' })
					}

                })
                .catch((error) => {
					this.success = false;
					this.loading = false;
					this.error = true;
					this.enable_inputs();
                    this.$store.commit('loginFailed', {error});
                    this.$store.commit('alert', { message: 'Login failed!', type: 'danger' })
                });

		},
		disable_inputs() {
			$('#login_name').prop('disabled', true);
			$('#login_password').prop('disabled', true);
			$('#login_submit').prop('disabled', true);
		},
		enable_inputs() {
			$('#login_name').prop('disabled', false);
			$('#login_password').prop('disabled', false);
			$('#login_submit').prop('disabled', false);
		}
    }
}
</script>


<template>
    <div class="login">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Login<span v-if='loading'><small> <span class='fa fa-refresh fa-spin'></span></small></span></h3>

				<form class='mt-3' @submit.prevent='authenticate'>
					<div class="input-container mb-3">
						<label for='email'>Email: </label>
						<input type='email' v-model="form.email" class='input-field' id='login_name'>
					</div>
					<div class="input-container mb-3">
						<label for='password'>Password: </label>
						<input type='password' v-model="form.password" class='input-field' id='login_password'>
					</div>
					<div class="input-container mb-3">
						<input type='submit' value='Login' class='btn btn-primary' id='login_submit'>
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
			error: null,
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
					this.loading = false;
					this.enable_inputs();

					if(res.data.isAdmin) {
						 axios.post('/login', this.$data.form)
							.then((response) => {
								window.location.href = res.data.redirect;
							})
							.catch((error) => {
								this.loading = false;
								this.enable_inputs();
							});
                    }
                    else {
                        this.$store.commit('loginSuccess', res);
                    }

                    //this.$router.push({path: '/'});
                })
                .catch((error) => {
					this.loading = false;
					this.enable_inputs();
					console.log({error});
                    this.$store.commit('loginFailed', {error});
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


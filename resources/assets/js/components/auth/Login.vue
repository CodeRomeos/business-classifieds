<template>
    <div class="login">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Login</h3>
				<form class='mt-3'>
					<div class="input-container mb-3">
						<label for='email'>Email: </label>
						<input type='email' v-model="form.email" class='input-field'>
					</div>
					<div class="input-container mb-3">
						<label for='password'>Password: </label>
						<input type='password' v-model="form.password" class='input-field'>
					</div>
					<div class="input-container mb-3">
						<input type='submit' value='Login' class='btn btn-primary'>
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
            error: null
        }
    },
    methods: {
        authenticate() {
            this.$store.dispatch('login');
            login(this.$data.form)
                .then((res) => {
                    this.$store.commit('loginSuccess', res);
                    this.$router.push({path: '/'});
                })
                .catch((error) => {
                    this.$store.commit('loginFailed', {error});
                });

        }
    }
}
</script>


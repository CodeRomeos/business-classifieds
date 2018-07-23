<template>
    <div class="login row justified-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for='email'>Email: </label>
                            <input type='email' v-model="form.email" class='form-control'>
                        </div>
                        <div class="form-group">
                            <label for='password'>Password: </label>
                            <input type='password' v-model="form.password" class='form-control'>
                        </div>
                        <div class="form-group">
                            <input type='submit' value='Login' class='btn btn-primary'>
                        </div>
                    </form>
                </div>
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


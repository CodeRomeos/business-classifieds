<template>
    <div id="app" class='app-grid'>
        <header class="header">
			<router-link to="/" class='navbar-brand'>
                {{ APP_NAME }}
            </router-link>
			<div class='header-mid text-center'>
				<a href='#' class="btn">Claim your listing</a>
			</div>
			<navbar />
		</header>
        <main class="main">
			<login-modal></login-modal>
            <transition name='fade'>
            <router-view></router-view>
            </transition>
        </main>
		<footer class="footer">
			footer
		</footer>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { getAuthUser } from '../helpers/auth';
import Navbar from './partials/Navbar.vue';
import Modal from './partials/Modal.vue';
import LoginModal from './auth/LoginModal.vue';
export default {
    name: 'the-app',
    data() {
        return {
			APP_NAME: process.env.MIX_APP_NAME
        }
    },
    created() {
        getAuthUser().then((res) => {
            if('user' in res.data) {
                this.$store.commit('setCurrentUser', res.data);
            }
		});
		this.$store.dispatch('loadCities');
    },
	computed: {
        ...mapGetters([

		]),
		loginModal() {

		}
	},
    components: {
		Navbar,
		Modal,
		LoginModal
	}
}
</script>

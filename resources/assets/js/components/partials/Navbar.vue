<template>
    <nav class="navbar clearfix">
		<router-link to="/listings">Lisings</router-link>
		<a href="javascript:void(0)" v-if="!isLoggedIn" @click="loginModal">Login</a>
		<a href="javascript:void(0)" v-if="isLoggedIn">My Account</a>
		<a href="javascript:void(0)" v-if="isLoggedIn" @click="logout">Logout</a>
    </nav>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
	mounted() {

	},
    data() {
        return {
            APP_NAME: process.env.MIX_APP_NAME
        }
	},
	computed: {
		...mapGetters([
			'isLoggedIn'
		])
	},
	methods: {
		loginModal() {
			this.$store.dispatch('showLoginModal');
        },
        logout() {
            this.$store.dispatch('logout');
        }
	}
}
</script>

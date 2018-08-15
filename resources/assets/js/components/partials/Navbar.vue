<template>
    <nav class="navbar clearfix">
		<router-link to="/listings">Listings</router-link>
		<a href="javascript:void(0)" v-if="!isLoggedIn" @click="loginModal">Login</a>
        <template v-if="isLoggedIn">
            <a href="/admin" v-if='currentUser.is_admin'>My Account</a>
            <router-link :to="{ name: 'userAccount'}" v-else>My Account</router-link>
        </template>
		<a href="javascript:void(0)" v-if="isLoggedIn" @click="logout">Logout</a>
    </nav>
</template>

<script>
import { mapGetters } from 'vuex';
import { logout } from '../../helpers/auth';
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
            'isLoggedIn',
            'currentUser'
		])
	},
	methods: {
		loginModal() {
			this.$store.dispatch('showLoginModal');
        },
        logout() {
            logout().then((res) => {
                this.$store.commit('logout', res.data);
                this.$router.push('/');
            });
        }
	}
}
</script>

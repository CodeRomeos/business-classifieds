<template>
    <nav class="navbar clearfix">
		<router-link to="/listings">Lisings</router-link>
		<a href="#!" v-if="!this.$store.isLoggedIn" @click="loginModal">Login</a>
    </nav>
</template>

<script>
export default {
	mounted() {

	},
    data() {
        return {
            APP_NAME: process.env.MIX_APP_NAME
        }
	},
	methods: {
		loginModal() {
			this.$store.dispatch('showLoginModal');
		}
	}
}
</script>

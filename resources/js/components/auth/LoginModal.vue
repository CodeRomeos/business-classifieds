<template>
	<div id="login-modal">
		<modal v-if='loginModal' @close='closeLogin'><login /></modal>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
import Login from './Login.vue'
import Modal from '../partials/Modal.vue'
export default {
	name: 'login-modal',
	data() {
		return {

		}
	},
	created() {

	},
	computed: {
		...mapGetters([
			'loginModal'
		])
	},
	methods: {
		closeLogin() {
			this.$store.dispatch('hideLoginModal');
		}
	},
	components: {
		Login,
		Modal
	}
}
</script>


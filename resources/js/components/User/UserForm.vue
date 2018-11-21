<template>
    <div class="card">User Form</div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    name: 'user-form',
	created() {

	},
	computed: {
		...mapGetters([
			'currentUser'
		])
	}
}
</script>


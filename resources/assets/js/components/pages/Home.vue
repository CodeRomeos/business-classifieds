<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ welcome }}</h1>
				<businesses />
            </div>
        </div>
    </div>
</template>

<script>
import Businesses from '../Businesses.vue';
export default {
	mounted() {

	},
	computed: {
		welcome() {
			return this.$store.getters.welcome
		}
	},
    components: {
        Businesses
    }
}
</script>

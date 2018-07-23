<template>
    <section id='home'>
        <div id='slider' class='mb-5'>
            <img src='/images/banner1.jpg' class='img-fluid'>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ welcome }}</h1>
                    <businesses />
                </div>
            </div>
        </div>
    </section>
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

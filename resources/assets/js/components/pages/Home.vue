<template>
    <section id='home'>
        <div id='banner' class='mb-5'>
            <img src='/images/banner1.jpg' class='img-fluid'>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 offset-md-1">
					<sidebar />
                </div>
                <div class="col-md-7">
                    <h1>{{ welcome }}</h1>
                    <businesses />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Businesses from '../Businesses.vue';
import Sidebar from '../partials/Sidebar.vue';
export default {
	mounted() {

	},
	computed: {
		welcome() {
			return this.$store.getters.welcome
		}
	},
    components: {
        Businesses,
		Sidebar
    }
}
</script>

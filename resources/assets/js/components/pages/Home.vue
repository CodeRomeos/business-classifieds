<template>
    <section id='home' class='homepage-container'>
        <div class='add-listing-CTA pr-2 pl-2'>
            <h2>List your business for FREE!</h2>
            <a href="#!" class="btn btn-CTA">List My Business</a>
        </div>
		<div class="hero"><img src='/images/banner1.jpg' style='width: 100%'></div>
		<div class="content mt-2">
			<h1>{{ welcome }}</h1>
        	<businesses />
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

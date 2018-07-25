<template>
    <section id='home' class='homepage-container'>
        <div class='add-listing-CTA pr-2 pl-2'>
            <h2>List your business for FREE!</h2>
            <a href="#!" class="btn btn-CTA">List My Business</a>
        </div>
		<div class="hero"><img src='/images/banner1.jpg' style='width: 100%'></div>
		<div class='pr-2 pl-2 home-ad-block bg-primary text-white'>
            <h2>List your business for FREE!</h2>
            <a href="#!" class="btn btn-CTA">List My Business</a>
        </div>
		<div class="content">
			<category-thumbs />
			<h1>{{ welcome }}</h1>
        	<businesses />
		</div>
    </section>
</template>

<script>
import Businesses from '../Businesses.vue';
import Sidebar from '../partials/Sidebar.vue';
import CategoryThumbs from '../partials/CategoryThumbs.vue';
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
		Sidebar,
		CategoryThumbs
    }
}
</script>

<template>
    <section id='home' class='homepage-container'>
        <div class='home-ad-listing-CTA pr-2 pl-2 text-center'>
            <div class="ad-listing-CTA">
                <h2>List your business for FREE!</h2>
                <a href="#!" class="btn btn-CTA">List My Business</a>
            </div>
        </div>
        <div class='pr-2 pl-2 home-ad-block bg-primary text-white'>
            <h2>List your business for FREE!</h2>
            <a href="#!" class="btn btn-CTA">List My Business</a>
        </div>
		<div class="hero"><img src='/images/banner1.jpg' style='width: 100%'></div>

		<div class="content">
			<category-thumbs />
			<h1 class='pl-2 pr-2'>{{ welcome }}</h1>
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

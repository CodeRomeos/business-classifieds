<template>
    <section id='home' class='homepage-container'>
		<div class="hero py-5">
			<div class='container py-5'>
				<div class='h2'>Dolore quasi enim exercitationem</div>
				<listing-search-form class='mt-3' />
			</div>
		</div>
		<div class="content">
			<cta-banner />
			<businesses class='container' />
		</div>
    </section>
</template>

<script>
import Businesses from '../Businesses.vue';
import ListingSearchForm from '../ListingSearchForm.vue';
import CtaBanner from '../partials/CtaBanner.vue';

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
		ListingSearchForm,
        CtaBanner
    }
}
</script>

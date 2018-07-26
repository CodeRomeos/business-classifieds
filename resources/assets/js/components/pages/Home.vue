<template>
    <section id='home' class='homepage-container'>
		<div class="hero">
			<div style='max-width: 768px; margin: auto'>
			<listing-search-form />
			</div>
		</div>

		<div class="content">
            <sidebar />
            <div>
                <h1 class='pl-2 pr-2'>{{ welcome }}</h1>
        	    <businesses />
            </div>
		</div>
    </section>
</template>

<script>
import Businesses from '../Businesses.vue';
import ListingSearchForm from '../ListingSearchForm.vue';
import Sidebar from '../partials/Sidebar.vue';
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
        Sidebar,
        CtaBanner
    }
}
</script>

<template>
    <section id='home' class='homepage-container'>
		<div class="hero py-5">
			<div class='container'>
				<h2 class='h2 text-center'>How it works</h2>
				<div class="how-it-works">
					<div>
						<p class='text-center' style='font-size: 48px'><span class='icons icon-magnifier'></span></p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quibusdam ipsum nesciunt perferendis voluptatem rem.</p>
					</div>
					<div>
						<p class='text-center' style='font-size: 48px'><span class='icons icon-map'></span></p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quibusdam ipsum nesciunt perferendis voluptatem rem.</p>
					</div>
					<div>
						<p class='text-center' style='font-size: 48px'><span class='icons icon-directions'></span></p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quibusdam ipsum nesciunt perferendis voluptatem rem.</p>
					</div>
					<div>
						<p class='text-center' style='font-size: 100px'><span class='icons icon-layers'></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="content">
			<businesses />
		</div>
    </section>
</template>

<script>
import Businesses from '../Businesses.vue';
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
        CtaBanner
    }
}
</script>

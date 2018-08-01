<template>
    <section id='home' class='homepage-container'>
		<div class="hero py-3">
			<div class='container'>
				<h2 class='h1 text-center'>How it works</h2>
				<div class="how-it-works">
					<div>
						<ul class="p-0">
							<li>
								<p class="h4"> <span class='icons icon-magnifier'></span> <strong>Easy registration</strong></p>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quibusdam ipsum nesciunt perferendis voluptatem rem.</p>
							</li>
							<li>
								<p class="h4"> <span class='icons icon-map'></span> <strong>Promote your listing</strong></p>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quibusdam ipsum nesciunt perferendis voluptatem rem.</p>
							</li>
							<li>
								<p class="h4"> <span class='icons icon-directions'></span> <strong>Increase sales benefits</strong></p>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quibusdam ipsum nesciunt perferendis voluptatem rem.</p>
							</li>
						</ul>
						<a href="#1" class="btn btn-primary">Claim your business</a>
					</div>
					
					<div>
						<img src="/images/web-page-screen.svg" alt="" class="img-fluid">
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

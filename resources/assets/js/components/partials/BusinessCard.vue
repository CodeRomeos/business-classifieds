<template>
	<div class="card business-card mb-2">
		<div class="card-thumb">
			<img :src="business.image" class='img-fluid'>
		</div>
		<div>
			<h3 class="h5 card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h3>
			<p class='subtitle'>Tour operator in Delhi</p>
		</div>
		<div class="card-body">
			<div class="card-text">
				<p>Phone: {{ business.contacts.join() }}</p>
				<p> Address: {{ business.address }}</p>
				<p class='mt-2'>
				<router-link class='btn btn-sm' :to="{ name: 'business', params: { businessid: business.businessid }}">Show</router-link>
				</p>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: 'business-card',
	props: [
		'business'
	]
}
</script>
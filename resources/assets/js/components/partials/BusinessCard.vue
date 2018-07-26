<template>
	<div class="card business-card mb-2">
		<div class="crad-thumb">
			<img :src="business.image" class='img-fluid'>
		</div>
		<div class="card-body">
			<h3 class="card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link>
			<small class="dealsIn">Tour operator in Delhi</small></h3>
			<div class="card-text">
				<p>
					<strong>Phone:</strong>{{ business.contacts.join() }}
					<br>
					<strong> Address:</strong> {{ business.address }}
				</p>
				{{ business.body }}
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
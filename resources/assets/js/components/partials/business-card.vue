<template>
	<div class="card mb-2">
		<div class="card-body">
			<h3 class="card-title">{{ business.title }}</h3>
			<div class="card-text">
				{{ business.body }}
				<br>
				<router-link :to="{ name: 'business', params: { businessid: business.businessid }}">Show</router-link>
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

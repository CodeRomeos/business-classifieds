<template>
	<div class="card business-card mb-4">
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<img :src="business.image" style='width: 100%'>
				</div>
				<div class="col-md-6">
					<h3 class="card-title"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h3>
					<div class="card-text">
						<p>
							{{ business.contacts.join() }}
							<br>
							{{ business.address }}
						</p>
						{{ business.body }}
					</div>
				</div>
				<div class="col-md-3">
					<br>
					<br>
					<router-link class='btn btn-primary btn-lg' :to="{ name: 'business', params: { businessid: business.businessid }}">Show</router-link>
				</div>
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
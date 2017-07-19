<template>
<div class="modal-wrapper" v-show='show'>
	<div class="modal-container">
		<div class="card">
			<button type='button' class='close-button btn btn-link btn-xs' @click='show = false'>
				<i class='fa fa-times'></i>
			</button>
			<slot></slot>
		</div>
    </div>
</div>
</template>

<script>
	export default {
		props: {
			show: { default: false }
		}
	}
</script>
<template>
	<div>
		<button @click="$emit('close')">Close</button>
		<slot></slot>
	</div>
</template>

<script>
export default {
	name: "modal",

	data() {
		return {

		}
	}
}
</script>


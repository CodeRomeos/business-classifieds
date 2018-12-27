<template>
	<select>
    	<slot></slot>
  	</select>
</template>

<script>
export default {
	name: 'select2',
	props: ['options', 'value'],
	mounted() {
		var vm = this
		$(this.$el)
			.select2({ data: this.options })
			.val(this.value)
			.trigger('change')
			.on('change', function() {
				vm.$emit('input', this.value)
			})
	},
	watch: {
		value: function(value) {
			$(this.$el)
				.val(value)
				.trigger('change')
		},
		options: function(options) {
			$(this.$el).empty().select2({ data: options })
		}
	},
	destroyed() {
		$(this.$el).off().select2('destroy')
	}
}
</script>

<template>
	<select>
    	<slot></slot>
  	</select>
</template>

<script>
export default {
	name: 'select2',
	props: ['options', 'value', 'placeholder'],
	mounted() {
		var vm = this
		$(this.$el)
			.select2({
                placeholder: this.placeholder,
                allowClear: true
            })
			.on('change', function() {
				vm.$emit('input', this.value)
			})
	},
	watch: {
		value: function(value) {
			$(this.$el)
				.val(value)
				.trigger('change')
		}
	},
	destroyed() {
		$(this.$el).off().select2('destroy')
	}
}
</script>
<template>
	<select>
    	<slot></slot>
  	</select>
</template>

<script>
export default {
	name: 'select2',
	props: {
        options: { default: '' },
        value: { default: '' },
        placeholder: { default: '' }
    },
	mounted() {
		var vm = this
		$(this.$el)
			.select2({
                placeholder: this.placeholder,
                allowClear: true
            })
			.on('change', function() {
				vm.$emit('input', $(this).val())
			})
	},
	watch: {
		value: function(value) {
            if ([...value].sort().join(",") !== [...$(this.$el).val()].sort().join(","))
                $(this.$el).val(value).trigger('change');
		}
	},
	destroyed() {
		$(this.$el).off().select2('destroy')
	}
}
</script>
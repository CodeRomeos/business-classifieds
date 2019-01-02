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

		var select = $(this.$el)
		select
			.select2({
				placeholder: this.placeholder,
                allowClear: true
		 	})
			.val(this.value)
			.trigger('change')
			.on('change', function() {
				vm.$emit('input', select.val())
			});

	},
	beforeUpdate() {
		this.$nextTick(function() {
			this.triggerValueChange(this.value);
		});
	},
	watch: {
		value: function(value) {
			this.triggerValueChange(value)
		}
	},
	methods: {
		triggerValueChange(value) {
			if ([...value].sort().join(",") !== [...$(this.$el).val()].sort().join(",")){
                $(this.$el).val(value).trigger('change');
			}
		}
	},
	destroyed() {
		$(this.$el).off().select2('destroy')
	}
}
</script>
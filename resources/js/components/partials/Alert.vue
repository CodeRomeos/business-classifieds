<template>
	<div class="alert-box">
		<transition name="fade">
			<div
				class="alert"
				v-if="alert.message"
				:class="{ 'alert-danger': alert.type == 'danger', 'alert-success': alert.type == 'success', 'alert-warning': alert.type == 'warning'}"
			>
				<div class="alert-body">
					<div class="alert-message">{{ alert.message }}</div>
					<button class="btn btn-close" type="button" @click="clear()">
						<span class="fa fa-times"></span>
					</button>
				</div>
			</div>
		</transition>
	</div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
	name: "alert",
	computed: {
		...mapGetters(["alert"])
	},
	methods: {
		clear() {
			this.$store.dispatch("clearAlert");
		}
	},
	watch: {
		alert: {
			handler(val) {
				if (val) {
					setTimeout(
						function() {
							this.clear();
						}.bind(this),
						3000
					);
				}
			},
			deep: true
		}
	}
};
</script>

<style lang="scss" scoped>
.alert-box {
	position: fixed;
	bottom: 10px;
	right: 10px;
	max-width: 380px;
	z-index: 9999;
	.alert {
		box-shadow: 2px 2px 4px #aaa;
		color: #fff;
		padding: 10px;

		&.alert-danger {
			background: #ff4c4c;
		}

		&.alert-success {
			background: #80b741;
		}

		.alert-body {
			display: flex;
			align-items: flex-start;
			.alert-message {
				padding-right: 10px;
			}

			.btn-close {
				background-color: transparent;
				display: inline-block;
				padding: 5px;
				line-height: 100%;

				&:hover {
					background-color: transparent;
				}
			}
		}
	}
}
</style>

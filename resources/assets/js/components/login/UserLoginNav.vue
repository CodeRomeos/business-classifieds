<template>
	<ul class="nav navbar-nav navbar-right">
        <li class="dropdown" v-if='user'>
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
        		{{ user.name }} <span class="caret"></span>
        	</a>
        	<ul class="dropdown-menu ">
        		<li>
        			<a href="#" title="Login"><i class="fa fa-angle-right" aria-hidden="true"></i> Logout</a>
        		</li>
            </ul>
        </li>
		<li v-else>
			<a href="#" @click.prevent='showLoginDialog'>Login</a>
        </li>
    </ul>
</template>

<script>
	export default {
		data() {
			return {
				user: null
			}
		},
		created() {
			axios.get('/json/u/is-logged-in').then(response => {
				this.user = response.data.user
			})
		},
		methods: {
			showLoginDialog() {
				Event.$emit('show_login_dialog');
			}
		}
	}
</script>
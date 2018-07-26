<template>
    <div id="app" class='container'>
        <header class="header">
			<router-link to="/" class='navbar-brand' style="font-size: 45px;">
                {{ APP_NAME }}
            </router-link>
			<div class='header-mid text-center'>
				<a href='#'><strong>Claim you listing</strong></a>
			</div>
			<navbar />
		</header>
        <main class="main">
            <transition name='fade'>
            <router-view></router-view>
            </transition>
        </main>
		<footer class="footer">
			footer
		</footer>
    </div>
</template>

<script>
import Navbar from './partials/Navbar.vue';
export default {
    name: 'the-app',
    data() {
        return {
            APP_NAME: process.env.MIX_APP_NAME
        }
    },
    components: {
        Navbar
    }
}
</script>

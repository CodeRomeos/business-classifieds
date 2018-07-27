<template>
    <div id="app" class='app-grid'>
        <header class="header">
			<router-link to="/" class='navbar-brand'>
                {{ APP_NAME }}
            </router-link>
			<div class='header-mid text-center'>
				<a href='#' class="btn">Claim you listing</a>
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

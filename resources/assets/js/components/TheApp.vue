<template>
    <div id="app" class='container'>
        <div class="header">
			<router-link to="/" class='navbar-brand'>
                {{ APP_NAME }}
            </router-link>
		</div>
		<navbar />
        <div class="search"><input type='text' placeholder='search...'></div>
        <div class="main">
            <transition name='fade'>
            <router-view></router-view>
            </transition>
        </div>
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

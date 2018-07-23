<template>
    <div id="app">
        <navbar></navbar>
        <div class="content">
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

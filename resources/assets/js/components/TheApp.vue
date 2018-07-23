<template>
    <div id="app">
        <navbar></navbar>
        <div class="content">
            <router-view></router-view>
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

<style>
body {
    padding-top: 54px;
}
@media (min-width: 992px) {
    body {
        padding-top: 56px;
    }
}
</style>


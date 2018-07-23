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

<style>
body {
    padding-top: 54px;
}
@media (min-width: 992px) {
    body {
        padding-top: 56px;
    }
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>


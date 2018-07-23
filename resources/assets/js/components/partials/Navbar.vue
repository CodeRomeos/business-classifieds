<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <router-link to="/" class='navbar-brand'>
                {{ APP_NAME }}
            </router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <router-link tag='li' to="/" class='nav-item'>
                    <a class='nav-link'>Home</a>
                </router-link>
                <router-link tag='li' to="/listings" class='nav-item'>
                    <a class='nav-link'>Lisings</a>
                </router-link>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            APP_NAME: process.env.MIX_APP_NAME
        }
    }
}
</script>

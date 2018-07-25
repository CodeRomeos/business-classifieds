<template>
    <nav class="navbar clearfix">
        <router-link to="/">Home</router-link>
		<router-link to="/listings">Lisings</router-link>
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

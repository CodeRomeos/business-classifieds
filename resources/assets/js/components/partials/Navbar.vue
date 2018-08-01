<template>
    <nav class="navbar clearfix">
		<router-link to="/listings">Lisings</router-link>
		<a href="/login">Login</a>
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

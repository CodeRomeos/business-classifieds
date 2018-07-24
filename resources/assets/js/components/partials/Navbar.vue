<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <router-link tag='li' to="/" class='nav-item'>
			<a class='nav-link'>Home</a>
		</router-link>
		<router-link tag='li' to="/listings" class='nav-item'>
			<a class='nav-link'>Lisings</a>
		</router-link>
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

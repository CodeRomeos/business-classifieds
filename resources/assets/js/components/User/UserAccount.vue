<template>
    <div id='user-account' class='container pt-3'>
        <div id='user-nav'>
            <div class="card">
                <router-link :to="{ name: 'userAccount'}"><span class='icons icon-home'></span> Dashboard</router-link>
                <router-link :to="{ name: 'userBusiness'}"><span class='icons icon-organization'></span> Business</router-link>
                <router-link :to="{ name: 'userBookmarks'}"><span class='fa fa-bookmark-o'></span> Bookmarks</router-link>
            </div>
        </div>
        <div id="user-main">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: 'user-account',
	computed: {
		...mapGetters([
            'isLoggedIn',
            'currentUser'
		])
    },
    methods: {

    }
}
</script>

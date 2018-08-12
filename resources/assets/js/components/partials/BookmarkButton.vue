<template>
	<div><a href='javascript:void(0)' @click.prevent='postBookmark'><span class='fa' :class='[bookmarked ? "fa-bookmark" : "fa-bookmark-o"]'></span></a></div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
	name: 'bookmark-button',
	props: [
		'post'
    ],
    data() {
        return {
            bookmarked: false,
            postponeBookmark: false
        }
    },
	computed: {
		...mapGetters([
			'isLoggedIn'
		])
	},
    created() {
        if(this.isLoggedIn) {
            axios.get('/spa/bookmarks/check/' + this.post.id)
                .then((res) => {
                    if(res.data.bookmarked == true) {
                        this.bookmarked = true
                    }
                    else {
                        this.bookmarked = false
                    }
                })
        }

    },
    watch: {
        isLoggedIn: function(newValue, oldValue) {
            if(newValue && this.postponeBookmark === true) {
                this.postponeBookmark = false;
                this.postBookmark();
            }
        }
    },
    methods: {
        postBookmark() {
            if(!this.isLoggedIn) {
                this.postponeBookmark = true;
                this.$store.dispatch('showLoginModal');
            }
            else {
                axios.post('/spa/bookmarks/' + this.post.id)
                    .then((res) => {
                        if(res.data.bookmark == true) {
                            this.bookmarked = true
                        }
                        else {
                            this.bookmarked = false
                        }
                    })
            }
        }
    }
}
</script>


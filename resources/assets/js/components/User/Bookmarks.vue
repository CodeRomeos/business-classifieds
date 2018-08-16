<template>
    <div class='card'>
        User bookmarks
    </div>
</template>

<script>
export default {
	name: "bookmarks",
	data() {
		return {
			bookmarks: []
		}
	},
	created() {
		this.fetchBookmarks()
	},
	methods: {
		fetchBookmarks() {
			axios.get('/spa/user/bookmarks')
				.then((response) => {
					console.log(response);
				})
		}
	}
}
</script>


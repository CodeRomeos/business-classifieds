<template>
    <div class='user-bookmarks'>
        <h4 class='h5'>My Bookmarks</h4>
        <ul class='list'>
            <li class='list-item' v-for="(business, index) in businesses" :key='index'>
                <router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
	name: "bookmarks",
	data() {
		return {
			businesses: []
		}
	},
	created() {
		this.fetchBookmarks()
	},
	methods: {
		fetchBookmarks() {
			axios.get('/spa/user/bookmarks')
				.then((response) => {
					this.businesses = response.data.data
				})
		}
	}
}
</script>


<template>
    <div class='card'>
        <h4 class='h5'>My Bookmarks</h4>
        <table>
            <tr v-for="(business, index) in businesses" :key='index'>
                <td><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></td>
            </tr>
        </table>
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


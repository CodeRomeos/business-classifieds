<template>
    <div class='user-bookmarks'>
        <h4 class='h5'>My Bookmarks</h4>
        <ul class='list'>
            <li class='list-item' v-for="(business, index) in businesses" :key='index'>
                <router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link>
            </li>
        </ul>
        <pagination :pagedata='pagination' @fetchNext='fetchBookmarks(pagination.nextPageUrl)' @fetchPrevious='fetchBookmarks(pagination.previousPageUrl)'></pagination>
    </div>
</template>

<script>
import Pagination from '../partials/Pagination.vue';
export default {
	name: "bookmarks",
	data() {
		return {
			businesses: [],
            pagination: {}
		}
	},
	created() {
		this.fetchBookmarks()
	},
    components: {
        Pagination
    },
	methods: {
		fetchBookmarks(url) {
            if(!url){
                url = '/spa/user/bookmarks';
            }
			axios.get(url)
				.then((response) => {
					this.businesses = response.data.data;
                    this.pagination = response.data.pagination;
				})
		}
	}
}
</script>


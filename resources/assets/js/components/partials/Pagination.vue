<template>
    <div class="pagination text-center" v-if='pagedata.previousPageUrl || pagedata.nextPageUrl'>
        <button class='btn' :disabled='!pagedata.previousPageUrl' @click="$emit('fetchPrevious', pagedata.previousPageUrl)">Previous</button>
        <button class='btn' :disabled='!pagedata.nextPageUrl' @click="$emit('fetchNext', pagedata.nextPageUrl)">Next</button>
    </div>
</template>

<script>
export default {
    name: 'pagination',
    props: [
        'pagedata'
    ]
}
</script>


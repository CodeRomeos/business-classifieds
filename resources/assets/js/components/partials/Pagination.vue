<template>
    <div class="pagination text-center" v-if='pagedata.previousPageUrl || pagedata.nextPageUrl'>
        <button class='btn btn-primary' :disabled='!pagedata.previousPageUrl' @click="$emit('fetchPrevious', pagedata.previousPageUrl)"><span class='icon icon-arrow-left'></span></button>
        <button class='btn btn-primary' :disabled='!pagedata.nextPageUrl' @click="$emit('fetchNext', pagedata.nextPageUrl)"><span class='icon icon-arrow-right'></span></button>
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


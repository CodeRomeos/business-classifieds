<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Categories Component</h1>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: []
            }
        },
        created() {
            axios.get('/json/categories')
                .then(response => this.categories = response.data);
            console.log(this.categories);
        }
    }
</script>

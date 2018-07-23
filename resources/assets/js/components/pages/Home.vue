<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ welcome }}</h1>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        computed: {
            welcome() {
                return this.$store.getters.welcome
            }
        }
    }
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login Component</h1>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        created() {
            axios.get('/json/login');

        }
    }
</script>

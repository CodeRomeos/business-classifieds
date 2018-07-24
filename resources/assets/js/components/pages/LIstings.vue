<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Listings</h1>
				<businesses />
            </div>
        </div>
    </div>
</template>

 <script>
 import Businesses from '../Businesses.vue';
 export default {
	 name: 'navbar',
    components: {
        Businesses
    }
 }
 </script>


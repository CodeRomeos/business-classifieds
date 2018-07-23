<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Listings</h2>
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


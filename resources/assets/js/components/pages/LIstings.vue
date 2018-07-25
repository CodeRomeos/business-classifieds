<template>
    <div class="listings-page-container">
        <div style='background: #1e2c33' class='page-grid-item-1'></div>
        <div style='background: #ddd' class='pl-2 page-grid-item-2'><h2>Search</h2></div>
        <div style='background: #eee' class='page-grid-item-3'></div>

        <div style='background: rgb(38, 55, 64)' class='page-grid-item-4'></div>
        <div style='background: #555' class='page-grid-item-5'> 
            icons
        </div>
        <div style='background: rgb(38, 55, 64)' class='page-grid-item-6'></div>
        <div style='background: #1e2c33' class='page-grid-item-7'></div>
        <div class='page-grid-item-8'>
		    <businesses />
        </div>
        <div class='page-grid-item-9'>laksdj</div>
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


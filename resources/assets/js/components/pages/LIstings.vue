<template>
    <div class="listings-page-container">
        <div style='background: #555'></div>
        <div style='background: #ddd' class='pl-2'><h2>Listings</h2></div>
        <div style='background: #eee'></div>

        <div style='background: #444'></div>
        <div style='background: #555'></div>
        <div style='background: #666'></div>
        <div style='background: #eee'></div>
		<businesses />
        <div>laksdj</div>
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


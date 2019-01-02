<template>
    <div id="userBusinessProducts">
        <slot></slot>
        <service-product-input-card v-for='(product, index) in products' :key='index' :model='product'></service-product-input-card>
        <button type='button' @click='products.push({})' class='btn btn-bigAddMore'>+</button>
    </div>
</template>

<script>
import ServiceProductInputCard from './ServiceProductInputCard.vue';

export default {
    name: 'user-business-products',
    data() {
        return {
            business: {},
            products: []
        }
    },
    components: {
        ServiceProductInputCard
    }
}
</script>

<template>
    <div id="userBusinessProducts">
        <slot></slot>
        <div class="grid-col-4">
            <service-product-input-card :business="business" model-type='product' v-for='(product, index) in products' :key='index' :model='product'></service-product-input-card>
            <div>
                <button type='button' @click='products.push({ image: "", name: "", description: ""})' class='btn btn-bigAddMore'>+</button>
            </div>
        </div>
    </div>
</template>

<script>
import ServiceProductInputCard from './ServiceProductInputCard.vue';

export default {
    name: 'user-business-products',
    props: {
        business: { required: true },
        products: null
    },
    data() {
        return {

        }
    },
    components: {
        ServiceProductInputCard
    }
}
</script>

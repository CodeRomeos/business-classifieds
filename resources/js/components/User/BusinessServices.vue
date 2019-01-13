<template>
    <div id="userBusinessServices" class='clearfix'>
        <slot></slot>
        <div class="grid-col-4">
            <service-product-input-card :business="business" model-type="service" v-for='(service, index) in services' :key='index' :model='service'></service-product-input-card>
            <div>
                <button type='button' @click='services.push({ image: "", name: "", description: ""})' class='btn btn-bigAddMore'>+</button>
            </div>
        </div>
    </div>
</template>

<script>
import ServiceProductInputCard from './ServiceProductInputCard.vue';

export default {

    name: 'user-business-services',
    props: {
        business: { required: true },
        services: null
    },
    data() {
        return {

        }
    },
    components: {
        ServiceProductInputCard
    },
    methods: {

    }
}
</script>

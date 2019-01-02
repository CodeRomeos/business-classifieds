<template>
    <div id="userBusinessServices" class='clearfix'>
        <slot></slot>
        <service-product-input-card v-for='(service, index) in services' :key='index' :model='service'></service-product-input-card>
        <button type='button' @click='services.push({})' class='btn btn-bigAddMore'>+</button>
    </div>
</template>

<script>
import ServiceProductInputCard from './ServiceProductInputCard.vue';

export default {

    name: 'user-business-services',
    data() {
        return {
            business: {},
            services: []
        }
    },
    components: {
        ServiceProductInputCard
    },
    methods: {
        submit() {
            const formData = new FormData()
            formData.append('myFile', this.selectedFile, this.selectedFile.name)
            axios.post('my-domain.com/file-upload', formData)
        }
    }
}
</script>

<template>
    <div class="serviceProductInputCard">
        <form @submit.prevent="submit">
            <div class="imagePreview">
                <div class="input-container" v-if='!image'>
                    <label class='btn btn-bigAddMore'>
                        <span class='fa fa-image'></span>
                        <input type="file" @change="onFileChange">
                    </label>
                </div>
                <img v-else :src='imageUrl'>
            </div>
            <div class="input-container">
                <input type='text' class="input-field" value="" v-model="model.name" placeholder="Name">
            </div>
            <div class="input-container">
                <textarea class='input-field' v-model="model.description" rows='4' placeholder="Description"></textarea>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'service-product-input-card',
    props: [
        'model'
    ],
    data() {
        return {
            image: null,
            imageUrl: null
        }
    },
    methods: {
        onFileChange() {
            this.image = event.target.files[0];
            this.imageUrl = URL.createObjectURL(this.image);
        }
    }
}
</script>

<style lang='scss' scoped>

.btn-bigAddMore {
    width: 100%;
    input[type=file] {
        display: none;
    }
}

.imagePreview {
    width: 100%;
    max-height: 150px;
    overflow: hidden;
    img {
        width: 100%;
        height: auto
    }
}
</style>



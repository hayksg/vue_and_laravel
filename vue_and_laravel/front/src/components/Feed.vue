<template>
    <div>
        <h1 class="mb-4">Feed</h1>

        <ul class="list-unstyled list-group">
            <li v-for="product in products" class="list-group-item mb-2">{{ product.name }} | {{ product.price }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: []
            }
        },

        created() {
            this.$http.get('api/products')
                .then(response => {
                    this.products = response.body;
                });
        }
    }
</script>
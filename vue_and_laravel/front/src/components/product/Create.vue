<template>
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4">Create product</h4>
            <form>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" v-model="product.name">
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" v-model="product.price">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" v-model="product.description"></textarea>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-outline-success" v-show="product.name && product.price > 0 && product.description" @click="create">
                        Create
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {
                    name: '',
                    price: 0,
                    description: ''
                }
            }
        },
        methods: {
            create() {
                this.$http.post('api/products', this.product)
                    .then(response => {
                        this.$router.push('/feed'); // redirect to route feed
                    });
            }
        }
    }

</script>

<style>
    form textarea.form-control { min-height: 180px; }
</style>
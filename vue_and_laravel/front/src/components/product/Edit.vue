<template>
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4">Edit product</h4>
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
                    <button type="button" class="btn btn-outline-success" v-show="product.name && product.price > 0 && product.description" @click="update">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert'

    export default {
        data() {
            return {
                product: {}
            }
        },
        created() {
            this.getProduct();
        },
        methods: {
            getProduct () {
                this.$http.get('api/products/' + this.$route.params.product)
                    .then(response => {
                        this.product = response.body
                    })
            },
            update() {
                this.$http.put('api/products/' + this.$route.params.product, this.product)
                    .then(response => {
                        swal("Updated!", "Your product has been updated!", "success");
                    });
            }
        }
    }

</script>

<style>
    form textarea.form-control { min-height: 180px; }
</style>
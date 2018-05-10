<template>
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4">Create product</h4>
            <form v-on:submit.prevent="create">
                <div class="form-group">Image:
                    <div class="custom-file mt-2">
                        <input id="logo" type="file" class="custom-file-input" @change="imageChanged">
                        <label for="logo" class="custom-file-label">Choose file...</label>
                    </div>       
                </div>       

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" 
                           class="form-control" 
                           id="name"   
                           name="name"
                           v-validate="'required'"
                           v-model="product.name">
                    <div class="help-block alert alert-danger" v-show="errors.has('name')">{{ errors.first('name') }}</div>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" 
                           class="form-control" 
                           name="price"
                           id="price" 
                           v-validate="'min_value:1|max_value:50'"
                           v-model="product.price">
                    <div class="help-block alert alert-danger" v-show="errors.has('price')">{{ errors.first('price') }}</div>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" v-model="product.description"></textarea>
                </div>

                <div class="form-group">
                    <!--
                    <button type="button" class="btn btn-outline-success" v-show="product.name && product.price > 0 && product.description" @click="create">
                        Create
                    </button>
                    -->
                    <input type="submit" value="Create" class="btn btn-outline-success">
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
                    description: '',
                    image: ''
                }

            }
        },
        methods: {
            imageChanged(e) {
                var fileReader = new FileReader();

                fileReader.readAsDataURL(e.target.files[0]);

                fileReader.onload = (e) => {
                    this.product.image = e.target.result;
                }
            },

            create() {
                this.$validator.validate().then(result => {
                    if (!result) {
                        //alert('Fill the form please');
                        swal("Oops!", "Fill the form please", "error");
                    } else {
                        this.$http.post('api/products', this.product)
                            .then(response => {
                            this.$router.push('/feed'); // redirect to route feed
                        });
                    }
                });
                
            }
        }
    }

</script>

<style>
    form textarea.form-control { min-height: 180px; }
</style>
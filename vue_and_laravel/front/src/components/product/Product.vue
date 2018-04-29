<template>
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="http://images.amazon.com/images/G/01/electronics/detail-page/hp-a67xx-hero_monitor.jpg" class="img-fluid">

            <div class="card-body">
                <h4>{{ product.name }}</h4>
                <p>${{ product.price }}</p>
                <hr>
                <p class="text-center">
                    <a href="#" class="btn btn-outline-secondary">Wish list</a>
                    <a href="#" class="btn btn-success">Buy</a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product']
    }
</script>
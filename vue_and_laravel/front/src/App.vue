<template>
    <div id="app">
        <navbar></navbar>
        <router-view></router-view>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';

export default {
    components: {
        'navbar': Navbar,
    }
}

</script>

<style>
    body {
        padding-top: 120px;
    }
</style>

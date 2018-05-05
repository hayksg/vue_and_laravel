<template>
    <div id="app">
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container">
                <router-link to="/" class="navbar-brand">Bootswatch</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    
                    <ul class="navbar-nav">
                        <router-link to="/feed" tag="li" class="nav-item" v-if="isAuth">
                            <a class="nav-link">Products</a>
                        </router-link>
                    </ul>

                    <ul class="nav navbar-nav ml-auto">
                        <router-link to="/login" tag="li" class="nav-item" v-if="!isAuth">
                            <a class="nav-link">Login</a>
                        </router-link>

                        <router-link to="/register" tag="li" class="nav-item" v-if="!isAuth">
                            <a class="nav-link">Register</a>
                        </router-link>

                        <router-link to="/products/create" tag="li" class="nav-item" v-if="isAuth">
                            <a class="nav-link">Create</a>
                        </router-link>

                        <router-link to="/logout" tag="li" class="nav-item" v-if="isAuth">
                            <a class="nav-link">Logout</a>
                        </router-link>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isAuth: null
            }
        },

        created() {
            this.isAuth = this.$auth.isAuthenticated();
            this.setAuthenticatedUser();
        },

        methods: {
            setAuthenticatedUser() {
                this.$http.get('api/user')
                    .then(response => {
                        this.$auth.setAuthenticatedUser(response.body)
                    })
            }
        }
    }
</script>

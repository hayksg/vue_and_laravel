<template>
    <div class="row">
        <div class="col-lg-6 col-md-7 col-sm-8">
            <form>             
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" v-model="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" v-model="password">
              </div>
              <button type="button" class="btn btn-outline-secondary" @click="login">Login</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                password: '',
            }
        },
        methods: {
            login() {
                var data = {
                    client_id: 2,
                    client_secret: 'RUvyEteSAm0U3U0K4wHbKzyNXP1rL9Whs1kSp5CO',
                    grant_type: 'password',
                    username: this.email,
                    password: this.password
                }

                this.$http.post('http://test.loc/oauth/token', data)
                    .then(response => {
                        this.$auth.setToken(response.body.access_token, response.body.expires_in + Date.now());

                        this.$router.push("/feed");
                    });
                    /*
                    .then(function(response) {
                        console.log(response);
                    });
                    */
            }
        }
    }
</script>

<style>
    
</style>
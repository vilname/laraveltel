<template>
    <div class="container">
        <div class="row">
            <form @submit.prevent="send">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" v-model="user.email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" v-model="user.password" class="form-control" id="password">
                </div>
                <input type="submit" class="btn btn-primary" value="Войти">
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Login",
    data: () => ({
        user: {
            email: '',
            password: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }),
    methods: {
        send: function () {
            axios.post('/api/auth', this.user)
                .then((response) => {
                    axios.post('/oauth/token', response.data.data)
                        .then((res) => {
                            localStorage.setItem('access_token', res.data.access_token)
                        })
                })
                .catch((error) => {
                    console.log('error', error)
                })
        }
    }
}
</script>

<style scoped>

</style>

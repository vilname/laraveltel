<template>
    <div class="container">
        <div class="row">
            <form @submit.prevent="send">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" v-model="user.email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="user.name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" v-model="user.password" class="form-control" id="password">
                </div>
                <input type="submit" class="btn btn-primary" :disabled="!formReady" value="Submit">
            </form>
        </div>
    </div>

</template>

<script>

import axios from 'axios'

export default {
    name: "Register",
    data: () => ({
        user: {
            email: '',
            name: '',
            password: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }),
    methods: {
        send: function (e) {
            // e.preventDefault()

            axios.post('/api/register', this.user)
                .then((response) => {
                    console.log('response', response)
                })
                .catch((error) => {
                    console.log('error', error)
                })
        }
    },
    computed: {
        formReady() {
            return Object.values(this.user).every(val => val !== '')
        }
    }
}
</script>

<style scoped>

</style>

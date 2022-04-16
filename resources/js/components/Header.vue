<template>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Features1</a>
                        <a class="nav-item nav-link" href="#">Pricing</a>
                        <router-link :to="'/login'" class="nav-item nav-link">Login</router-link>
                        <router-link :to="'/register'" class="nav-item nav-link">Register</router-link>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    name: "Header",
    data: () => {
        return ({});
    }
}
</script>

<style scoped>

</style>

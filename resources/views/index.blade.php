<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Моя тестовая страница</title>
    <link rel="stylesheet" href={{ asset('public/css/bootstrap.min.css') }}>
</head>
<body>
<div id="app">
    <v-header></v-header>
    <router-view />
</div>
<script src="public/js/app.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @include('inc.link')
    <title>{{ config('app.name', 'Task1') }}</title>

    <style>
        .login-container{
            margin-top: 5vh;
            padding: 10px
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <header class="main-header">
        @include('inc.navbar')
    </header>
    <div class="container">
        <div class="login-container">
            @include('auth.login')
        </div>
    </div>
    @include('inc.link2')
</body>

</html>

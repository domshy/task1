@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @include('inc.link')
        <title>{{ config('app.name', 'Task1') }}</title>

        <style>
            body {
                background-color: whitesmoke;
            }

            .reg-container {
                margin-top: 5vh;
                padding: 10px;
            }
        </style>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <header class="main-header">
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->

                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>TAsSK</b>ONE1</span>
            </a>
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <div class="content">
            <h1>Welcome</h1>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Colleges</span>
                        </div>

                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                        <div class="info-box-content">
                            <a href='/posts'><span class="info-box-text">Students</span></a>
{{-- 
                            @foreach ($posts as $post)
                                <span class="info-box-number"{{ $post->posts()->count() }}></span>
                            @endforeach --}}
                        </div>

                    </div>
                </div>
            </div>

    </body>

    </html>
@endsection

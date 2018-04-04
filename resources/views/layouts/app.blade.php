<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    @yield('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    
    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="row">
                @if (Auth::check())
                    <div class="col-lg-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('profiles.index')}}">My Profile</a>
                            </li>

                            <li class="list-group-item">
                                <a data-toggle="collapse" href="#posts" role="button" aria-expanded="false" aria-controls="posts">
                                    Post >>
                                </a>
                            </li>
                            <div class="collapse" id="posts">
                                <li class="list-group-item pl-5">
                                    <a href="{{route('posts.index')}}">Post List</a>
                                </li> 
                                <li class="list-group-item pl-5">
                                    <a href="{{route('posts.create')}}">Create New Post</a>
                                </li>
                                <li class="list-group-item pl-5">
                                    <a href="{{route('posts.trashed')}}">Trashed Post</a>
                                </li>
                            </div>

                            <li class="list-group-item">
                                <a data-toggle="collapse" href="#categories" role="button" aria-expanded="false" aria-controls="posts">
                                    Category >>
                                </a>
                            </li>
                            <div class="collapse" id="categories">
                                <li class="list-group-item pl-5">
                                    <a href="{{route('categories.create')}}">Add new category</a>
                                </li>
                                <li class="list-group-item pl-5">
                                    <a href="{{route('categories.index')}}">Category List</a>
                                </li>
                            </div>

                            <li class="list-group-item">
                                <a data-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
                                    Tag >>
                                </a>
                            </li>
                            <div class="collapse" id="tags">
                                <li class="list-group-item pl-5">
                                    <a href="{{route('tags.create')}}">Add new Tag</a>
                                </li>
                                <li class="list-group-item pl-5">
                                    <a href="{{route('tags.index')}}">Tag List</a>
                                </li>
                            </div>

                            @if (Auth::user()->admin)
                                <li class="list-group-item">
                                    <a data-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="users">
                                        User >>
                                    </a>
                                </li>
                                <div class="collapse" id="users">
                                    <li class="list-group-item pl-5">
                                        <a href="{{route('users.index')}}">User List</a>
                                    </li>
                                    <li class="list-group-item pl-5">
                                        <a href="{{route('users.create')}}">Create user</a>
                                    </li>
                                </div>
                                <li class="list-group-item">
                                    <a href="{{ route('settings.index') }}">Settings</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="mx-auto col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>

    @yield('scripts')

</body>
</html>

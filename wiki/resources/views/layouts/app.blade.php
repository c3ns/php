<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                        <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        @auth
                            <li><a class="nav-link" href="{{ route('posts.create') }}">Create New Post</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.index') }}">My Posts</a>
                                </div>
                            </li>
                            @can('createCategory', App\Category::class)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">Stats</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('admin.posts') }}">Posts</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('cat.index') }}">Categories</a>
                                        <a class="dropdown-item" href="{{ route('cat.create') }}">Create Category</a>
                                    </div>
                                </li>
                            @endcan
                        @endauth
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
        @if(Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>

        @endif
        <main class="py-4 container">
            <div class="row">
                <div class="col-sm-3 mt-2">
                    @auth
                    <div class="alert alert-primary">
                    <input id="search" class="form-control form-control-lg" type="text" name="search" placeholder="search..."></div>
                    @endauth
                    <div class="alert alert-primary">Categories:</div>
                    <ul class="list-group">
                        @foreach($cat_list as $cat)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href={{ route('cat.show', ['id' =>$cat->id]) }}><small>{{ $cat->name }}</small></a>
                                <span class="badge badge-primary badge-pill">{{ $cat->post->count() }}</span>

                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="results" class="col-sm-9">
                    @yield('content')
                </div>
            </div>


        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $( document ).ready(function() {
            $('#search').on("input",function () {
               $value = $(this).val();
                   $.ajax({
                       method : 'GET',
                       url : '{{URL::to('search')}}',
                       data:{'search':$value}
                   }).done(function(data) {
                            $('#results').html(data);
                            console.log(data);
                   });
            });
        });
    </script>
</body>
</html>

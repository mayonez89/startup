<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MeeTeach</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MeeTeach
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <?php $user=\Illuminate\Support\Facades\Auth::user();?>
                    @if($user!==null)
                        <a href="{{ universitiesList()[$user->university] }}" target="_blank">{{$user->university}}</a>
                    @endif

                    <div style="margin-left: 30px; margin-right: 30px"> Search:
                        <input type="text" id="searchF" placeholder="(ex. mathematics, football,...)">
                        <button class="searchB">SEARCH!</button>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        let interests = [];
        $( document ).ready(function() {
            $('#interest-list').on('change', function () {
                let dis = $(this);
                enter(dis.val());
                dis.val('');
            });

            function enter(value) {
                if(!interests.includes(value)) {
                    interests.push(value);
                    let retVal = '<div class="">' + value +
                        '<div class="rem" id="' + interests.length +'">X</div>' +
                        '</div>';
                    $('#my-interests').append(retVal);
                }
            }

            $(document).on("click", ".rem", function (e) {
                console.log('t');
                let val = $(this).val();
                if(interests.includes(val)) {
                    interests.splice(val,1);
                }
                $(this).parent().remove();
                console.log(interests);
            });

            Array.prototype.remove = function() {
                var what, a = arguments, L = a.length, ax;
                while (L && this.length) {
                    what = a[--L];
                    while ((ax = this.indexOf(what)) !== -1) {
                        this.splice(ax, 1);
                    }
                }
                return this;
            };

            $('#update-profile').on('click', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post('/update-profile', {interests: interests}, function (result) {
                        console.log(result);
                    }
                );
            });

            $('.remove-interest').on('click', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let dis = $(this);
                let id = dis.attr('id');
                $.post('/remove-interest', {id: id}, function (response) {
                    $('#rm-'+id).remove();
                });
            });

            $('.searchB').on('click', function () {
                // console.log('finging');
                let src = $('#searchF').val();
                // console.log(src);
                window.location.replace('/search?search='+src);
            });

        });
    </script>
</body>
</html>

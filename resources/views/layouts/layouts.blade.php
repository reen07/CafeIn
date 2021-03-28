<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    


    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100%;
            margin: 0;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        li {
            list-style: none;
        }
        header {
            width: 100%;
            height: 5%;
            background-color: rgb(182, 182, 182);
            opacity: 0.7;
            position: fixed;
        }
        header h2 {
            line-height: 10px;
        }
        .nav {
            display: flex;
            justify-content: flex-end;
            margin: 15px;
        }
        .nav ul{
            text-align:right; 
             
        }       
        .nav li {
            padding-top: 2em;
        }

        .btn-main-nav {
            display: inline-block;
            width: 5em;
            height: 1.5em;
            text-align:center;
            padding: 1.8em 0;
            text-decoration: none;   
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
            border-radius: 50%;/*角の丸み*/
            font-weight: bold;
            text-shadow: -1px -1px rgba(255, 255, 255, 0.44), 1px 1px rgba(0, 0, 0, 0.38);
        }
    
        .btn-main-nav:active {
           /*ボタンを押したとき*/
           -webkit-transform: translateY(4px);
           transform: translateY(4px);
           box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2);
           border-bottom: none;
        }

        .mine {
            background-color: lightpink;
            color: lightcoral;
            border-bottom: solid 3px #627295;
            opacity: 0.7;
        }

        .logout {
            background-color: lightblue;
            color: lightskyblue;
            border-bottom: solid 3px #627295;
            opacity: 0.7;
        }
        .TimeLine {
            background: #DE92DC;/*ボタン色*/
            color: #D26BCF;/*ボタン色と同じに*/
            border-bottom: solid 3px #627295;
            opacity: 0.7;
        }

        .Search {
            background: lightskyblue;/*ボタン色*/
            color: #3a61b6;/*ボタン色と同じに*/
            border-bottom: solid 3px #627295;
            opacity: 0.7;
        }

        .NewCreate {
            background: lightgreen;/*ボタン色*/
            color: #51B218;/*ボタン色と同じに*/
            border-bottom: solid 3px #627295;
             opacity: 0.7;
        }

        .Profiel {
            background: #DDE548 ;/*ボタン色*/
            color: #D3DD25;/*ボタン色と同じに*/
            border-bottom: solid 3px #627295;
            opacity: 0.7;
        }
        .About {
            background: #AE46D1;/*ボタン色*/
            color: #9625BB;/*ボタン色と同じに*/
            border-bottom: solid 3px #627295;
            opacity: 0.7;
        }


        .MainTimeLime {
            height: 1000px;
        }




        
    </style>
    
</head>
<body>
    {{-- <header>
        <h2>CafeIn</h2>
    </header> --}}

    <div id="fixed">
        <div class="nav">
            <ul>

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
                        <li><a id="navbarDropdown" class="btn-main-nav mine" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        </li>
                        <li><a class="btn-main-nav logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                        <li><a href="{{ url('posts/timeline')}}" class="btn-main-nav TimeLine">TimeLine</a></li>
                        <li><a href="{{ url('posts/newcreate')}}" class="btn-main-nav NewCreate">NewCreate</a></li>
                        <li><a href="#" class="btn-main-nav Profiel">EditProfiel</a></li>
                @endguest
            </ul>
        </div>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</body>
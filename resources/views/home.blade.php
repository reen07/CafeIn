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
    <link href="{{ secure_asset('/css/style.css') }}" rel="stylesheet">
    
    <style>
        body {
    margin: 0;
    padding: 0;
    background: rgba(255, 255, 255, 0.8);
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.contents {
    display: table;
    width: 100%;
    height: 45vh;
    padding: 0;
    margin: 0;
    background-color: rgba(255, 255, 255, 0.8);
    background-size: cover;
    opacity: 0.9;
    box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.8);
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-delay: .3s;
    transition-delay: .3s;
    -webkit-transition-duration: .5s;
    transition-duration: .5s;
}

.contents__inner {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.contents__inner h1 {
    margin: 0;
    padding: 0;
    color: rgb(122, 122, 122);
    font-size: 40px;
    font-family: Futura, "Century Gothic", "helvetica neue", arial, sans-serif !important;
    font-style: italic;
}

.contents__inner p {
    margin-top: 20px;
    color: #fff;
    font-size: 20px;
}

.contents__inner p span {
    border-bottom: 1px solid #fff;
    font-family: Montserrat;
}

.contents__inner img {
    margin-bottom: 80px;
}

.drawer-menu {
    box-sizing: border-box;
    position: fixed;
    top: 0;
    right: 0;
    width: 300px;
    height: 100%;
    padding: 120px 0;
    background: rgb(114, 114, 114);
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .5s;
    transition-duration: .5s;
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    -webkit-transform-origin: right center;
    -ms-transform-origin: right center;
    transform-origin: right center;
    -webkit-transform: perspective(500px) rotateY(-90deg);
    transform: perspective(500px) rotateY(-90deg);
    opacity: 0.;
}

.drawer-menu li {
    text-align: center;
}

.drawer-menu li a {
    display: block;
    height: 50px;
    line-height: 50px;
    font-size: 14px;
    color: rgb(255, 255, 255);
    -webkit-transition: all .8s;
    transition: all .8s;
}

.drawer-menu li a:hover {
    color: #1a1e24;
    background: #fff;
}

.check {
    display: none;
}

.menu-btn {
    position: fixed;
    display: block;
    top: 40px;
    right: 40px;
    display: block;
    width: 40px;
    height: 40px;
    font-size: 10px;
    text-align: center;
    cursor: pointer;
    z-index: 3;
}

.bar {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 40px;
    height: 1px;
    background:rgb(175, 174, 174);
    -webkit-transition: all .5s;
    transition: all .5s;
    -webkit-transform-origin: left top;
    -ms-transform-origin: left top;
    transform-origin: left top;
}

.bar.middle {
    top: 15px;
    opacity: 1;
}

.bar.bottom {
    top: 30px;
    -webkit-transform-origin: left bottom;
    -ms-transform-origin: left bottom;
    transform-origin: left bottom;
}

.menu-btn__text {
    position: absolute;
    bottom: -15px;
    left: 0;
    right: 0;
    margin: auto;
    color: rgb(175, 174, 174);
    -webkit-transition: all .5s;
    transition: all .5s;
    display: block;
    visibility: visible;
    opacity: 1;
    font-family: Montserrat;
}

.menu-btn:hover .bar {
    background: #999;
}

.menu-btn:hover .menu-btn__text {
    color: #999;
}

.close-menu {
    position: fixed;
    top: 0;
    right: 300px;
    width: 100%;
    height: 100vh;
    background: rgba(0,0,0,0);
    cursor: url(http://theorthodoxworks.com/demo/images/cross.svg),auto;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    visibility: hidden;
    opacity: 0;
}

.check:checked ~ .drawer-menu {
    -webkit-transition-delay: .3s;
    transition-delay: .3s;
    -webkit-transform: none;
    -ms-transform: none;
    transform: none;
    opacity: 1;
    z-index: 2;
}

.check:checked ~ .contents {
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    -webkit-transform: translateX(-300px);
    -ms-transform: translateX(-300px);
    transform: translateX(-300px);
}

.check:checked ~ .menu-btn .menu-btn__text {
    visibility: hidden;
    opacity: 0;
}

.check:checked ~ .menu-btn .bar.top {
    width: 56px;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

.check:checked ~ .menu-btn .bar.middle {
    opacity: 0;
}

.check:checked ~ .menu-btn .bar.bottom {
    width: 56px;
    top: 40px;
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

.check:checked ~ .close-menu {
    -webkit-transition-duration: 1s;
    transition-duration: 1s;
    -webkit-transition-delay: .3s;
    transition-delay: .3s;
    background: rgba(0,0,0,.5);
    visibility: visible;
    opacity: 1;
    z-index: 3;
}



.btn-square-raised {
    display: inline-block;
    width: 10em;
    height: 2em;
    text-align:center;
    padding: 4em 0;
    margin: 10% 2%; 
    text-decoration: none;   
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
    border-radius: 50%;/*角の丸み*/
    font-weight: bold;
    text-shadow: -1px -1px rgba(255, 255, 255, 0.44), 1px 1px rgba(0, 0, 0, 0.38);
  }
    
  .btn-square-raised:active {
    /*ボタンを押したとき*/
    -webkit-transform: translateY(4px);
    transform: translateY(4px);
    box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2);
    border-bottom: none;
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

.MyPage {
    background: lightskyblue;/*ボタン色*/
    color: #3a61b6;/*ボタン色と同じに*/
    border-bottom: solid 3px #627295;
    opacity: 0.7;
}

.NewCreate {
    background: #85CB5B;/*ボタン色*/
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

.Search {
    background: #EE8B4F;/*ボタン色*/
    color: #D96925;/*ボタン色と同じに*/
    border-bottom: solid 3px #627295;
    opacity: 0.7;
}

.About {
    background: #AE46D1;/*ボタン色*/
    color: #9625BB;/*ボタン色と同じに*/
    border-bottom: solid 3px #627295;
    opacity: 0.7;
}

.top {
    margin-left: 25%
}

.hyou{
    padding-left: 100px;
    padding-bottom: 50px;
}

@media screen and (max-width: 480px){
    .btn-square-raised {
        display: inline-block;
        width: 6em;
        height: 3em;
        text-align:center;
        padding: 2em 0.5em;
        text-decoration: none;   
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
        border-radius: 50%;/*角の丸み*/
        font-weight: bold;
        text-shadow: -1px -1px rgba(255, 255, 255, 0.44), 1px 1px rgba(0, 0, 0, 0.38);
      }
        
      .btn-square-raised:active {
        /*ボタンを押したとき*/
        -webkit-transform: translateY(4px);
        transform: translateY(4px);
        box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2);
        border-bottom: none;
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

.MyPage {
    background: lightskyblue;/*ボタン色*/
    color: #3a61b6;/*ボタン色と同じに*/
    border-bottom: solid 3px #627295;
    opacity: 0.7;
}

.NewCreate {
    background: #85CB5B;/*ボタン色*/
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

.Search {
    background: #EE8B4F;/*ボタン色*/
    color: #D96925;/*ボタン色と同じに*/
    border-bottom: solid 3px #627295;
    opacity: 0.7;
}

.About {
    background: #AE46D1;/*ボタン色*/
    color: #9625BB;/*ボタン色と同じに*/
    border-bottom: solid 3px #627295;
    opacity: 0.7;
}
    
    .top {
        margin: 0 auto;
        width: 100%;
    }
    
    .hyou{
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 50px;
    }

}
    </style>

</head>

<body>
    <header>
        <input type="checkbox" class="check" id="checked">
            <label class="menu-btn" for="checked">
                <span class="bar top"></span>
                <span class="bar middle"></span>
                <span class="bar bottom"></span>
                <span class="menu-btn__text">MENU</span>
            </label>
            <label class="close-menu" for="checked"></label>
            <nav class="drawer-menu">
                <ul>
                    <li><a href="#">TOP</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">TERMS</a></li>
                    <li><a href="#">HOW TO USE</a></li>
                </ul>
            </nav>
    </header>

    <div class="contents">
        <div class="contents__inner">
            <img class="img-thumbnail" src="./img/toprenan.jpg" alt="Thumbnail image" width="150px" height="150px">
            <h1>{{ Auth::user()->name }}</h1>
            <div class="message">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{__('welcome page! ')}}
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>

    <div class="top">
    <table>
        <tr>
        <th class="hyou"><a href="/users/show?id={{ Auth::user()->id }}" class="btn-square-raised MyPage">MyPage</a></th>
        <th class="hyou"><a href="{{ url('posts/timeline')}}" class="btn-square-raised TimeLine">TimeLine</a></th>
        <th class="hyou"><a class="btn-square-raised logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </th>
        </tr>
        <tr>
        <th class="hyou"><a href="#" class="btn-square-raised Search">Search</a></th>
        <th class="hyou"><a href="{{ url('posts/newcreate')}}" class="btn-square-raised NewCreate">NewCreate</a></th>
        <th class="hyou"><a href="#" class="btn-square-raised About">About</a></th>
        </tr>
    </table>
    </div>



    <div class="center">

    </div>



    <footer>

    </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

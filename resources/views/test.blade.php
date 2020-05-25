<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('title')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="header">
        <h1><a href="{{ url('/') }}"><img class="logo" src="{{ asset('images/logo.png') }}" width="100" height="56" alt="logo"></a></h1>
        <nav>
            <ul id="navi">
                <li><a href="#">Day</a></li>
                <li><a href="#">Month</a></li>
                <li><a href="#">Want</a></li>
                <li><a href="#">Do</a></li>
                <li><a href="#">Objective</a></li>
                <li><a href="#">Mypage</a></li>
            </ul>
        </nav>
        <!-- ボタン部分ここを後で追加するだけ-->
        <div class="nav_btn" id="nav_btn">
            <span class="hamburger_line hamburger_line1"></span>
            <span class="hamburger_line hamburger_line2"></span>
            <span class="hamburger_line hamburger_line3"></span>
        </div>
        <div class="nav_bg" id="nav_bg"></div>
        <!-- /ボタン部分ここを後で追加するだけ-->

    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        $(function() {

            /* SP menu */
            function toggleNav() {
                var body = document.body;
                var hamburger = document.getElementById('nav_btn');
                var blackBg = document.getElementById('nav_bg');

                hamburger.addEventListener('click', function() {
                    body.classList.toggle('nav_open'); //メニュークリックでnav-openというクラスがbodyに付与
                });
                blackBg.addEventListener('click', function() {
                    body.classList.remove('nav_open'); //もう一度クリックで解除
                });
            }
            toggleNav();

        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>ToDo | Top</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="background background-img">
        <div class="wrapper">

            <nav>
                <div class="container">
                    <div class="menu">
                        <ul class="flex">
                            <li><a href="{{ action('TopController@top') }}"><img class="logo" src="{{ ('images/logo.png') }}" width="100" height="56" alt="logo"></a></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="button-area">
                <p>あああああ</p>
                <div class="inline-block-buttton">
                    <a href="{{ action('AdminController@login') }}" class="btn-login">login</a>
                </div>
                <div class="inline-block-buttton">
                    <a href="{{ action('AdminController@register') }}" class="btn-register">register</a>
                </div>
            </div>
            <div class="footer">
                <div class="copyright">copyright 2020 @pararinrinrin.</div> 　
            </div>
        </div>
    </div>

</body>

</html>
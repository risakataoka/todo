<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <title>@yield('title')</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <nav>
        <div class="menu">
          <ul class="flex">
            <li><a href="{{ url('/') }}"><img class="logo" src="{{ asset('images/logo.png') }}" width="100" height="56" alt="logo"></a></li>
            <li>
              <a href="{{ url('additem/day') }}">
                <p><img class="menu-icon" src="{{ asset('images/day.png') }}" width="25" height="26 " alt="day">Day</p>
              </a>
            </li>
            <li>
              <a href="{{ url('additem/month') }}">
                <p><img class="menu-icon" src="{{ asset('images/month.png') }}" width="25" height="26 " alt="month">Month</p>
              </a>
            </li>
            <li>
              <a href="{{ url('additem/want') }}">
                <p><img class="menu-icon" src="{{ asset('images/want.png') }}" width="25" height="26 " alt="want">Want</p>
              </a>
            </li>
            <li>
              <a href="{{ url('additem/do') }}">
                <p><img class="menu-icon" src="{{ asset('images/do.png') }}" width="25" height="26 " alt="do">Do</p>
              </a>
            </li>
            <li>
              <a href="{{ url('additem/objective') }}">
                <p><img class="menu-icon" src="{{ asset('images/objective.png') }}" width="25" height="26 " alt="objective">Objective</p>
              </a>
            </li>
            <li>
              <a href="{{ action('HomeController@mypage') }}">
                <p><img class="menu-icon" src="{{ asset('images/mypage.png') }}" width="25" height="26 " alt="mypage">Mypage</p>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="content">@yield('content')</div>

    </div>
    <div class="footer">
      <div class="copyright">copyright 2020 @pararinrinrin.</div> 　
    </div>
  </div>
  <link href="https://fonts.googleapis.com/css2?family=Gotu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">

  <script src="{{ mix('js/addItem.js') }}"></script>
  <script src="{{ mix('js/addItemMonth.js') }}"></script>
</body>

</html>
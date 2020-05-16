<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <title>@yield('title')</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://kit.fontawesome.com/9b52449f0b.js" crossorigin="anonymous"></script>
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

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ mix('js/addItem.js') }}"></script>
  <script src="{{ mix('js/addItemMonth.js') }}"></script>
  <script>
    $(function() {

      $('#Modal').on('show.bs.modal', function(event) { //ID部分をモーダルとして表示させるイベントが発生

        $('.modal-content tr').remove() //li要素をあらかじめ初期化

        var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得

        var date = button.data('day'); //日付を取得
        var data = button.data('task'); //予定を配列で取得
        var id = button.data('id'); //予定に付随したidを配列で取得

        var modal = $(this); //モーダルを取得

        $('.modal-title').text(date + '日の予定'); //日付をモーダルに反映

        for (var i = 0; i < data.length; i++) {
          $('.contents').append('<tr><td>' + data[i] + '</td><td><button type="submit" class="delete" value="削除" data-delete="' + id[i] + '"><i class="fas fa-trash-alt"></i></button></td></tr>'); //予定とidをモーダルに反映
        }

        /* Ajax で削除機能実装*/
        $('.delete').click(function() {
          //クリックしたボタンのdata属性からidを取得し、同じidを削除する
          var id = $(this).attr("data-delete");

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
              url: "/home/month/" + id,
              type: 'POST',
              data: {
                'id': id
              }
            })
            // Ajaxリクエストが成功した場合
            .done(function(data, textStatus, jqXHR) {
              //redirect_to 'home';
              window.location = '/home';
            })
            // Ajaxリクエストが失敗した場合
            .fail(function(data) {
              alert('失敗');
            });
        })
      })
    });
  </script>
</body>

</html>
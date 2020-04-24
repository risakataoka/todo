$(function() {
  /*$(".flg-icon").mouseover(function() {
    alert("こんにちは");
  });*/

  //ポップアップウィンドウ
  $(".flg-icon")
    .mouseover(function() {
      // 「?」にマウスが重なった場合の処理です。

      // ヘルプウィンドウのトップマージンを定義します。
      // 0だと「?」と上端が揃います。
      var marginTop = 0;

      // ヘルプウィンドウのレフトマージンを定義します。
      // 0だと「?」と左端が揃います。
      var marginLeft = 20;

      // ヘルプウィンドウ表示させる際のスピードを定義します。
      var speed = 300;

      // ヘルプウィンドウのオブジェクトを取得します。
      var popupObj = $(".flg-icon-window");

      if (!popupObj.length) {
        // ウィンドウがなければ作成します。
        popupObj = $("<p/>")
          .addClass("flg-icon-window")
          .appendTo($("body"));
      }

      // ウィンドウにメッセージを設定します。
      popupObj.text($(this).attr("data-message"));

      // ウィンドウのオフセットを計算します。
      var offsetTop = $(this).offset().top + marginTop;
      var offsetLeft = $(this).offset().left + marginLeft;

      // ウィンドウの位置を整え、表示します。
      popupObj
        .css({
          top: offsetTop,
          left: offsetLeft
        })
        .show(speed);
    })
    .mouseout(function() {
      // 「?」からマウスが離れた場合、テキストを空にしてウィンドウを隠します。
      $(".flg-icon-window")
        .text("")
        .hide("fast");
    });

  //windowの方　ポップアップウィンドウ
  $.fn.popupHelp = function(config) {
    /**
     * marginTop: 表示対象とウィンドウの高さの差分です。
     *   0を指定すると、上端が揃います。
     * marginLeft: 表示対象とウィンドウの横の差分です。
     *   0を指定すると、左端が揃います。
     * className: ウィンドウに設定するクラス名です。
     * speed: ウィンドウを表示する際の秒数[ms]です。
     */
    var defaults = {
      marginTop: 0,
      marginLeft: 20,
      className: "flg-icon-window",
      speed: 300
    };

    var options = $.extend(defaults, config);

    // ヘルプウィンドウのオブジェクトを準備します。
    var popupObj = $("<p/>")
      .addClass(defaults.className)
      .appendTo($("body"));

    return this.each(function() {
      $(this)
        .mouseover(function() {
          // 表示対象にマウスが重なった時の処理です。

          // ウィンドウにメッセージを設定します。
          popupObj.text($(this).attr("data-message"));

          // ウィンドウのオフセットを計算します。
          var offsetTop = $(this).offset().top + defaults.marginTop;
          var offsetLeft = $(this).offset().left + defaults.marginLeft;

          // ウィンドウの位置を整え、表示します。
          popupObj
            .css({
              top: offsetTop,
              left: offsetLeft
            })
            .show(defaults.speed);
        })
        .mouseout(function() {
          // 表示対象にマウスが重なった時の処理です。
          // テキストを空にして、ウィンドウを隠します。
          popupObj.text("").hide("fast");
        });
    });
  };

  //モーダルテスト
  $(function() {
    $(".js-modal-open").mouseover(function() {
      $(".js-modal").fadeIn();
      return false;
    });
    $(".js-modal-close").on("click", function() {
      $(".js-modal").fadeOut();
      return false;
    });
  });
});

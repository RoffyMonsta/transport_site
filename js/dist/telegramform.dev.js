"use strict";

(function ($) {
  $(".contact-form").submit(function (event) {
    event.preventDefault(); // Сохраняем в переменную form id текущей формы, на которой сработало событие submit

    var form = $('#' + $(this).attr('id'))[0]; // Сохраняем в переменную класс с параграфом для вывода сообщений

    var message = $(this).find(".contact-form__message");
    var fd = new FormData(form);
    $.ajax({
      url: "../send-message-to-telegram.php",
      type: "POST",
      data: fd,
      processData: false,
      contentType: false,
      success: function success(res) {
        var respond = $.parseJSON(res);

        if (respond.err) {
          message.html(respond.err).css('color', '#d42121');
          setTimeout(function () {
            message.text('');
          }, 6000);
        } else if (respond.okSend) {
          message.html(respond.okSend).css('color', '#21d4bb');
          setTimeout(function () {
            message.text('');
            location.reload();
          }, 2000);
        } else {
          alert('Необработанная ошибка. Проверьте консоль и устраните.');
        }
      }
    });
  });
})(jQuery);
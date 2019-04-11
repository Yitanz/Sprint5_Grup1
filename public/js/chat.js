//obrir i tancar el chat
(function($) {
    $(document).ready(function() {
        var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title'),
            $chatboxTitleClose = $('.chatbox__title__close'),
            $chatboxCredentials = $('.chatbox__credentials');
        $chatboxTitle.on('click', function() {
            $chatbox.toggleClass('chatbox--tray');
        });
        $chatboxTitleClose.on('click', function(e) {
            e.stopPropagation();
            $chatbox.addClass('chatbox--closed');
        });
        $chatbox.on('transitionend', function() {
            if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
        });
        $chatboxCredentials.on('submit', function(e) {
            e.preventDefault();
            $chatbox.removeClass('chatbox--empty');
        });
    });
})(jQuery);

//fi obrir i tancar el chat
var chat = {} //global object
chat.fetchMessages = function() {
  $.ajax({
    url: 'ajax/chat.php',
    type: 'post',
    data: {
      method: 'fetch'
    },
    success: function(data) {
      $('.chat .chatbox__body').html(data);
    }
  });
}
chat.throwMessage = function(message) {
  if ($.trim(message).length != 0) {
    $.ajax({
      url: 'ajax/chat.php',
      type: 'post',
      data: {
        method: 'throw',
        message: message  
      },
      success: function() {
        chat.fetchMessages();
        chat.chatbox__message.val('');
      }
    });
  }
}
chat.chatbox__message = $('.chat .chatbox__message');
chat.chatbox__message.bind('keydown', function(e) {
  if (e.keyCode === 13 && e.shiftKey === false) { //throw message
    chat.throwMessage($(this).val());
    e.preventDefault();
  }
});
chat.interval = setInterval(chat.fetchMessages, 1000);
chat.fetchMessages();

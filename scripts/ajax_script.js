$(document).ready(function() {
    $('.submit_btn').click(function() {
      var message = $('input[type="text"]').val();
  
      $.ajax({
        url: 'chat_ajax.php',
        type: 'POST',
        data: {
          message: message
        },
        success: function(response) {
          // Processar a resposta do servidor (se necessário)
          console.log(response);
        }
      });
    });
  });
  
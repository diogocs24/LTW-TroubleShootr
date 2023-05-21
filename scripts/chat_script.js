$(document).ready(function() {
    // Função para atualizar as mensagens do chat
    function updateChat() {
      $.ajax({
        url: 'check_messages.php',
        type: 'GET',
        success: function(response) {
          // Verificar se há novas mensagens
          if (response === 'new') {
            // Se houver novas mensagens, atualizar o chat
            $.ajax({
              url: 'chat_ajax.php',
              type: 'GET',
              success: function(response) {
                // Atualizar a visualização do chat com as mensagens recebidas do servidor
                $('.chat-container').html(response);
              }
            });
          }
        },
        complete: function() {
          // Iniciar uma nova verificação após o término da solicitação atual
          updateChat();
        },
        timeout: 5000 // Definir um tempo limite para a solicitação Ajax (em milissegundos)
      });
    }
  
    // Iniciar a primeira verificação
    updateChat();
  
    // Enviar mensagem quando o botão Enviar for clicado
    $('.submit_btn').click(function() {
      var message = $('input[type="text"]').val();
  
      $.ajax({
        url: 'send_message.php',
        type: 'POST',
        data: {
          message: message
        },
        success: function(response) {
          // Atualizar o chat após o envio da mensagem
          updateChat();
          $('input[type="text"]').val(''); // Limpar o campo de texto após o envio
        }
      });
    });
  });
  
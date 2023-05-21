$(document).ready(function() {
  $("#send-button").click(function() {
    var messageText = $("#message-input").val().trim();

    if (messageText !== "") {
      var currentTime = new Date().toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });
      var messageData = {
        idTicket: <?php echo $ticket->idTicket; ?>, // Substitua pelo valor correto
        idUser: <?php echo $loggedInUser->idUser; ?>, // Substitua pelo valor correto
        message: messageText,
        created_at: currentTime
      };

      $.ajax({
        url: "seu_arquivo_php.php", // Substitua pelo caminho do seu arquivo PHP responsável por salvar a mensagem
        method: "POST",
        data: messageData,
        success: function(response) {
          // Ação de sucesso, se necessário
        },
        error: function(xhr, status, error) {
          // Ação de erro, se necessário
        }
      });

      $("#message-input").val(""); // Limpa o campo de entrada após o envio
    }
  });
});

<?php
declare(strict_types=1);

require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');

$session = new Session();
$db = getDatabaseConnection();

$user = User::getUser($db, $session->getId());

// Obtém o ticket correspondente ao ID
$tickets = Ticket::getTicketsFromUser($db, $session->getId()); // Substitua "1" pelo ID do usuário atual

// Obtém o ID do ticket da URL (supondo que seja passado como um parâmetro chamado "id")
$ticketId = $_GET['ticket_id'] ?? null;

// Verifica se o ID do ticket foi fornecido
if (!$ticketId) {
    echo "Ticket not found.";
    exit;
}

$ticket = null;
foreach ($tickets as $t) {
    if ($t->idTicket == $ticketId) {
        $ticket = $t;
        break;
    }
}

// Verifica se o ticket foi encontrado
if ($ticket) {
    // Exibe os detalhes do ticket
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Ticket Details</title>
        <!-- Adicione os estilos CSS relevantes aqui -->
        <style>
            /* Estilos CSS para os detalhes do ticket */
            .ticket-details {
                margin: 20px;
            }

            .ticket-details h2 {
                font-size: 24px;
            }

            .ticket-details p {
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="ticket-details">
            <h2><?php echo $ticket->title; ?></h2>
            <p>Priority: <?php echo $ticket->ticket_priority; ?></p>
            <p>Message: <?php echo $ticket->ticket_message; ?></p>
            <p>Status: <?php echo $ticket->ticket_status; ?></p>
            <p>Agent: <?php echo $ticket->idAgent; ?></p>
        </div>
    </body>
    </html>
    <?php
} else {
    // Caso o ticket não seja encontrado
    echo "Ticket not found.";
}
?>

<?php
declare(strict_types=1);

require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');
require_once(__DIR__.'/../database/message.php');

$session = new Session();
$db = getDatabaseConnection();
$user = User::getUser($db, $session->getId());
$tickets = Ticket::getTicketsFromUser($db, $session->getId());
$ticketId = $_GET['ticket_id'] ?? null;
$messages = Message::getMessages($db, intval($ticketId));

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

if ($ticket) {
    draw_header_logged_in($db, $session->getId());
    draw_ticket_details_page($ticket, $messages);
    draw_footer(); 
    draw_script(); 
} else {
    echo "Ticket not found.";
}
?>

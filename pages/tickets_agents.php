<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');

$session = new Session();
$db = getDatabaseConnection();

$open_tickets = Ticket::getTicketsOpened($db);

draw_header_logged_in($db, $session->getId());
draw_answer_ticket($db, $open_tickets);
draw_script();		
?>

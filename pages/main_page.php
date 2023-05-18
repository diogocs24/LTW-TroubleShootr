<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');

$session = new Session();
$db = getDatabaseConnection();


if(!$session->isLoggedIn()) {
    header('Location: home_page1.php');
    die();
}

$user = User::getUser($db, $session->getId());
$tickets =  Ticket::getTicketsFromUser($db, $session->getId());

draw_header_logged_in();
draw_main_page($db, $tickets);
draw_footer(); 
draw_script(); 
?>


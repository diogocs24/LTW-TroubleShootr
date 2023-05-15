<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');

/*
$session = new Session();
$db = new PDO('sqlite:tickets.db');

if(!$session->isLoggedIn()) {
    header('Location: home_page1.php');
    die();
}
*/

draw_header_logged_in();
draw_main_page();
draw_footer(); 
draw_script(); 
?>


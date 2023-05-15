<?php declare(restrict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');

$session = new Session();
$db = new PDO('sqlite:tickets.db');

if(!$session->isLoggedIn()) {
    header('Location: home_page1.php');
    die();
}


draw_header();
draw_footer(); 
draw_script(); 
?>
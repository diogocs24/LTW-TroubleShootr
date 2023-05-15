<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/config.php');

$db = new PDO('sqlite:tickets.db');


draw_header();
draw_main(); 
draw_footer(); 
draw_script(); 
?>
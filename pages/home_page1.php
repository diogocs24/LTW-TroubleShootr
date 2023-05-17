<?php 
declare(strict_types = 1);
require_once(__DIR__.'/../a/session.php');
$session = new Session();

require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');

$user = null;

draw_header();
draw_home_page1();
draw_wrapper(); 
draw_footer(); 
draw_script(); 
?>
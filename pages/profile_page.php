<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');

$session = new Session();
$db = getDatabaseConnection();

$user = User::getUser($db, $session->getId());

draw_header_logged_in($db, $session->getId());
draw_profile($user->username, $user->email);
draw_footer(); 
draw_script(); 
?>
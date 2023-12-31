<?php declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');
require_once(__DIR__.'/../database/departments.php');


$session = new Session();
$db = getDatabaseConnection();
$departments = Department::getAllDepartments($db);

draw_header_logged_in($db,$session->getId());
draw_submit_ticket($departments);
draw_script();		
?>

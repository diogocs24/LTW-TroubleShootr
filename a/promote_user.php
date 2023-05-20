<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');
require_once(__DIR__.'/../database/departments.php');

$session = new Session();
$db = getDatabaseConnection();

$username1 = $_POST['username1'];
$idUser = User::getUserId($db, $username1);
if(isset($_POST['promote_btn'])){
    User::updateRole($db, $idUser);
    header("Location:/../pages/admin_section.php");
}
?>
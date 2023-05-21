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

if(isset($_POST["edit_btn"])){
$name2 = $_POST['new_name'];
$username2 = $_POST['new_username'];
$email2 =$_POST['new_email'];


if($name2 !== ''){
    User::updateName($db, $name2, $session->getId());
}
if($username2 !== ''){
    User::updateUsername($db, $username2, $session->getId());
}
if($email2 !== ''){
    User::updateEmail($db, $email2, $session->getId());

}

header("Location:/../pages/profile_page.php");

}
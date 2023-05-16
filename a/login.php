<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../a/session.php');

$db = getDatabaseConnection();
$session = new Session();

if(isset($_POST['login'])){


    $user = User::getUserWithPassword($db, $_POST['email'], $_POST['password']);

    if ($user) {
        $session->setId($user->idUser);
        $session->setName($user->username);
        $session->addMessage('success', 'Login successful!');
        header('Location: /../pages/main_page.php');
        die();
      } else {
        $session->addMessage('error', 'Wrong password!');
        header('Location: /../pages/home_page1.php');
      }

}

?>
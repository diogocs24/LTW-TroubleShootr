<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/message.php');

$session = new Session();
$db = getDatabaseConnection();
$idTicket = (int) $_POST['idTicket'];

if(isset($_POST['chat_submit_btn'])){
    $message = new Message(0, $idTicket, $session->getId(), $_POST['message'], "f");    

    $message->insert($db);

    if($message !== NULL){
        header('Location: /../pages/main_page.php');
    }
    else{
        echo 'Error';
    }
}

?>
<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');

$session = new Session();
$db = getDatabaseConnection();



$message = isset($_POST['message']) ? $_POST['message'] : null;
$sender_id = isset($_POST['sender_id']) ? $_POST['sender_id'] : null;
$receiver_id = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : null;

if(!empty($message) && !empty($ticket_id) && !empty($sender_id) && !empty($receiver_id)) {
    $stmt = $db->prepare('INSERT INTO CHAT ([message], idClient, idAgent) VALUES (?, ?, ?)');
    $stmt->execute([$message, $sender_id, $receiver_id]);

}

?>
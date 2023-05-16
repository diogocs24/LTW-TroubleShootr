<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../database/ticket.php');

$db = getDatabaseConnection();

if(isset($_POST['submit_btn'])){

    if (empty($_POST['title'])) {
        echo "Missing Title";
    } elseif (empty($_POST['message'])) {
        echo "Missing Message";
    } elseif (empty($_POST['department'])) {
        echo "Missing department";
    } elseif (empty($_POST['hashtag'])) {
        echo "Missing hashtag";
    } else {
        $ticket = new Ticket(0, 0, 0, 0, $_POST['message'], $_POST['title'], "not_opened");
        
        $ticket->insert($db);

        echo "Done!";
        header('Location: /../pages/submit_ticket.php');
    }

}

?>
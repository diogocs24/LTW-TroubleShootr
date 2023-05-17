<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../database/ticket.php');

$db = getDatabaseConnection();

if(isset($_POST['submit_btn'])){

    $ticket = new Ticket(0, 0, 0, 0, $_POST['message'], $_POST['title'], "not_opened", "low", "f", "f");      
    $ticket->insert($db);
    
    if($ticket !== NULL){
        header('Location: /../pages/main_page.php');
    }
    else{
        echo 'Error';
    }
}
?>
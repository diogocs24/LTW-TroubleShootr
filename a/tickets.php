<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/ticket.php');
require_once(__DIR__.'/../database/hashtag.php');
require_once(__DIR__.'/../database/ticket_hashtag.php');
require_once(__DIR__.'/../database/departments.php');

$session = new Session();
$db = getDatabaseConnection();
$department_name = $_POST['department'];
$department = Department::getDepartments($db , $department_name);

$hashtagString = strtolower(trim($_POST['hashtag']));
$hashtagString = str_replace(' ', '', $hashtagString);

if(isset($_POST['submit_btn'])){
    $ticket = new Ticket(0, $department->idDepartment, $session->getId(), 0, $_POST['title'], $_POST['message'], "not_opened", "low", "f", "f");    
    $hashtag = new Hashtag(0, $hashtagString);  

    $ticket->insert($db);

    if (Hashtag::checkNotTag($db, $hashtagString)) {
        $hashtag->save($db);
    }
    

    $ticket_hashtag = new Ticket_Hashtag($ticket->getId(), $hashtag->getHashtagWithName($db, $hashtagString));
    $ticket_hashtag->save($db);
    
    if($ticket !== NULL){
        header('Location: /../pages/main_page.php');
    }
    else{
        echo 'Error';
    }
}
?>
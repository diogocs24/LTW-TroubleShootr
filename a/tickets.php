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
$department_name = $_POST['department'];
$department = Department::getDepartments($db , $department_name);

if(isset($_POST['submit_btn'])){
    $ticket = new Ticket(0, $department->idDepartment, $session->getId(), 0, $_POST['title'], $_POST['message'], "not_opened", "low", "f", "f");      

    $ticket->insert($db);
    
    if($ticket !== NULL){
        header('Location: /../pages/main_page.php');
    }
    else{
        echo 'Error';
    }
}
?>
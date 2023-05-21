<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../a/pages_draw.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../a/session.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../database/faq.php');

$session = new Session();
$db = getDatabaseConnection();

if(isset($_POST['question_submit_btn'])){
    $faq = new FAQ(0, $_POST['title'], $_POST['message'] );    

    $faq->insert($db);
    
    if($faq !== NULL){
        header('Location: /../pages/faq_page.php');
    }
    else{
        echo 'Error';
    }
}
?>
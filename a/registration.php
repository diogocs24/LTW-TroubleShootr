<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../database/user.php');

$db = getDatabaseConnection();



if(isset($_POST['create'])){
    $user = new User(0,
    $_POST['username'],
    $_POST['email'],
    $_POST['password']
    );
    
    $user->insert_db($db);
    
    
    if($user !== NULL){
        header('Location: /../pages/home_page1.php');
    }
    else{
        echo 'Error';
    }
}

?>
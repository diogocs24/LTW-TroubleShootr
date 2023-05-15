<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../database/user.php');

$db = getDatabaseConnection();

if(isset($_POST['create'])){

if(User::userEmailAlreadyExists($db, $_POST['email'])){
    echo "Email already exist";
    $_SESSION['messages'][] = array('type' => 'error', 'text' => 'Email already exists');
    header('Location: /../pages/home_page1.php');
}


else if(User::usernameAlreadyExists($db, $_POST['username'])){
    $_SESSION['messages'][] = array('type' => 'error', 'text' => 'Username already exists');
    header('Location: /../pages/home_page1.php');
}
else{
    $user = new User(0,
    $_POST['username'],
    $_POST['email'],
    $_POST['password']
    );
    
    $user->insert($db);
    
    
    if($user !== NULL){
        header('Location: /../pages/main_page.php');
    }
    else{
        echo 'Error';
    }
}
}

?>
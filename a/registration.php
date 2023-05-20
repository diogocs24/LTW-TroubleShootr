<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../a/session.php');

$db = getDatabaseConnection();
$session = new Session();

if(isset($_POST['create'])){

if(User::userEmailAlreadyExists($db, $_POST['email'])){
    $session->addMessage('error', 'Email already registered!');


    header('Location: /../pages/home_page1.php');
}


else if(User::usernameAlreadyExists($db, $_POST['username'])){
    $session->addMessage('error', 'Username already registered!');

    header('Location: /../pages/home_page1.php');
}
else{
    
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user = new User(0,
    $_POST['username'],
    $_POST['email'],
    $hashedPassword,
    'user'
    );
    
    $user->insert($db);
    
    
    if($user !== NULL){
        $session->setId($user->idUser);
        $session->setName($user->username);
        $session->addMessage('success', 'Login successful!');
        header('Location: /../pages/main_page.php');
    }
    else{
        echo 'Error';
    }
}
}

?>
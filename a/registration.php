<?php

declare(strict_types = 1);
require_once(__DIR__.'/../a/drawcommon.php');
require_once(__DIR__.'/../database/config.php');
require_once(__DIR__.'/../database/user.php');
require_once(__DIR__.'/../a/session.php');

$db = getDatabaseConnection();
$session = new Session();

if(isset($_POST['create'])){


    if ($_POST['email'] == "") {
        $session->addMessage('error', 'Please enter an email!');
        header('Location: /../pages/home_page1.php');
    }
    else if ($_POST['username'] == "") {
        $session->addMessage('error', 'Please enter a username!');
        header('Location: /../pages/home_page1.php');
    }
    else if (!filter_var(strip_tags($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $session->addMessage('error', 'Email is invalid.');
        header('Location: /../pages/home_page1.php');
    }
    else if (strlen($_POST['username']) < '3') {
        $session->addMessage('error', 'Username is too short.');
        header('Location: /../pages/home_page1.php');
    }
    else if ($_POST['password'] !== $_POST['password_confirm']) {
        $session->addMessage('error', 'Passwords are not equal.');
        header('Location: /../pages/home_page1.php');
    }
    else if (strlen($_POST['password']) < 8) {
        $session->addMessage('error', 'Password is too short.');
        header('Location: /../pages/home_page1.php');
    }
    else if (!preg_match("#[a-z]+#", $_POST['password'])) {
        $session->addMessage('error', 'Password must contain a lowercase letter.');
        header('Location: /../pages/home_page1.php');
    }
    else if (!preg_match("#[A-Z]+#", $_POST['password'])) {
        $session->addMessage('error', 'Password must contain an uppercase letter.');
        header('Location: /../pages/home_page1.php');
    }
    else if (!preg_match("#[0-9]+#", $_POST['password'])) {
        $session->addMessage('error', 'Password must contain a number.');
        header('Location: /../pages/home_page1.php');
    }
    else if(User::userEmailAlreadyExists($db, strip_tags($_POST['email']))){
        $session->addMessage('error', 'Email already registered!');
        header('Location: /../pages/home_page1.php');
    }
    else if(User::usernameAlreadyExists($db, strip_tags($_POST['username']))){
        $session->addMessage('error', 'Username already registered!');
        header('Location: /../pages/home_page1.php');
    }
    else{
        
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new User(0,
        strip_tags($_POST['username']),
        strip_tags($_POST['email']),
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
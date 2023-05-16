<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../a/session.php');
  $session = new Session();
  $session->logout();

  header('Location:/pages/home_page1.php');
?>
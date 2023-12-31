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

$faq = FAQ::getQuestions($db);

$user = User::getUser($db, $session->getId());


if(!$session->isLoggedIn()) {
    draw_header();
}
else{draw_header_logged_in($db, $session->getId());}


draw_faq($db, $user, $session->getId(), $faq);
draw_footer();
draw_script();
?>
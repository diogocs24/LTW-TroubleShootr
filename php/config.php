<?php
/* Database credentials. */
define('DB_SERVER', 'localhost5500');
define('DB_USERNAME', 'teste123');
define('DB_PASSWORD', 'teste123');
define('DB_NAME', 'mysql.sql');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
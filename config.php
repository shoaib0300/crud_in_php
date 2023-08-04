<?php


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crud_project');

//Create a database connection

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check COnnection

if($mysqli == false){
    die("Connection Refused" . $mysqli->connect_error);
}

?>
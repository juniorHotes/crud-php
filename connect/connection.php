<?php

$servername = "localhost";
$username = "root";   
$pass = "";
$database = "php_crud";

$connection = new mysqli($servername, $username, $pass, $database);

if($connection->connect_error) {
   die("Connection failed: " . $connection->connect_error);
}

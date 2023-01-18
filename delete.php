<?php

require_once("./connect/connection.php");

if( isset($_GET['id']) ) {
    $id = $_GET['id'];

    $sql = "DELETE FROM clients WHERE id={$id}";
    $connection->query($sql);
}

header("location: /crud-php/index.php");
exit;   

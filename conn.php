<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "admin_panel_02";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    die("database connection unsuccessfull ". mysqli_error());
}

?>
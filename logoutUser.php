<?php
 include "conn.php";
 include "function.php"
?>

<?php

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == "GET"){
    $user_id = $_GET['user_id'];

    unset($user_id);
    session_destroy();
    header('location:index.php');

}
?>
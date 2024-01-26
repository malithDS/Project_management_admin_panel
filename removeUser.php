<?php

include "./conn.php";
include "./function.php";

$requestMethod = $_SERVER["REQUEST_METHOD"];

            if($requestMethod == "GET"){
                $user_id = $_GET['user_id'];

                $delete="delete from `user` where user_id='$user_id'";
                $result = mysqli_query($conn, $delete);
                
            if($result){
                    header("Location: manageUser.php");
            }else{
                $data = [
                    'status' => 500,
                    'message' =>  "Internal Server Error",          
                ];
                header("HTTP/1.0 500 Internal Server Error");
                echo json_encode($data);
            } 
        }

?>
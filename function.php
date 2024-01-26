<?php

include "conn.php";

function error422($message){
    $data = [
        'status' => 422,
        'message' => $message,
        
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

//register user 
function insertUser(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "POST"){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        if(empty(trim($name))){
            return error422('Enter your name');
        }elseif(empty(trim($username))){
            return error422('Enter your username');
        }elseif(empty(trim($password))){
            return error422('Enter your password');
        }else{
            $select_query = "select su_id,name,username,password from `super_user` where name = '$name' or username='$username'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0){
                $data = [
                    'status' => 409,
                    'message' =>  "User already exist"
                ];
                header("HTTP/1.0 409 User already exist");
                echo json_encode($data);
            }else{
                $insert_query = "insert into `super_user` (name,username,password) values('$name','$username','$password')";
                $result = mysqli_query($conn, $insert_query);

                if($result){
                    $data = [
                        'status' => 200,
                        'message' =>  "Super user registerd successfully",
                
                    ];
                    header("HTTP/1.0 200 Super user registerd successfully");
                    echo json_encode($data);
                    
                }else{
                    $data = [
                        'status' => 500,
                        'message' =>  "Internal Server Error",
                
                    ];
                    header("HTTP/1.0 500 Internal Server Error");
                    echo json_encode($data);
                }
            }
        }     
    }
};

//create a project 
function insertProject(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "POST"){
        $name = $_POST['name'];
        $ad_unit_id_android_rewarded = $_POST['ad_unit_id_android_rewarded'];
        $ad_unit_id_ios_rewarded = $_POST['ad_unit_id_ios_rewarded'];
        $ad_unit_id_android_intesting = $_POST['ad_unit_id_android_intesting'];
        $ad_unit_id_ios_intesting = $_POST['ad_unit_id_ios_intesting'];
        

        if(empty(trim($name))){
            return error422('Enter your name');
        }else if(empty(trim($ad_unit_id_android_rewarded))){
            return error422('Enter your ad_unit_id_android_rewarded');
        }else if(empty(trim($ad_unit_id_ios_rewarded))){
            return error422('Enter your ad_unit_id_ios_rewarded');
        }else if(empty(trim($ad_unit_id_android_intesting))){
            return error422('Enter your ad_unit_id_android_intesting');
        }else if(empty(trim($ad_unit_id_ios_intesting))){
            return error422('Enter your ad_unit_id_ios_intesting');
        }else{
            $select_query = "select p_id,name,ad_unit_id_android_rewarded,ad_unit_id_ios_rewarded,ad_unit_id_android_intesting,ad_unit_id_ios_intesting from `project` where name = '$name'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0){
                $data = [
                    'status' => 409,
                    'message' =>  "project already exist"
                ];
                header("HTTP/1.0 409 project already exist");
                echo json_encode($data);
            }else{
                $insert_query = "insert into `project` (name,ad_unit_id_android_rewarded,ad_unit_id_ios_rewarded,ad_unit_id_android_intesting,ad_unit_id_ios_intesting) 
                values('$name', '$ad_unit_id_android_rewarded','$ad_unit_id_ios_rewarded', '$ad_unit_id_android_intesting', '$ad_unit_id_ios_intesting ')";
                $result = mysqli_query($conn, $insert_query);

                if($result){
                    $data = [
                        'status' => 200,
                        'message' =>  "Project inserted successfully",
                
                    ];
                    header("HTTP/1.0 200 Project inserted successfully");
                    echo json_encode($data);
                }else{
                    $data = [
                        'status' => 500,
                        'message' =>  "Internal Server Error",
                
                    ];
                    header("HTTP/1.0 500 Internal Server Error");
                    echo json_encode($data);
                }
            }
        }     
    }
};


//login User 
function loginUser(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        if(empty(trim($username))){
            return error422('Enter your username');
        }elseif(empty(trim($password))){
            return error422('Enter your password');
        }else{
            $select_query = "select su_id,name,username,password from `super_user` where username = '$username' and password='$password'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0){
                session_start();
                $user_id = $_SESSION['user_id'];
                $data = [
                    'status' => 200,
                    'message' =>  "Login success",
            
                ];
                header("HTTP/1.0 200 Login success");
                echo json_encode($data);
                
            }elseif(!isset($user_id)){
                $data = [
                    'status' => 401,
                    'message' =>  "Check your username or passsword",           
                ];
                header("HTTP/1.0 401 Check your username or passsword");
                echo json_encode($data);

             };
        }     
    }
};




//See all projects
function getAllProjects(){

    global $conn;

    $query = "SELECT p_id,name,ad_unit_id_android_rewarded,ad_unit_id_ios_rewarded,ad_unit_id_android_intesting,ad_unit_id_ios_intesting FROM project";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)>0){

            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => "Projects Fetched Successfully",
                'data' => $res
            ];
            echo json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' => "No Projects Found",
        
            ];
            header("HTTP/1.0 404 No Projects Found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>  "Internal Server Error",
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
};




//remove project
function removeProject(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

            if($requestMethod == "GET"){
                $p_id = $_GET['p_id'];

                $delete="delete from `project` where p_id='$p_id'";
                $result = mysqli_query($conn, $delete);
                
            if($result){
                $data = [
                    'status' => 200,
                    'message' =>  "project removed successfully",
            
                ];
                header("HTTP/1.0 200 project removed successfully");
                echo json_encode($data);
            }else{
                $data = [
                    'status' => 500,
                    'message' =>  "Internal Server Error",           
                ];
                header("HTTP/1.0 500 Internal Server Error");
                echo json_encode($data);
            } 
        }
};


//update project
function updateProject(){
    global $conn;

    $p_id = $_GET['p_id'];
    $sql = "select p_id,name,ad_unit_id_android_rewarded,ad_unit_id_ios_rewarded,ad_unit_id_android_intesting,ad_unit_id_ios_intesting from `project` where p_id=$p_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $ad_unit_id_android_rewarded = $row['ad_unit_id_android_rewarded'];
    $ad_unit_id_ios_rewarded = $row['ad_unit_id_ios_rewarded'];
    $ad_unit_id_android_intesting = $row['ad_unit_id_android_intesting'];
    $ad_unit_id_ios_intesting = $row['ad_unit_id_ios_intesting'];

    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if($requestMethod == "POST"){
        $name = $_POST['name'];
        $ad_unit_id_android_rewarded = $_POST['ad_unit_id_android_rewarded'];
        $ad_unit_id_ios_rewarded = $_POST['ad_unit_id_ios_rewarded'];
        $ad_unit_id_android_intesting = $_POST['ad_unit_id_android_intesting'];
        $ad_unit_id_ios_intesting = $_POST['ad_unit_id_ios_intesting'];

        $sql = "update `project` set p_id=$p_id, name='$name', ad_unit_id_android_rewarded='$ad_unit_id_android_rewarded', ad_unit_id_ios_rewarded='$ad_unit_id_ios_rewarded', ad_unit_id_android_intesting='$ad_unit_id_android_intesting', ad_unit_id_ios_intesting='$ad_unit_id_ios_intesting' where p_id=$p_id";
        $result = mysqli_query($conn, $sql);

        if($result){
            $data = [
                'status' => 200,
                'message' =>  "Project Updated successfully",
        
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' =>  "Internal Server Error",           
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }
    }
}



//get project by id
function getProjectById(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "GET"){
        $p_id = $_GET['p_id'];
        

        $query = "SELECT p_id,name,ad_unit_id_android_rewarded,ad_unit_id_ios_rewarded,ad_unit_id_android_intesting,ad_unit_id_ios_intesting FROM project where p_id = '$p_id'";
        $result = mysqli_query($conn, $query);

        if($result){
            if(mysqli_num_rows($result)>0){

                $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

                $data = [
                    'status' => 200,
                    'message' => "Project Fetched Successfully",
                    'data' => $res
                ];
                echo json_encode($data);
               
                }
            }else{
                $data = [
                    'status' => 404,
                    'message' => "No Data Found",
            
                ];
                header("HTTP/1.0 404 No Data Found");
                echo json_encode($data);
            }

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


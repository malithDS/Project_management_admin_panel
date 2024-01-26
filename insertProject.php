<?php
 include "conn.php";
 include "function.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/formStyle.css">
    <title>Insert Prompt Type</title>
</head>
<body>
    
<div class="form-container">

    <form action="" method="post" enctype="multipart/form-data">
       <h3>Insert Project</h3>
 
          <div class="flex">
             <div class="inputBox">
                <span>name* </span>
                <input type="text" name="name" placeholder="enter name" class="box" >
             </div>
             <div class="inputBox">
                <span>ad_unit_id_android_rewarded* </span>
                <input type="text" name="ad_unit_id_android_rewarded" placeholder="enter ad_unit_id_android_rewarded" class="box" >
             </div>
             <div class="inputBox">
                <span>ad_unit_id_ios_rewarded* </span>
                <input type="text" name="ad_unit_id_ios_rewarded" placeholder="enter ad_unit_id_ios_rewarded" class="box" >
             </div>
             <div class="inputBox">
                <span>ad_unit_id_android_intesting* </span>
                <input type="text" name="ad_unit_id_android_intesting" placeholder="enter ad_unit_id_android_intesting" class="box" >
             </div>
             <div class="inputBox">
                <span>ad_unit_id_ios_intesting* </span>
                <input type="text" name="ad_unit_id_ios_intesting" placeholder="enter ad_unit_id_ios_intesting" class="box" >
             </div>
          </div>
 
       <input type="submit" name="submit" value="Insert now" class="login_btn">
       <?php insertProject();?>
    </form>
   
 </div>
</body>
</html>
<?php
include "conn.php";
include "function.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/allDetails.css">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Manage User</title>
</head>
<body>
    <div class="container_manage">
        <div class="manage_head">
        <a href="./admin.php" class="back">back</a>
        <a href="./registerUser.php" class="add">Add User</a>
        </div>
        <table>
            <tr>
                <th>User Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <tr>

            <?php removeUser(); ?>
            </tr>
        </table>
    </div>
</body>
</html>
<?php
include "conn.php";
include "function.php";

/*header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/allDetails.css">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>All Users</title>
</head>
<body>
    <div class="container_report">
        <h2>All Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>View Details</th>
            </tr>
            
            <?php getAllUsers(); ?>
        </table>
        <button onclick="window.print()">Print</button>
        <button><a href="./admin.php">Back</a></button>
    </div>
</body>
</html>
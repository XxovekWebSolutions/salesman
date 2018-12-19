<?php
include '../config/connection.php';
$response = [];
session_start();
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM users WHERE userId = '$admin_id'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
          $response['fname'] = ucfirst($row['fname']);
          $response['lname'] = ucfirst($row['lname']);
          $response['email'] = $row['email'];
        $response['contact_number'] = $row['contactNumber'];
           $response['firm'] = ucwords($row['firm']);

mysqli_close($con);
exit(json_encode($response));
?>

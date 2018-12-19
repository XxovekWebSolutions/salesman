<?php
include '../config/connection.php';
session_start();
$admin_id   = $_SESSION['admin_id'];
$response = [];
$sql = "SELECT * FROM SalesManMaster WHERE userId=$admin_id";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
array_push($response,[
    'fname' => $row['fname'],
    'lname' => $row['lname'],
    'address' => $row['address'],
    'city' => $row['city'],
    'pincode' => $row['pincode'],
    'contact_number' => $row['contactNumber'],
    'Gender' => $row['Gender'],
    'profile' => $row['profilePic'],
    'email' => $row['email'],
    'Latitude' => $row['Latitude'],
    'Longitude' => $row['Longitude']
]);
}
mysqli_close($con);
exit(json_encode($response));
?>

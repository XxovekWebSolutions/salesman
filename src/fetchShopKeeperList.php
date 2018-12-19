<?php
include '../config/connection.php';
session_start();
$admin_id   = $_SESSION['admin_id'];

$response = [];
$sql = "SELECT * FROM shopKeeperMaster WHERE UserId=$admin_id";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
array_push($response,[
    'contactPerson' => $row['contactPerson'],
    'contactNumber' => $row['contactNumber'],
    'address' => $row['address'],
    'address2' => $row['address2'],
    'city' => $row['city'],
    'pincode' => $row['pincode'],
    'contact_number2' => $row['contactNumber2'],
    'state' => $row['state'],
    'email' => $row['email'],
    'country' => $row['country'],
    'Latitude' => $row['latitude'],
    'Longitude' => $row['longitude']
]);
}
mysqli_close($con);
exit(json_encode($response));
?>

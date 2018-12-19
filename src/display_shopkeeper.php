<?php
include '../config/connection.php';
$response = [];
session_start();

$admin_id = $_SESSION['admin_id'];
$sql = "SELECT shopKeeperId,upper(contactPerson) contactPerson,email,city,contactNumber,address FROM shopKeeperMaster where userId = '$admin_id'";
if($result = mysqli_query($con,$sql))
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'shop_id'   => $row['shopKeeperId'],
      'fullname'   => $row['contactPerson'],
      'email'=> $row['email'],
      'city'=>ucfirst($row['city']),
      'mobile'  => $row['contactNumber'],
      'address' => ucwords($row['address'])
      ]);
  }
}
$con->close();
exit(json_encode($response));
 ?>

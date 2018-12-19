<?php
include '../config/connection.php';
$response = [];
session_start();
$admin_id = $_SESSION['admin_id'];
$Emp_id = $_REQUEST['shopinfo'];

$sql = "SELECT shopKeeperId,contactPerson,contactNumber,contactNumber2,email,country,state,city,pincode, address,address2,created_at, updated_at
FROM shopKeeperMaster WHERE shopKeeperId = '$Emp_id' AND userId = '$admin_id'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

   $response['emp_id']       = $row['shopKeeperId'];
    $response['efname']      = $row['contactPerson'];
    $response['eemail']      = $row['email'];
    $response['emobile']     = $row['contactNumber'];
    $response['emobile1']     = $row['contactNumber2'];
    $response['ecountry']     = $row['country'];
    $response['estate']     = $row['state'];
    $response['ecity']     = $row['city'];
    $response['epincode']     = $row['pincode'];
    $response['eaddress']    = $row['address'];
    $response['eaddress1']    = $row['address2'];
    $response['ejoin_date']  = $row['created_at'];

mysqli_close($con);
exit(json_encode($response));
?>

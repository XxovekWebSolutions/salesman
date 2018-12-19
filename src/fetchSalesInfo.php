<?php
include '../config/connection.php';
$response = [];
session_start();
$admin_id = $_SESSION['admin_id'];

if(!empty($_REQUEST['saleinfo'])){
  $Emp_id =   $_REQUEST['saleinfo'];
}else {
  $Emp_id =  $_SESSION['Emp_id'];
}
$sql = "SELECT salesManId,fname, lname, email,contactNumber,contactNumber2, profilePic,dob, gender,country,state,city,pincode, address,address2,AccountNo,ifscCode,branch, status,created_at, updated_at
FROM SalesManMaster WHERE salesManId = '$Emp_id' AND userId = '$admin_id'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

   $response['emp_id']  = $row['salesManId'];
    $response['efname']      = ucfirst($row['fname']);
    $response['elname']      = ucfirst($row['lname']);
    $response['eemail']      = $row['email'];
    $response['emobile']     = $row['contactNumber'];
    $response['emobile1']     = $row['contactNumber2'];
    $response['eprofilePic'] = $row['profilePic'];
    $response['edob']        = $row['dob'];
    $response['egender']     = $row['gender'];
    $response['ecountry']     = $row['country'];
    $response['estate']     = $row['state'];
    $response['ecity']     = $row['city'];
    $response['epincode']     = $row['pincode'];
    $response['eaddress']    = ucwords($row['address']);
    $response['eaddress1']    = $row['address2'];
    $response['eAccountNo']    = $row['AccountNo'];
    $response['eifscCode']    = $row['ifscCode'];
    $response['ebranch']    = $row['branch'];
    $response['estatus']     = $row['status'];
    $response['ejoin_date']  = $row['created_at'];

mysqli_close($con);
exit(json_encode($response));
?>

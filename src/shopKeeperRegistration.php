<?php
include '../config/connection.php';
session_start();
$response        = [];
$admin_id        = $_SESSION['admin_id'];
$contactPerson   =  $_REQUEST['contactperson'] ;
$contactNumber   = $_REQUEST['mobileno'];
$contactNumber2  = $_REQUEST['mobileno1'];
$email           =$_REQUEST['emailid'];
$country         = $_REQUEST['country'];
$state           =$_REQUEST['state'];
$city            = $_REQUEST['city'];
$pincode         = $_REQUEST['shoppincode'];
$address         = $_REQUEST['address1'];
$address2        = $_REQUEST['address2'];

$latitude     = $_REQUEST['lat'];
$longitude    = $_REQUEST['long'];

if(empty($_POST['shopkeeper_id']))
{
$sql = "INSERT INTO `shopKeeperMaster` (`UserId`, `contactPerson`, `contactNumber`, `contactNumber2`, `country`, `state`, `city`, `pincode`, `address`, `address2`, `email`, `latitude`, `longitude`) VALUES
('$admin_id','$contactPerson','$contactNumber','$contactNumber2','$country','$state','$city','$pincode','$address','$address2','$email','$latitude','$longitude')";
$response['C'] = 0;
}
else{
    $shop_id  =  $_POST['shopkeeper_id'];
    $sql = "UPDATE shopKeeperMaster SET contactPerson = '$contactPerson',contactNumber = '$contactNumber',contactNumber2 ='$contactNumber2',
     country= '$country',state= '$state',city = '$city',pincode = '$pincode',address = '$address',address2 = '$address2',email = '$email',latitude = '$latitude',longitude = '$longitude' where shopKeeperId = '$shop_id'";
     $response['C'] = 1;
}
if(mysqli_query($con,$sql)){
    $response['true'] = 'true';
}
else{
    $response['false'] = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

<?php
include '../config/connection.php';
session_start();
$response     = [];
$admin_id     = $_SESSION['admin_id'];
$fname        = $_REQUEST['firstname'];
$lname        = $_REQUEST['lastname'];
$email        = $_REQUEST['emailid'];
$spassword    = '123456';
$contactNumber       = $_REQUEST['mobileno'];
$contactNumber2       = $_REQUEST['mobileno1'];
$dob          = $_REQUEST['birthdate']  ;
$gender       = $_REQUEST['gender'];
$country      = $_REQUEST['country'];
$state        = $_REQUEST['state'];
$city         = $_REQUEST['city'];
$pincode      = $_REQUEST['salespincode'];
$address      = $_REQUEST['address'];
$address2      = $_REQUEST['address2'];
$status       = $_REQUEST['status'];
$account      = $_REQUEST['account'];
$ifsc         = $_REQUEST['ifsc'];
$branch       = $_REQUEST['branch'];
$latitude     = $_REQUEST['lat'];
$longitude    = $_REQUEST['long'];
if(isset($_FILES["imgname"]["type"]))
{
  $ProfilePic = $_FILES["imgname"]["name"];
  $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
  $ProfilePic = "../img/profiles/".$_FILES['imgname']['name']; // Target path where file is to be stored
  move_uploaded_file($sourcePath,$ProfilePic) ; // Moving Uploaded file
}
 if($ProfilePic == '../img/profiles/'){
  $ProfilePic = '../img/profiles/user.png';
}
$empid=$_POST['emp_id'];
if(empty($empid))
{
$sql = "INSERT INTO `SalesManMaster` (`userId`, `fname`, `lname`, `email`, `spassword`, `contactNumber`,
`contactNumber2`, `profilePic`, `dob`, `Gender`, `country`, `state`, `city`, `pincode`, `address`, `address2`,
`AccountNo`, `IfscCode`, `branch`, `status`, `Latitude`, `Longitude`)";
$sql .= "VALUES ('$admin_id','$fname','$lname','$email','$spassword','$contactNumber','$contactNumber2',
 '$ProfilePic','$dob','$gender','$country','$state','$city','$pincode','$address','$address2',
  '$account','$ifsc', '$branch','$status','$latitude','$longitude')";
    $response['value']= 'insert';

}
else if(!empty($empid)) {
  $sql= "UPDATE SalesManMaster SET fname='$fname',lname='$lname',email='$email',spassword ='$spassword',contactNumber='$contactNumber',contactNumber2='$contactNumber2',profilePic='$ProfilePic',
  dob='$dob',gender='$gender',address='$address',address2='$address2',country='$country',state='$state',city='$city',pincode='$pincode',AccountNo='$account',IfscCode='$ifsc',branch='$branch',status='$status',Latitude = '$latitude',Longitude= '$longitude' WHERE salesManId='$empid'";
    $response['value'] = 'update';
}
if(mysqli_query($con,$sql))
{
  $response['true'] = 'true';
}
else
{
  $response['false'] = 'false';
}

mysqli_close($con);
exit(json_encode($response));

?>

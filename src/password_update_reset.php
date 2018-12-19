<?php
include '../config/connection.php';

$emailid        = $_REQUEST['emailid'];
$password       =  md5($_POST['pwd']);
$response = array();
$result_1 = mysqli_query($con, "SELECT user_id From users where  email = '$emailid' ");

if(mysqli_num_rows($result_1)==1)
 {
$row = mysqli_fetch_array($result_1);
$id = $row['user_id'];

$sql = "UPDATE users SET upassword = '$password' where user_id = '$id'";
mysqli_query($con,$sql);
$response['true'] = 'true';
}
else {
  $response['false']  = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

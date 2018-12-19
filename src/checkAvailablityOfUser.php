<?php
include '../config/connection.php';
$response = [];
$email    = $_REQUEST['email'];
$tblName  = $_REQUEST['tblName'];
$sql = "SELECT email from $tblName WHERE email = '$email'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
if(mysqli_num_rows($result)>0){
    $response['true'] = 'true';
}else{
    $response['false'] = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

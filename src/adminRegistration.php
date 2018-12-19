<?php
include '../config/connection.php';
$response   = [];

$fname      = trim($_POST['fname']);
$lname      = trim($_POST['lname']);
$email      = trim($_POST['email']);
$contact_no = trim($_POST['phone']);
$firm       = trim($_POST['cname']);
$password   = $_POST['pwd'];


if(!empty($_REQUEST['a_id']))
{
    $a_id=$_REQUEST['a_id'];
    $sql = "UPDATE  users SET fname='$fname',lname='$lname',email='$email',contactNumber='$contact_no',firm='$firm',upassword='$password' where userId='$a_id'";
    $response['flag'] = 1;
}
else{
    $sql = "INSERT INTO users(fname,lname,email,contactNumber,firm,upassword) VALUES('$fname','$lname','$email','$contact_no','$firm','$password')";
    $response['flag'] = 0;
}
    if(mysqli_query($con,$sql)){
    $response['true'] = 'true';
}else{
    $response['false'] = 'false';

}
mysqli_close($con);
exit(json_encode($response));
?>

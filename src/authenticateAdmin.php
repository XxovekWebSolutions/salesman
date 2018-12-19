<?php
include '../config/connection.php';
$response = [];
$email     = $_REQUEST['username'];
$upassword = $_REQUEST['pwd'];


$sql = "SELECT userId,email,CONCAT(fname,' ',lname) name FROM users WHERE email='$email' AND upassword='$upassword'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
    session_start();
    $response['true'] = 'true';
    $row = mysqli_fetch_array($result);
    $user_id = $row['userId'];
    $_SESSION['username'] = ucwords($row['name']);
    $_SESSION['email'] = $row['email'];
    $_SESSION['admin_id'] = $user_id;
}else{
    $response['false'] = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

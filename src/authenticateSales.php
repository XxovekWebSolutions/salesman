<?php
include '../config/connection.php';
$response  = [];
$email     = $_POST['username'];
$upassword = $_POST['pwd'];

$sql = "SELECT salesManId,userId,email FROM SalesManMaster WHERE email='$email' AND spassword='$upassword'";
$result = mysqli_query($con,$sql) ;
if(mysqli_num_rows($result)==1){
    session_start();
    $response['true'] = 'true';
    $row = mysqli_fetch_array($result);
    $_SESSION['Emp_id']   = $row['salesManId'];
    $_SESSION['admin_id'] = $row['userId'];
}else{
    $response['false'] = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

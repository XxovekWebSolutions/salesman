<?php
include '../config/connection.php';
$Emp_id = 2;//$_SESSION['Emp_id'];
$New_pass = $_POST['Pass'];
$response = [];

$sql = "UPDATE SalesManMaster SET spassword='$New_pass' WHERE salesManId ='$Emp_id'";
$result = mysqli_query($con,$sql);

if($result == 1){
  $response['success'] = 'true';
}
else{
  $response['success'] = 'false';
}

mysqli_close($con);
exit(json_encode($response));
 ?>

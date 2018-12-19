<?php
include '../config/connection.php';
$AssignId = $_REQUEST['AssignId'];
$status = $_REQUEST['status'];
$response= [];
$sql = "UPDATE salesManAssign SET status = $status where AssignId = $AssignId";
if(mysqli_query($con,$sql)){
  $response['true'] = true;
}else {
  $response['false'] = false;
}
mysqli_close($con);
exit(json_encode($response));
 ?>

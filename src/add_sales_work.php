<?php
include '../config/connection.php';
$response   = [];
session_start();
$admin_id   = $_SESSION['admin_id'];
$RouteId          = $_REQUEST['source'];
$Sid      = $_REQUEST['salesmansid'];
$date     = $_REQUEST['assigndate'];
$wtime     = $_REQUEST['wtime'];


if(!empty($_REQUEST['w_id'])){
$w_id   =   $_REQUEST['w_id'];
$sql = "UPDATE salesManAssign SET RouteId = '$RouteId',salesManId = '$Sid',assignDate = '$date' waiting_time = '$wtime' WHERE AssignId = $w_id ";
$response['flag'] = 0;
}else{
    $sql = "INSERT INTO salesManAssign(RouteId,salesManId,assignDate,waiting_time) VALUES('$RouteId','$Sid','$date','$wtime')";
$response['flag'] = 1;
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

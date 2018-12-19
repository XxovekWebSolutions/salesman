<?php
include '../config/connection.php';
$response   = [];
session_start();
$admin_id   = $_SESSION['admin_id'];
$RouteId          = $_REQUEST['source'];
$ShopKeperId      = $_REQUEST['shop'];

if(!empty($_REQUEST['r_id'])){
$r_id   =   $_REQUEST['r_id'];
$sql = "UPDATE RouteDetails SET RouteId = '$RouteId',shopKeeperId = '$ShopKeperId' WHERE routeDetailId = $r_id AND UserId = '$admin_id'";
$response['flag'] = 0;
}else{
    $sql = "INSERT INTO RouteDetails(RouteId,shopKeeperId,UserId) VALUES('$RouteId','$ShopKeperId','$admin_id')";
$response['flag'] = 1;
}
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['true'] = true;
}
else{
    $response['false'] = false;
}
mysqli_close($con);
exit(json_encode($response));
?>

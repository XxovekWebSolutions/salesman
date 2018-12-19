<?php
include '../config/connection.php';
$response   = [];
session_start();
$admin_id   = $_SESSION['admin_id'];
$source     = $_REQUEST['source'];
$dest       = $_REQUEST['dest'];

if(!empty($_REQUEST['r_id'])){
$r_id   =   $_REQUEST['r_id'];
$sql = "UPDATE RouteMaster SET source = '$source',destination = '$dest' WHERE RouteId = $r_id AND UserId = '$admin_id'";
$response['val1'] = 'update';
}else{
    $sql = "INSERT INTO RouteMaster(UserId,source,destination) VALUES('$admin_id','$source','$dest')";
$response['val1'] = 'insert';
}
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['true'] = 'true';
}
else{
    $response['false'] = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

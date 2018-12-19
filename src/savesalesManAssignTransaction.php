<?php
include '../config/connection.php';
session_start();
$response   = [];
$Emp_id     = $_REQUEST['routeassignid'];
$admin_id   = $_SESSION['admin_id'];
$lat        = $_REQUEST['latitude'];
$long       = $_REQUEST['longitude'];


$sql = "INSERT INTO salesManAssignTransaction(salesAssignId,latitude,longitude) VALUES ($Emp_id,$lat,$long)";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['true'] = 'true';

}
else{

    $response['false'] = 'false';
}

mysqli_close($con);
exit(json_encode($response));
?>

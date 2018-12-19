<?php
include '../config/connection.php';
$response = [];
$assignid  = $_REQUEST['assignid'];
$name  = $_REQUEST['name'];

$sql = "SELECT salesManAssignTransaction.latitude,salesManAssignTransaction.longitude FROM salesManAssignTransaction where salesManAssignTransaction.salesAssignId='$assignid' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$response['latitude'] = $row['latitude'];
$response['longitude'] = $row['longitude'];
$response['name'] = $name;
$con->close();
exit(json_encode($response));
 ?>

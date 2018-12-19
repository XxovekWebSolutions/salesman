<?php
include '../config/connection.php';
$response = [];
session_start();
$admin_id   = $_SESSION['admin_id'];
$sql = "SELECT RouteId,upper(source) source,upper(destination) destination,created_at,updated_at FROM RouteMaster WHERE UserId = '$admin_id'";
if($result = mysqli_query($con,$sql))
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'RouteId'   => $row['RouteId'],
      'source'=> $row['source'],
      'dest'  => $row['destination'],
      'creattime' => $row['created_at'],
      'updatetime'  => $row['updated_at'],
      ]);
  }
}

$con->close();
exit(json_encode($response));
 ?>

<?php
include '../config/connection.php';
$response = [];
$admin_id = 1;//$_SESSION['admin_id'];
$w_id=$_REQUEST['w_id'];
$sql = "SELECT salesManAssign.AssignId,salesManAssign.RouteId,source,destination FROM RouteMaster,salesManAssign WHERE RouteMaster.RouteId =salesManAssign.RouteId AND AssignId='$w_id'";
$sql1 = "SELECT salesManAssign.salesManId,fname,lname,assignDate,salesManAssign.status,salesManAssign.waiting_time FROM SalesManMaster,salesManAssign WHERE SalesManMaster.salesManId =salesManAssign.salesManId AND AssignId='$w_id' ";

if(($result = mysqli_query($con,$sql)) && ($result1 = mysqli_query($con,$sql1)))
{
  $row=mysqli_fetch_array($result);
  $row1=mysqli_fetch_array($result1);
    array_push($response,[
      'Rid'   => $row['RouteId'],
      'wid'   => $row['AssignId'],
      'route'=> $row['source'].'- to - '.$row['destination'],
      'sid' => $row1['salesManId'],
      'sname'  => $row1['fname'].' '.$row1['lname'],
      'adate'  => $row1['assignDate'],
      'status'  => $row1['status'],
      'wtime'  => $row1['waiting_time'],
      ]);
}
$con->close();
exit(json_encode($response));
 ?>

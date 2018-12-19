<?php
include '../config/connection.php';
$response = [];
session_start();
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT R.RouteId RouteId,routeDetailId,S.shopKeeperId shopKeeperId,contactNumber,contactPerson,concat(source,'-',destination) RouteName FROM RouteDetails R INNER JOIN shopKeeperMaster S ON R.shopKeeperId = S.shopKeeperId
INNER JOIN RouteMaster R1 ON R1.RouteId = R.RouteId where R1.UserId = '$admin_id' ORDER BY R.RouteId";


if($result = mysqli_query($con,$sql))
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'RdId'   => $row['routeDetailId'],
      'RouteId'   => $row['RouteId'],
      'route'=> strtoupper($row['RouteName']),
      'shopkid' => $row['shopKeeperId'],
      'sname'  => strtoupper($row['contactPerson']),
      'sphone'  => $row['contactNumber']
      ]);
  }
}

$con->close();
exit(json_encode($response));
 ?>

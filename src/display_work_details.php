<?php
include '../config/connection.php';
$response = [];
session_start();
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT upper(CONCAT(source,'-',destination)) RouteName,S.AssignId AssignId,S.salesManId salesManId,S.RouteId RouteId,S.assignDate assignDate,S.status status,upper(CONCAT(fname,' ',lname)) sname FROM salesManAssign S INNER JOIN RouteMaster R
        ON S.RouteId = R.RouteId INNER JOIN SalesManMaster S1 ON S.salesManId = S1.salesManId WHERE S1.userId = '$admin_id' ORDER BY RouteId";
if($result = mysqli_query($con,$sql))
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'Rid'   => $row['RouteId'],
      'wid'   => $row['AssignId'],
      'route'=> $row['RouteName'],
      'sid' => $row['salesManId'],
      'sname'  =>$row['sname'],
      'adate'  => $row['assignDate'],
      'status'  => $row['status']
      ]);
  }
}
$con->close();
exit(json_encode($response));
 ?>

<?php
include '../config/connection.php';
$response = [];
$rdid  = $_REQUEST['rdid'];

$sql = "SELECT RouteId,shopKeeperId FROM RouteDetails WHERE routeDetailId ='$rdid'";
if($result = mysqli_query($con,$sql))
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'rid'   => $row['RouteId'],
      'sid'   => $row['shopKeeperId']

      ]);
  }
}
$con->close();
exit(json_encode($response));
 ?>

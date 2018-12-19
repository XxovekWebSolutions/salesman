<?php
include '../config/connection.php';
$response = [];
session_start();
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT S.latitude latitude,S.longitude longitude,S.Id,CONCAT(S3.fname,' ',S3.lname) SellName,S.created_at
FROM salesManAssignTransaction S INNER JOIN salesManAssign S2 ON S.salesAssignId = S2.AssignId INNER JOIN
SalesManMaster S3 ON S3.salesManId = S2.salesManId WHERE S.id IN(SELECT MAX(S.Id)
FROM salesManAssignTransaction S GROUP BY S.salesAssignId) AND DATE(S.created_at) = CURDATE()
AND S3.userId = $admin_id";
// $sql = "SELECT * FROM salesManAssignTransaction WHERE salesManAssignTransaction.id IN (SELECT MAX(salesManAssignTransaction.id) FROM salesManAssignTransaction GROUP BY salesAssignId);";
if($result = mysqli_query($con,$sql))
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      // 'salesAssignId'   => $row['salesAssignId'],
      'latitude'   => $row['latitude'],
      'longitude'   => $row['longitude'],
      'SellName' => $row['SellName']
      ]);
  }
}
$con->close();
exit(json_encode($response));
 ?>

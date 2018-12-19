<?php
include '../config/connection.php';
session_start();
$salesManId= $_SESSION['Emp_id'];
$response = [];
$FunCall = $_POST['FunCall'];

if($FunCall == 1){
  $sql = "SELECT S.status,S.RouteId,S.salesManId,S.assignDate,S.AssignId,concat(R1.source,' to ',R1.destination) routeName,
  count(DISTINCT R2.routeDetailId) as shops FROM RouteMaster R1 LEFT JOIN salesManAssign S
  ON S.RouteId = R1.RouteId LEFT JOIN RouteDetails R2 ON R2.RouteId = R1.RouteId where S.salesManId = $salesManId
  AND !( S.assignDate >= CURRENT_DATE()) GROUP BY routeName order by S.AssignId";

// SELECT S.status,S.RouteId,S.salesManId,S.assignDate,S.AssignId,concat(R1.source,' ',R1.destination) routeName,
// count(DISTINCT R2.routeDetailId) as shops FROM RouteMaster R1 LEFT JOIN salesManAssign S
// ON S.RouteId = R1.RouteId LEFT JOIN RouteDetails R2 ON R2.RouteId = R1.RouteId where S.salesManId = $salesManId
// AND !( S.assignDate >= CURRENT_DATE()) GROUP BY routeName order by S.AssignId

  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($result)){
  array_push($response,[
      'AssignId' => $row['AssignId'],
      'RouteId'  => $row['RouteId'],
      'assignDate' => $row['assignDate'],
      'status' => $row['status'],
      'RouteName' => ucwords($row['routeName']),
      'TotalRouteCnt' => $row['shops']
  ]);
  }
}
else{
  $sql = "SELECT S.status,S.RouteId,S.salesManId,S.assignDate,S.AssignId,concat(R1.source,' to ',R1.destination) routeName,
  count(DISTINCT R2.routeDetailId) as shops FROM RouteMaster R1 LEFT JOIN salesManAssign S
  ON S.RouteId = R1.RouteId LEFT JOIN RouteDetails R2 ON R2.RouteId = R1.RouteId where S.salesManId = $salesManId
   AND S.assignDate = CURRENT_DATE()  GROUP BY routeName order by S.AssignId";
  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($result)){
  array_push($response,[
      'AssignId' => $row['AssignId'],
      'RouteId'  => $row['RouteId'],
      'assignDate' => $row['assignDate'],
      'status' => $row['status'],
      'RouteName' => ucwords($row['routeName']),
      'TotalRouteCnt' => $row['shops']
  ]);
  }
}

mysqli_close($con);
exit(json_encode($response));
?>

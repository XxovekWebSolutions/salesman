<?php
include '../config/connection.php';
$RouteId = $_POST['RouteId'];
$response = [];

$sql = "SELECT shopKeeperMaster.contactPerson,shopKeeperMaster.contactNumber,shopKeeperMaster.contactNumber2,
shopKeeperMaster.country,shopKeeperMaster.state,shopKeeperMaster.city,shopKeeperMaster.pincode,
shopKeeperMaster.address,shopKeeperMaster.address2,shopKeeperMaster.email,shopKeeperMaster.latitude,shopKeeperMaster.longitude
FROM shopKeeperMaster,RouteMaster,RouteDetails
WHERE shopKeeperMaster.shopKeeperId = RouteDetails.shopKeeperId
AND RouteMaster.RouteId = RouteDetails.RouteId
AND RouteDetails.RouteId = '$RouteId'";

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
array_push($response,[
    'contactPerson' => ucwords($row['contactPerson']),
    'contactNumber'  => $row['contactNumber'],
    'contactNumber2' => $row['contactNumber2'],
    'country' => $row['country'],
    'state' => $row['state'],
    'city' => $row['city'],
    'pincode' => $row['pincode'],
    'address' => ucwords($row['address']),
    'address2' => $row['address2'],
    'latitude' => $row['latitude'],
    'longitude' => $row['longitude'],
    'email' => $row['email']
]);
}

mysqli_close($con);
exit(json_encode($response));
?>


 ?>

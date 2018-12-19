<?php
include '../config/connection.php';
$rid=$_REQUEST['rid'];
session_start();
$admin_id= $_SESSION['admin_id'];
$response=[];
$sql="SELECT contactPerson,address,latitude,longitude from shopKeeperMaster,RouteDetails where RouteDetails.shopKeeperId=shopKeeperMaster.shopKeeperId and RouteId=$rid and shopKeeperMaster.UserId='$admin_id'";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {
        array_push($response,[
            'shops'  => $row['contactPerson'],
              'address'  => $row['address'],
                'latitude'  => $row['latitude'],
                  'longitude'  => $row['longitude']
            ]);
    }
  }
}
exit(json_encode($response));
 ?>

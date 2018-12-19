<?php
include '../config/connection.php';
$response = [];
$mobile    = $_REQUEST['mobile1'];
$tblName  = $_REQUEST['tblName'];
$sql = "SELECT contactNumber from $tblName WHERE contactNumber = '$mobile'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
if(mysqli_num_rows($result)==1){
    $response['true'] = 'true';
}else{
    $response['false'] = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

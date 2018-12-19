<?php
include '../config/connection.php';
$id       = $_REQUEST['id'];
$tblName  = $_REQUEST['tblName'];
$colName  = $_REQUEST['colName'];
$response = [];

$sql = "DELETE FROM $tblName WHERE $colName = $id";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['true'] = 'true';
}else{
    $response['false'] = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>

<?php
include 'connection.php';
$admin_id = 1;//$_SESSION['admin_id'];
$response = [];
$sql = "SELECT * FROM salesWork WHERE admin_id = $admin_id";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
array_push($response,[
    'Work_id' => $row['work_id'],
    'Emp_id' => $row['Emp_id'],
    'area' => $row['area'],
    'address' => $row['address'],
    'city' => $row['city'],
    'pincode' => $row['pincode'],
    'contact_number' => $row['contact_number'],
    'waiting_time' => $row['waiting_time'],
    'visit_date'  => $row['visit_date']
]);
}
mysqli_close($con);
exit(json_encode($response));
?>
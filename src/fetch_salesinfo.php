<?php
include '../config/connection.php';
$response = [];
$salesmanid  = $_REQUEST['saleinfo'];

$sql = "SELECT Emp_id,profilePic,fname,lname,email,mobile,dob,gender,address,account,ifsc,branch,status FROM salesPerson
WHERE Emp_id ='$salesmanid'";
if($result = mysqli_query($con,$sql))
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'Emp_id'   => $row['Emp_id'],
      'fname'   => $row['fname'],
      'lname'   => $row['lname'],
      'email'=> $row['email'],
      'mobile'  => $row['mobile'],
      'dob' => $row['dob'],
      'gender' => $row['gender'],
      'address' => $row['address'],
      'account' => $row['account'],
      'ifsc' => $row['ifsc'],
      'branch' => $row['branch'],
      'status'  => $row['status'],
      'profilePic'  => $row['profilePic']
      ]);
  }
}
$con->close();
exit(json_encode($response));
 ?>

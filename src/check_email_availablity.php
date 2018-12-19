<?php
include '../config/connection.php';

if(!empty($_POST["email"])) {
  $result = mysqli_query($con,"SELECT count(email) FROM users WHERE email='" . $_POST["email"] . "'");
  $row = mysqli_fetch_array($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available' style='color:red'> Email Id Already Exists.</span>";
  }else{
      echo "<span class='status-available'> </span>";
  }
}
?>

<?php
include '../config/connection.php';

$user_id = $_REQUEST['user_id'];
?>
 <option values=""></option>
 <?php
if($result = mysqli_query($con,"SELECT cities.name,cities.id From cities,states where states.id = cities.state_id and
 states.name = '$user_id'"))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['name'];?>'><?php echo $row['name'];?></option>
    <?php
    }
  }
}
 ?>

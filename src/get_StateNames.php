<?php
include '../config/connection.php';
$user_id = $_REQUEST['user_id'];
?>
<option values=""></option>
<?php
if($result = mysqli_query($con,"SELECT states.name,states.id From states,countries where countries.id = states.country_id and
countries.name = '$user_id'"))
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

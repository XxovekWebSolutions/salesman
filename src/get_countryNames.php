<?php
include '../config/connection.php';

?>
 <option values=""></option>

 <?php
if($result = mysqli_query($con,"SELECT name,id From countries"))
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

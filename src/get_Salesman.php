<?php
include '../config/connection.php';

?>
 <option values=""></option>

 <?php
if($result = mysqli_query($con,"SELECT salesManId,fname,lname From SalesManMaster"))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['salesManId'];?>'><?php echo ucfirst($row['fname']).' '.ucfirst($row['lname']);?></option>
    <?php
    }
  }
}
 ?>

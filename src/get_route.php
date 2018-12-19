<?php
include '../config/connection.php';

?>
 <option values=""></option>

 <?php
if($result = mysqli_query($con,"SELECT RouteId,upper(CONCAT(source,' To ',destination)) RouteName From RouteMaster"))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['RouteId'];?>'><?php echo $row['RouteName'];?></option>
    <?php
    }
  }
}
 ?>

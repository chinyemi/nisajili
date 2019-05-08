<?php
require_once('header.php');

$selectvalue = $_GET['svalue'];
$result = mysqli_query($conn,"SELECT `glssite` FROM `delegate` WHERE `glsyear`='".$selectvalue."' GROUP BY `glssite` ORDER BY `glssite`");
 

echo '<option value="">Select Site</option>';
while($row = mysqli_fetch_array($result))
  {
    echo '<option value="'.$row['glssite'].'">' . $row['glssite'] . "</option>";
    //echo $row['drink_type'] ."<br/>";
  }
 
?>
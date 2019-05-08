<?php 

require_once('header.php');

?>

<?php
//include('db.php');
include('function.php');
if(isset($_POST["sms_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM sms_list
		WHERE  sms_id = '".$_POST["sms_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["composesms"] = $row["sms_description"];
		$output["sms_id"] = $row["sms_id"];
		}
	echo json_encode($output);
}
?>

  
  
  
  
  
  
   
  
  
  


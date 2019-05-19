<?php 

require_once('header.php');

?>

<?php
//include('db.php');
include('function.php');
if(isset($_POST["rate_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM glssiterates
		WHERE  rateID = '".$_POST["rate_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["inconferencerate"] = $row["inconferencerate"];
 $output["superearlybirdrate_normal"] = $row["superearlybirdrate_normal"];
		$output["superearlybirdrate_vip"] = $row["superearlybirdrate_vip"];
		$output["earlybirdrate_normal"] = $row["earlybirdrate_normal"];
		$output["earlybirdrate_vip"] = $row["earlybirdrate_vip"];
		$output["regularrate_normal"] = $row["regularrate_normal"];
		$output["regularrate_vip"] = $row["regularrate_vip"];
		$output["studentrate"] = $row["studentrate"];
		$output["grouprate_normal"] = $row["grouprate_normal"];
		$output["grouprate_vip"] = $row["grouprate_vip"];
		$output["internationalrate"] = $row["internationalrate"];
	$output["exchangerate"] = $row["exchangerate"];
	$output["site_id"] = $row["siteID"];
	}
	echo json_encode($output);
}
?>



  
  
  
  
  
  
   
  
  
  
   
  
 
  
  

  
   
  
  
  
   
  
  
  
  

<?php 

require_once('header.php');

?>

<?php

include('functionRevenueType.php');
if(isset($_POST["revtypeID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM RevenueType
		WHERE  revtypeID = '".$_POST["revtypeID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

	        $output["revtypeID"] = $row["revtypeID"];
		$output["revType"] = $row["revType"];
		$output["revCategory"] = $row["revCategory"];
		$output["Description"] = $row["Description"];
		
	
		
	}
	echo json_encode($output);
}
?>

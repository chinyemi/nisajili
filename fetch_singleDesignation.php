<?php 

require_once('header.php');

?>

<?php

include('functionDesignation.php');
if(isset($_POST["designationID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM Designations
		WHERE  designationID = '".$_POST["designationID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
	
		$output["DesignationName"] = $row["DesignationName"];
		$output["Description"] = $row["Description"];
		
	
		
	}
	echo json_encode($output);
}
?>

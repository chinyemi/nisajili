<?php 

require_once('header.php');

?>

<?php

include('functionElement.php');
if(isset($_POST["elementID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM webelements
		WHERE  elementID = '".$_POST["elementID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
	
		$output["Content"] = $row["Content"];
		$output["Category"] = $row["Category"];
		$output["Toggle"] = $row["Toggle"];
		$output["Position"] = $row["Position"];
		
		
		
	}
	echo json_encode($output);
}
?>

<?php 

require_once('header.php');

?>

<?php

include('functionSiteSeason.php');
if(isset($_POST["seasonID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM siteseason
		WHERE  seasonID = '".$_POST["seasonID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
	
		$output["Year"] = $row["Year"];
		$output["SeasonStatus"] = $row["SeasonStatus"];
		$output["Description"] = $row["Description"];
		
		
		
	}
	echo json_encode($output);
}
?>

<?php 

require_once('header.php');

?>

<?php

include('functionImpactStories.php');
if(isset($_POST["storyID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM webimpactstories
		WHERE  storyID = '".$_POST["storyID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
		
		$output["siteID"] = $row["siteID"];
		$output["storyURL"] = $row["storyURL"];
		$output["imageLink"] = $row["imageLink"];
		$output["fa_Icon"] = $row["fa_Icon"];
		$output["description"] = $row["description"];
	    $output["status"] = $row["status"];
		$output["storyTeller"] = $row["storyTeller"];
		
	}
	echo json_encode($output);
}
?>

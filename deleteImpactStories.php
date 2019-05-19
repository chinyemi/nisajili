<?php 

require_once('header.php');

?>
<?php


include("functionImpactStories.php");

if(isset($_POST["storyID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM webimpactstories WHERE storyID = :storyID"
	);
	$result = $statement->execute(
		array(
			':storyID'	=>	$_POST["storyID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
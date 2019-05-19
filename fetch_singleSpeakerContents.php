<?php 

require_once('header.php');

?>

<?php

include('functionSpeakerContents.php');
if(isset($_POST["contentID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM webspeakercontents
		WHERE  contentID = '".$_POST["contentID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
	
		$output["speakerID"] = $row["speakerID"];
		$output["contentURL"] = $row["contentURL"];
		$output["imageLink"] = $row["imageLink"];
		$output["fa_Icon"] = $row["fa_Icon"];
		$output["description"] = $row["description"];
	    $output["description"] = $row["description"];
		
	}
	echo json_encode($output);
}
?>

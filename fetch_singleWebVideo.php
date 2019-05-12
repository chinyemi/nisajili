<?php 

require_once('header.php');

?>

<?php

include('functionWebVideo.php');
if(isset($_POST["videoID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM webvideos
		WHERE  videoID = '".$_POST["videoID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["videoname"] = $row["videoname"];
		$output["youtubeURL"] = $row["youtubeURL"];
		$output["description"] = $row["description"];
		
		
		if($row["thumbnailimage"] != '')
		{
			$output['thumbnailimage'] = '<img src="'.$imagespath_read.'videos/'.$row["thumbnailimage"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["thumbnailimage"].'" />';
		}
		else
		{
			$output['thumbnailimage'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
		
	}
	echo json_encode($output);
}
?>

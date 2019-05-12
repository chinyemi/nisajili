<?php 

require_once('header.php');

?>

<?php

include('functionSpeakerBio.php');
if(isset($_POST["InfoID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM webspeakers
		WHERE  InfoID = '".$_POST["InfoID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
		$output["fullname"] = $row["fullname"];
		$output["designation"] = $row["designation"];
		$output["organization"] = $row["organization"];
		$output["biography"] = $row["biography"];
		$output["facebook"] = $row["facebook"];
		$output["twitter"] = $row["twitter"];
		$output["instagram"] = $row["instagram"];
		$output["profile_row"] = $row["profile_row"];
		$output["roworder"] = $row["roworder"];
		
		if($row["picture1"] != '')
		{
			$output['picture1'] = '<img src="'.$imagespath_read.'/products/'.$row["picture1"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["picture1"].'" />';
		}
		else
		{
			$output['picture1'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
		
	}
	echo json_encode($output);
}
?>

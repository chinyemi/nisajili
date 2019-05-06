<?php 

require_once('header.php');

?>

<?php

include('functionTestimonies.php');
if(isset($_POST["testimonyID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM webtestimonies
		WHERE  testimonyID = '".$_POST["testimonyID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["testimony"] = $row["testimony"];
		$output["fullname"] = $row["fullname"];
		$output["designation"] = $row["designation"];
		$output["city"] = $row["city"];
		$output["country"] = $row["country"];
		$output["feedback"] = $row["feedback"];
		
		if($row["picture"] != '')
		{
			$output['picture'] = '<img src="upload/'.$row["picture"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["picture"].'" />';
		}
		else
		{
			$output['picture'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
		
	}
	echo json_encode($output);
}
?>

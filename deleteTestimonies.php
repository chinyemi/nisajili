<?php 

require_once('header.php');

?>
<?php


include("functionSpeakerBio.php");

if(isset($_POST["testimonyID"]))
{
	
	$picture = get_image_name($_POST["testimonyID"]);
	if($picture != '')
	{
		unlink("upload/" . $picture);
	}
	
	$statement = $connection->prepare(
		"DELETE FROM webtestimonies WHERE testimonyID = :testimonyID"
	);
	$result = $statement->execute(
		array(
			':testimonyID'	=>	$_POST["testimonyID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
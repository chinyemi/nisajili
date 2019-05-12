<?php 

require_once('header.php');

?>
<?php


include("functionSpeakerBio.php");

if(isset($_POST["InfoID"]))
{
	
	$picture1 = get_image_name($_POST["InfoID"]);
	if($picture1 != '')
	{
		unlink($imagespath_read.'/products/'. $picture1);
	}
	
	$statement = $connection->prepare(
		"DELETE FROM webspeakers WHERE InfoID = :InfoID"
	);
	$result = $statement->execute(
		array(
			':InfoID'	=>	$_POST["InfoID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
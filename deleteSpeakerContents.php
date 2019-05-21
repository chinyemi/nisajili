<?php 

require_once('header.php');

?>
<?php


include("functionSpeakerContents.php");

if(isset($_POST["contentID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM webspeakercontents WHERE contentID = :contentID"
	);
	$result = $statement->execute(
		array(
			':contentID'	=>	$_POST["contentID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
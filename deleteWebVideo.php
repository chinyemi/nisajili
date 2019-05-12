<?php 

require_once('header.php');

?>
<?php


include("functionWebVideo.php");

if(isset($_POST["videoID"]))
{
	
	$thumbnailimage = get_image_name($_POST["videoID"]);
	if($thumbnailimage != '')
	{
		unlink($imagespath_read."videos/" . $thumbnailimage);
	}
	
	$statement = $connection->prepare(
		"DELETE FROM webvideos WHERE videoID = :videoID"
	);
	$result = $statement->execute(
		array(
			':videoID'	=>	$_POST["videoID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
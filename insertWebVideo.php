<?php 

require_once('header.php');


?>
<?php

include('functionWebVideo.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$thumbnailimage = '';
		if($_FILES["thumbnailimage"]["name"] != '')
		{
			$thumbnailimage = upload_image();
		}
		

		$statement = $connection->prepare("
			INSERT INTO webvideos (videoname, youtubeURL, description, thumbnailimage) 
			VALUES (:videoname, :youtubeURL, :description, :thumbnailimage)
		");
		$result = $statement->execute(
			array(
			

		
				':videoname'	=>	$_POST["videoname"],
				':youtubeURL'	=>	$_POST["youtubeURL"],
			    ':description'	=>	$_POST["description"],
				
				
				
				':thumbnailimage'		=>	$thumbnailimage
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$thumbnailimage = '';
		if($_FILES["thumbnailimage"]["name"] != '')
		{
			$thumbnailimage = upload_image();
		}
		else
		{
			$thumbnailimage = $_POST["hidden_user_image"];
		}
		
		$statement = $connection->prepare(
			"UPDATE webvideos 
			SET videoname = :videoname, youtubeURL = :youtubeURL, description = :description, thumbnailimage  = :thumbnailimage   
			WHERE videoID = :videoID
			"
		);
		$result = $statement->execute(
			array(
				':videoname'	=>	$_POST["videoname"],
				':youtubeURL'	=>	$_POST["youtubeURL"],
			    ':description'	=>	$_POST["description"],
				
			
				
				':thumbnailimage'		=>	$thumbnailimage,
				':videoID'			=>	$_POST["videoID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
		}
	}
}

?>


			
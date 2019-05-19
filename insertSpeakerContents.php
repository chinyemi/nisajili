<?php 

require_once('header.php');


?>
<?php

//include('functionSpeakerContents.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		
		
		$statement = $connection->prepare("
			INSERT INTO webspeakercontents (speakerID, contentURL, imageLink, fa_Icon, description) 
			VALUES (:speakerID, :contentURL, :imageLink, :fa_Icon, :description)
		");
		$result = $statement->execute(
			array(
				':speakerID'	=>	$_POST["speakerID"],
			    ':contentURL'	=>	$_POST["contentURL"],
				':imageLink'	=>	$_POST["imageLink"],
			    ':fa_Icon'	=>	$_POST["fa_Icon"],
			    ':description'	=>	$_POST["description"]
              
                          )
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
			
			
		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$statement = $connection->prepare(
			"UPDATE webspeakercontents 
	       SET speakerID = :speakerID, contentURL = :contentURL, imageLink = :imageLink, fa_Icon = :fa_Icon, description = :description
			WHERE contentID = :contentID
			"
		);
		$result = $statement->execute(
			array(
				
				':speakerID'	=>	$_POST["speakerID"],
			    ':contentURL'	=>	$_POST["contentURL"],
				':imageLink'	=>	$_POST["imageLink"],
			    ':fa_Icon'	=>	$_POST["fa_Icon"],
			    ':description'	=>	$_POST["description"],

				':contentID'			=>	$_POST["contentID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			
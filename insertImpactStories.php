<?php 

require_once('header.php');


?>
<?php

include('functionImpactStories.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		
		
		$statement = $connection->prepare("
			INSERT INTO webimpactstories (siteID, storyURL, imageLink, fa_Icon, description, status, storyTeller) 
			VALUES (:siteID, :storyURL, :imageLink, :fa_Icon, :description, :status, :storyTeller)
		");
		$result = $statement->execute(
			array(
				':siteID'	=>	$_POST["siteID"],
			    ':storyURL'	=>	$_POST["storyURL"],
				':imageLink'	=>	$_POST["imageLink"],
			    ':fa_Icon'	=>	$_POST["fa_Icon"],
			    ':description'	=>	$_POST["description"],
			    ':status'	=>	$_POST["status"],
			    ':storyTeller'	=>	$_POST["storyTeller"]
              
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
			"UPDATE webimpactstories 
	       SET siteID = :siteID, storyURL = :storyURL, imageLink = :imageLink, fa_Icon = :fa_Icon, description = :description, status = :status, storyTeller = :storyTeller
			WHERE storyID = :storyID
			"
		);
		$result = $statement->execute(
			array(
				
				':siteID'	=>	$_POST["siteID"],
			    ':storyURL'	=>	$_POST["storyURL"],
				':imageLink'	=>	$_POST["imageLink"],
			    ':fa_Icon'	=>	$_POST["fa_Icon"],
			    ':description'	=>	$_POST["description"],
			    ':status'	=>	$_POST["status"],
			    ':storyTeller'	=>	$_POST["storyTeller"],

				':storyID'			=>	$_POST["storyID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			
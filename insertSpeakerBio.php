<?php 

require_once('header.php');


?>
<?php

include('functionSpeakerBio.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$picture1 = '';
		if($_FILES["picture1"]["name"] != '')
		{
			$picture1 = upload_image();
		}
		
		
		$statement = $connection->prepare("
			INSERT INTO webspeakers (fullname, designation,organization, biography, facebook, twitter,instagram, profile_row, roworder, picture1) 
			VALUES (:fullname, :designation, :organization, :biography , :facebook, :twitter,:instagram, :profile_row, :roworder, :picture1)
		");
		$result = $statement->execute(
			array(
			

		
				
				':fullname'	=>	$_POST["fullname"],
			    ':designation'	=>	$_POST["designation"],
				':organization'	=>	$_POST["organization"],
			    ':biography'	=>	$_POST["biography"],
			    ':facebook'	=>	$_POST["facebook"],
				':twitter'	=>	$_POST["twitter"],
			    ':instagram'	=>	$_POST["instagram"],
				':profile_row'	=>	$_POST["profile_row"],
			    ':roworder'	=>	$_POST["roworder"],
				
				
				':picture1'		=>	$picture1
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$picture1 = '';
		if($_FILES["picture1"]["name"] != '')
		{
			$picture1 = upload_image();
		}
		else
		{
			$picture1 = $_POST["hidden_user_image"];
		}
		
		$statement = $connection->prepare(
			"UPDATE webspeakers 
			SET fullname = :fullname, designation = :designation,organization = :organization, biography = :biography, facebook = :facebook, twitter = :twitter,instagram = :instagram, profile_row = :profile_row, roworder = :roworder, picture1  = :picture1   
			WHERE InfoID = :InfoID
			"
		);
		$result = $statement->execute(
			array(
				
				':fullname'	=>	$_POST["fullname"],
			    ':designation'	=>	$_POST["designation"],
				':organization'	=>	$_POST["organization"],
			    ':biography'	=>	$_POST["biography"],
			    ':facebook'	=>	$_POST["facebook"],
				':twitter'	=>	$_POST["twitter"],
			    ':instagram'	=>	$_POST["instagram"],
				':profile_row'	=>	$_POST["profile_row"],
			    ':roworder'	=>	$_POST["roworder"],
			
				
				':picture1'		=>	$picture1,
				':InfoID'			=>	$_POST["InfoID"]
			)
		);
		if(!empty($result))
		{
			
			echo 'Data Updated';
			
			
		}
	}
}

?>


			
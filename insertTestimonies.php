<?php 

require_once('header.php');


?>
<?php

include('functionTestimonies.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$picture1 = '';
		if($_FILES["picture"]["name"] != '')
		{
			$picture1 = upload_image();
		}
		
	
		$statement = $connection->prepare("
			INSERT INTO webtestimonies (testimony, fullname, designation, city, country, feedback, picture) 
			VALUES (:testimony, :fullname, :designation, :city, :country, :feedback, :picture)
		");
		$result = $statement->execute(
			array(
			

		
				':testimony'	=>	$_POST["testimony"],
				':fullname'	=>	$_POST["fullname"],
			    ':designation'	=>	$_POST["designation"],
				':city'	=>	$_POST["city"],
			    ':country'	=>	$_POST["country"],
		        ':feedback'	=>	$_POST["feedback"],
				':picture'		=>	$picture
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$picture = '';
		if($_FILES["picture"]["name"] != '')
		{
			$picture = upload_image();
		}
		else
		{
			$picture = $_POST["hidden_user_image"];
		}
		

		$statement = $connection->prepare(
			"UPDATE webtestimonies 
			SET testimony = :testimony, fullname = :fullname, designation = :designation,city = :city, country = :country, feedback = :feedback, picture  = :picture   
			WHERE testimonyID = :testimonyID
			"
		);
		$result = $statement->execute(
			array(
				':testimony'	=>	$_POST["testimony"],
				':fullname'	=>	$_POST["fullname"],
			    ':designation'	=>	$_POST["designation"],
				':city'	=>	$_POST["city"],
			    ':country'	=>	$_POST["country"],
		        ':feedback'	=>	$_POST["feedback"],
				':picture'		=>	$picture,
				':testimonyID'			=>	$_POST["testimonyID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
		}
	}
}

?>


			
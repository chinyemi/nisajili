<?php 

require_once('header.php');


?>
<?php

include('functionElement.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		


		
		$statement = $connection->prepare("
			INSERT INTO webelements (Content, Category, Toggle, Position ) 
			VALUES (:Type, :Category, :Toggle, :Position)
		");
		$result = $statement->execute(
			array(
			

		
				
				':Content'	=>	$_POST["Content"],
			    ':Category'	=>	$_POST["Category"],
				':Toggle'	=>	$_POST["Toggle"],
			    ':Position'	=>	$_POST["Position"],
			    
			   
			
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
			"UPDATE webelements 
			SET Content = :Content, Category = :Category, Toggle = :Toggle, Position = :Position 
			WHERE elementID = :elementID
			"
		);
		$result = $statement->execute(
			array(
				
				':Content'	=>	$_POST["Content"],
			    ':Category'	=>	$_POST["Category"],
				':Toggle'	=>	$_POST["Toggle"],
			    ':Position'	=>	$_POST["Position"],
			   

				':elementID'			=>	$_POST["elementID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			
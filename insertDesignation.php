<?php 

require_once('header.php');


?>
<?php

include('functionSiteSeason.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		
		$statement = $connection->prepare("
			INSERT INTO Designations (DesignationName, Description) 
			VALUES (:DesignationName, :Description)
		");
		$result = $statement->execute(
			array(
			

		
				
				':DesignationName'	=>	$_POST["DesignationName"],
			    ':Description'	=>	$_POST["Description"],
			
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
			"UPDATE Designations 
			SET DesignationName = :DesignationName, Description = :Description
			WHERE designationID = :designationID
			"
		);
		$result = $statement->execute(
			array(
				
				':DesignationName'	=>	$_POST["DesignationName"],
				':Description'	=>	$_POST["Description"],

				':designationID'			=>	$_POST["designationID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
		}
	}
}

?>


			
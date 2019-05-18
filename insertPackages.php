<?php 

require_once('header.php');


?>
<?php

include('functionPackages.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO packageinfo (package_name, paid_nocash, remarks, toggle) 
			VALUES (:package_name, :paid_nocash, :remarks, :toggle)
		");
		$result = $statement->execute(
			array(
			
					
				':package_name'	=>	$_POST["package_name"],
			    ':paid_nocash'	=>	$_POST["paid_nocash"],
			    ':remarks'	=>	$_POST["remarks"],
			    ':toggle'	=>	$_POST["toggle"],
			
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
			"UPDATE packageinfo 
			SET package_name = :package_name, paid_nocash = :paid_nocash, remarks = :remarks, toggle = :toggle
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				
				':package_name'	=>	$_POST["package_name"],
				':paid_nocash'	=>	$_POST["paid_nocash"],
			    ':remarks'	=>	$_POST["remarks"],
			    ':toggle'	=>	$_POST["toggle"],

				':id'			=>	$_POST["id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
		}
	}
}

?>


			
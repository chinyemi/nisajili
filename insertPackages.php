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
			INSERT INTO packageinfo (package_name, paid_nocash, remarks) 
			VALUES (:package_name, :paid_nocash, :remarks)
		");
		$result = $statement->execute(
			array(
			
					
				':package_name'	=>	$_POST["package_name"],
			    ':paid_nocash'	=>	$_POST["paid_nocash"],
			    ':remarks'	=>	$_POST["remarks"],
			
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
			SET package_name = :package_name, paid_nocash = :paid_nocash, remarks = :remarks
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				
				':package_name'	=>	$_POST["package_name"],
				':paid_nocash'	=>	$_POST["paid_nocash"],
			    ':remarks'	=>	$_POST["remarks"],

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


			
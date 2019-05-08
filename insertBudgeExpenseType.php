<?php 

require_once('header.php');


?>
<?php

include('functionBudgetExpenseType.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		
		
		$statement = $connection->prepare("
			INSERT INTO budget_expensetype (expType, ExpCategory, Description) 
			VALUES (:expType, :ExpCategory, :Description)
		");
		$result = $statement->execute(
			array(
			

		
				
				':expType'	=>	$_POST["expType"],
			    ':ExpCategory'	=>	$_POST["ExpCategory"],
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
			"UPDATE budget_expensetype 
			SET expType = :expType, ExpCategory = :ExpCategory, Description = :Description
			WHERE exptypeID = :exptypeID
			"
		);
		$result = $statement->execute(
			array(
				
				':expType'	=>	$_POST["expType"],
			    ':ExpCategory'	=>	$_POST["ExpCategory"],
				':Description'	=>	$_POST["Description"],
			    

				':exptypeID'			=>	$_POST["exptypeID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			
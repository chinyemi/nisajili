<?php 

require_once('header.php');


?>
<?php

include('functionExpense.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
       $image = '';
		if($_FILES["image"]["name"] != '')
		{
			$image = upload_image();
		}
		
		
		$statement = $connection->prepare(" INSERT INTO actual_expenses (Type, Amount, DateRecorded, Description, Site, glsyear, image) 
			VALUES (:Type, :Amount, :DateRecorded, :Description, :Site, :glsyear, :image ) ");
		$result = $statement->execute(
			array(
			

				':Type'	=>	$_POST["Type"],
			    ':Amount'	=>	$_POST["Amount"],
				':DateRecorded'	=>	$_POST["DateRecorded"],
			    ':Description'	=>	$_POST["Description"],
			    ':Site'	=>	$_POST["Site"],
			    ':glsyear'	=>	$_POST["glsyear"],
			   
			    
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
			
			
		}
	}
	if($_POST["operation"] == "Edit")
	{
	    $image = '';
		if($_FILES["image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		
		$statement = $connection->prepare(
			"UPDATE actual_expenses 
			SET Type = :Type, Amount = :Amount, DateRecorded = :DateRecorded, Description = :Description, Site = :Site, glsyear = :glsyear, image =:image
			WHERE expenseID = :expenseID
			"
		);
		$result = $statement->execute(
			array(
				
				':Type'	=>	$_POST["Type"],
			    ':Amount'	=>	$_POST["Amount"],
				':DateRecorded'	=>	$_POST["DateRecorded"],
			    ':Description'	=>	$_POST["Description"],
			    ':Site'	=>	$_POST["Site"],
			    ':glsyear'	=>	$_POST["glsyear"],
			    	
				':image'		=>	$image,

				':expenseID'			=>	$_POST["expenseID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			
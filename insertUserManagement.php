<?php 

require_once('header.php');


?>
<?php

include('functionUserManagement.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		
		$statement = $connection->prepare("
			INSERT INTO cmembership (UserName, Password, Gender, DoB, Email, MobileNo, Designation, Userlevel, dateregistered, UserAccountSuspended) 
			VALUES (:UserName, :Password, :Gender, :DoB, :Email, :MobileNo, :Designation, :Userlevel, :dateregistered, :UserAccountSuspended)
		");
		$result = $statement->execute(
			array(
			

		
				
				':UserName'	=>	$_POST["UserName"],
			    ':Password'	=>	$_POST["Password"],
				':Gender'	=>	$_POST["Gender"],
			    ':DoB'	=>	$_POST["DoB"],
			    ':Email'	=>	$_POST["Email"],
			    ':MobileNo'	=>	$_POST["MobileNo"],
			    ':Designation'	=>	$_POST["Designation"],
			    ':Userlevel'	=>	$_POST["Userlevel"],
			    ':dateregistered'	=>	$_POST["dateregistered"],
			    ':UserAccountSuspended'	=>	$_POST["UserAccountSuspended"],
			   
			
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
			"UPDATE cmembership 
			SET UserName = :UserName, Password = :Password, Gender = :Gender, DoB = :DoB, Email = :Email, MobileNo = :MobileNo, Designation = :Designation, Userlevel = :Userlevel, dateregistered = :dateregistered, UserAccountSuspended = :UserAccountSuspended
			WHERE UserID = :UserID
			"
		);
		$result = $statement->execute(
			array(
				
				':UserName'	=>	$_POST["UserName"],
			    ':Password'	=>	$_POST["Password"],
				':Gender'	=>	$_POST["Gender"],
			    ':DoB'	=>	$_POST["DoB"],
			    ':Email'	=>	$_POST["Email"],
			    ':MobileNo'	=>	$_POST["MobileNo"],
			    ':Designation'	=>	$_POST["Designation"],
			    ':Userlevel'	=>	$_POST["Userlevel"],
			    ':UserAccountSuspended'	=>	$_POST["UserAccountSuspended"],

				':UserID'			=>	$_POST["UserID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			
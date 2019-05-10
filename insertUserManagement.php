<?php 

require_once('header.php');


?>
<?php

include('functionUserManagement.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$Image = '';
		if($_FILES["Image"]["name"] != '')
		{
			$Image = upload_image();
		}
		
		
		$statement = $connection->prepare("
			INSERT INTO cmembership (UserName, Password, Fullname, Gender, Email, MobileNo, Designation, Userlevel, dateregistered, UserAccountSuspended, Image) 
			VALUES (:UserName, :Password, :Fullname, :Gender , :Email, :MobileNo, :Designation, :Userlevel, :dateregistered, :UserAccountSuspended, :Image)
		");
		$result = $statement->execute(
			array(
			

		
				
				':UserName'	=>	$_POST["UserName"],
			    ':Password'	=>	md5($_POST["Password"]),
				':Fullname'	=>	$_POST["Fullname"],
			    ':Gender'	=>	$_POST["Gender"],
			    ':Email'	=>	$_POST["Email"],
				':MobileNo'	=>	$_POST["MobileNo"],
			    ':Designation'	=>	$_POST["Designation"],
				':Userlevel'	=>	$_POST["Userlevel"],
			    ':dateregistered'	=>	$_POST["dateregistered"],
				':UserAccountSuspended'	=>	$_POST["UserAccountSuspended"],
				
				':Image'		=>	$Image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$Image = '';
		if($_FILES["Image"]["name"] != '')
		{
			$Image = upload_image();
		}
		else
		{
			$Image = $_POST["hidden_user_image"];
		}
	

		$statement = $connection->prepare(
			"UPDATE cmembership 
			SET UserName = :UserName, Password = :Password, Fullname = :Fullname, Gender = :Gender, Email = :Email, MobileNo = :MobileNo, Designation = :Designation, Userlevel = :Userlevel, dateregistered = :dateregistered, UserAccountSuspended = :UserAccountSuspended, Image  = :Image   
			WHERE UserID = :UserID
			"
		);
		$result = $statement->execute(
			array(
				
				':UserName'	=>	$_POST["UserName"],
			    ':Password'	=>	md5($_POST["Password"]),
				':Fullname'	=>	$_POST["Fullname"],
			    ':Gender'	=>	$_POST["Gender"],
			    ':Email'	=>	$_POST["Email"],
			    ':MobileNo'	=>	$_POST["MobileNo"],
				':Designation'	=>	$_POST["Designation"],
			    ':Userlevel'	=>	$_POST["Userlevel"],
				':dateregistered'	=>	$_POST["dateregistered"],
			    ':UserAccountSuspended'	=>	$_POST["UserAccountSuspended"],
			
				
				':Image'		=>	$Image,
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


			
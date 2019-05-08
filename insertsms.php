<?php 

require_once('header.php');


?>
<?php
//include('db.php');
include('function.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
	
	
		$statement = $connection->prepare("
			INSERT INTO sms_list (sms_description ,user_id) 
			VALUES (:smsdescription,:user_id)
		");
		$result = $statement->execute(
			array(':smsdescription'	=>	$_POST["composesms"],
		           ':user_id'	=>	$userid
			    )
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	
	
	
	if($_POST["operation"] == "Edit")
	{
		
		
		$composesms=$_POST['composesms'];
		$smsid=$_POST['sms_id'];
		
	$result=mysqli_query($conn,"UPDATE sms_list 
			SET sms_description = '$composesms'
			
			WHERE sms_id = '$smsid'");
		

		
			if(!empty($result))
		{
			echo 'Data Edited';
		}
	}
	
	
			
			
			
			
			//End of Ticket issuing
	
}

?>


			
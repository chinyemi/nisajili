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
		
		
		$group_name=$_POST['groupname'];
		
		$result=mysqli_query($conn,"INSERT INTO member_groups set
		group_name='$group_name',user_id='$userid',membersno=0");
		
			if(!empty($result))
		{
			echo 'Group Created';
		}
	}
	
	
	
	
	if($_POST["operation"] == "Edit")
	{
		
	
		$group_name=$_POST['groupname'];
		$gid=$_POST["group_id"];
		
		$result=mysqli_query($conn,"update member_groups set group_name='$group_name' where group_id='$gid'");
		
		
			if(!empty($result))
		{
			echo 'Data Edited';
		}
	}
	
	
			
			
			
			
			//End of Ticket issuing
	
}

?>


			
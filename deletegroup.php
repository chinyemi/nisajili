<?php 

require_once('header.php');

?>
<?php

//include('db.php');
//include('function.php?Id='.$Id.'&Year=2019');
include("function.php");

if(isset($_POST["group_id"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM member_groups WHERE group_id = :group_id"
	);
	$result = $statement->execute(
		array(
			':group_id'	=>	$_POST["group_id"]
		)
	);
	
		$statement = $connection->prepare(
		"DELETE FROM member_group_list WHERE group_id = :group_id"
	);
	$result = $statement->execute(
		array(
			':group_id'	=>	$_POST["group_id"]
		)
	);
	
	
	
	if(!empty($result))
	{
		echo 'Group Deleted';
	}
}



?>
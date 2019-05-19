<?php 

require_once('header.php');

?>
<?php

//include('db.php');
//include('function.php?Id='.$Id.'&Year=2019');
include("function.php");

if(isset($_POST["rate_id"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM glssiterates WHERE rateID = :rate_id"
	);
	$result = $statement->execute(
		array(
			':rate_id'	=>	$_POST["rate_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>
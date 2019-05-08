<?php 

require_once('header.php');

?>
<?php


include("functionRevenueType.php");

if(isset($_POST["revtypeID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM RevenueType WHERE revtypeID = :revtypeID"
	);
	$result = $statement->execute(
		array(
			':revtypeID'	=>	$_POST["revtypeID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
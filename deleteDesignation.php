<?php 

require_once('header.php');

?>
<?php


include("functionDesignation.php");

if(isset($_POST["designationID"]))
{

	
	$statement = $connection->prepare(
		"DELETE FROM Designations WHERE designationID = :designationID"
	);
	$result = $statement->execute(
		array(
			':designationID'	=>	$_POST["designationID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
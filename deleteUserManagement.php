<?php 

require_once('header.php');

?>
<?php


include("functionUserManagement.php");

if(isset($_POST["UserID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM cmembership WHERE UserID = :UserID"
	);
	$result = $statement->execute(
		array(
			':UserID'	=>	$_POST["UserID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
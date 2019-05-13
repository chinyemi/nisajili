<?php 

require_once('header.php');

?>
<?php


include("functionPackages.php");

if(isset($_POST["id"]))
{

	
	$statement = $connection->prepare(
		"DELETE FROM packageinfo WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
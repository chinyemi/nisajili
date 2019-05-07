<?php 

require_once('header.php');

?>
<?php


include("functionElement.php");

if(isset($_POST["elementID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM webelements WHERE elementID = :elementID"
	);
	$result = $statement->execute(
		array(
			':elementID'	=>	$_POST["elementID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
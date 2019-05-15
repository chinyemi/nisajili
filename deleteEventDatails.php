<?php 

require_once('header.php');

?>
<?php


include("functionEventDetails.php");

if(isset($_POST["siteID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM glssiteinfo WHERE siteID = :siteID"
	);
	$result = $statement->execute(
		array(
			':siteID'	=>	$_POST["siteID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
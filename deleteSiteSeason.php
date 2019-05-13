<?php 

require_once('header.php');

?>
<?php


include("functionSiteSeason.php");

if(isset($_POST["seasonID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM siteseason WHERE seasonID = :seasonID"
	);
	$result = $statement->execute(
		array(
			':seasonID'	=>	$_POST["seasonID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
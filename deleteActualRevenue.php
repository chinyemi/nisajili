<?php 

require_once('header.php');

?>
<?php


include("functionActualRevenue.php");

if(isset($_POST["revenueID"]))
{
	$image = get_image_name($_POST["revenueID"]);
	if($image != '')
	{
		unlink($imagespath_read.$image);
	}
	
	$statement = $connection->prepare(
		"DELETE FROM actual_revenue WHERE revenueID = :revenueID"
	);
	$result = $statement->execute(
		array(
			':revenueID'	=>	$_POST["revenueID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
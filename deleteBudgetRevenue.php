<?php 

require_once('header.php');

?>
<?php


include("functionBudgetRevenue.php");

if(isset($_POST["revenueID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM budget_revenue WHERE revenueID = :revenueID"
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
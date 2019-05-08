<?php 

require_once('header.php');

?>

<?php

include('functionBudgetRevenue.php');
if(isset($_POST["revenueID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM budget_revenue
		WHERE  revenueID = '".$_POST["revenueID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

	        $output["revenueID"] = $row["revenueID"];
		$output["Type"] = $row["Type"];
		$output["Amount"] = $row["Amount"];
		$output["Description"] = $row["Description"];
		$output["Site"] = $row["Site"];
                $output["DateRecorded"] = $row["DateRecorded"];
                
	
		
	}
	echo json_encode($output);
}
?>

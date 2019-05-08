<?php 

require_once('header.php');

?>

<?php

include('functionBudgetExpense.php');
if(isset($_POST["expenseID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM budget_expenses
		WHERE  expenseID = '".$_POST["expenseID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
	
		$output["Type"] = $row["Type"];
		$output["Amount"] = $row["Amount"];
		$output["DateRecorded"] = $row["DateRecorded"];
		$output["Description"] = $row["Description"];
		$output["Site"] = $row["Site"];
		$output["glsyear"] = $row["glsyear"];
	
		
	}
	echo json_encode($output);
}
?>

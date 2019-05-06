<?php 

require_once('header.php');

?>

<?php

include('functionExpense.php');
if(isset($_POST["expenseID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM expenses
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
		
	
		
	}
	echo json_encode($output);
}
?>

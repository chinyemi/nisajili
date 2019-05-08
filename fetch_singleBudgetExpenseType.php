<?php 

require_once('header.php');

?>

<?php

include('functionBudgetExpenseType.php');
if(isset($_POST["exptypeID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM budget_expensetype
		WHERE  exptypeID = '".$_POST["exptypeID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

	
		$output["expType"] = $row["expType"];
		$output["ExpCategory"] = $row["ExpCategory"];
		$output["Description"] = $row["Description"];
		
	
		
	}
	echo json_encode($output);
}
?>

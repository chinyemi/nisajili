<?php 

require_once('header.php');

?>
<?php


include("functionBudgetExpenseType.php");

if(isset($_POST["exptypeID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM budget_expensetype WHERE exptypeID = :exptypeID"
	);
	$result = $statement->execute(
		array(
			':exptypeID'	=>	$_POST["exptypeID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
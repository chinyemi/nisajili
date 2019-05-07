<?php 

require_once('header.php');

?>
<?php


include("functionExpense.php");

if(isset($_POST["expenseID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM expenses WHERE expenseID = :expenseID"
	);
	$result = $statement->execute(
		array(
			':expenseID'	=>	$_POST["expenseID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
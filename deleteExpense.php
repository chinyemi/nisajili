<?php 

require_once('header.php');

?>
<?php


include("functionExpense.php");

if(isset($_POST["expenseID"]))
{
	
	$image = get_image_name($_POST["expenseID"]);
	if($image != '')
	{
		unlink($imagespath_read.$image);
	}
	
	$statement = $connection->prepare(
		"DELETE FROM actual_expenses WHERE expenseID = :expenseID"
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
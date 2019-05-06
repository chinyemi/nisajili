<?php 

require_once('header.php');

?>
<?php


include("functionExpenseType.php");

if(isset($_POST["exptypeID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM ExpenseType WHERE exptypeID = :exptypeID"
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
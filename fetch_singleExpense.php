<?php 

require_once('header.php');

?>

<?php

include('functionExpense.php');
if(isset($_POST["expenseID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM actual_expenses
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
	
		if($row["image"] != '')
		{
			$output['image'] = '<img src="'.$imagespath_read.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
		
		
	}
	echo json_encode($output);
}
?>

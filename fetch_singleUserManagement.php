<?php 

require_once('header.php');

?>

<?php

include('functionUserManagement.php');
if(isset($_POST["UserID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM cmembership
		WHERE  UserID = '".$_POST["UserID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		
	
		$output["UserName"] = $row["UserName"];
		$output["Password"] = $row["Password"];
		$output["Gender"] = $row["Gender"];
		$output["DoB"] = $row["DoB"];
		$output["Email"] = $row["Email"];
		$output["MobileNo"] = $row["MobileNo"];
		$output["Designation"] = $row["Designation"];
		$output["Userlevel"] = $row["Userlevel"];
		$output["dateregistered"] = $row["dateregistered"];
		$output["UserAccountSuspended"] = $row["UserAccountSuspended"];
		
	
		
	}
	echo json_encode($output);
}
?>
>
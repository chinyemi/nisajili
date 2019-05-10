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
		$output["Fullname"] = $row["Fullname"];
		$output["Gender"] = $row["Gender"];
		$output["Email"] = $row["Email"];
		$output["MobileNo"] = $row["MobileNo"];
		$output["Designation"] = $row["Designation"];
		$output["Userlevel"] = $row["Userlevel"];
		$output["dateregistered"] = $row["dateregistered"];
		$output["UserAccountSuspended"] = $row["UserAccountSuspended"];
		if($row["Image"] != '')
		{
			$output['Image'] = '<img src="upload/'.$row["Image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["Image"].'" />';
		}
		else
		{
			$output['Image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
		
	}
	echo json_encode($output);
}
?>

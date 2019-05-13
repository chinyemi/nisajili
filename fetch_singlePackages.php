<?php 

require_once('header.php');

?>

<?php

include('functionPackages.php');
if(isset($_POST["id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM packageinfo
		WHERE  id = '".$_POST["id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
		
		$output["package_name"] = $row["package_name"];
		$output["paid_nocash"] = $row["paid_nocash"];
		$output["remarks"] = $row["remarks"];
		
	
		
	}
	echo json_encode($output);
}
?>

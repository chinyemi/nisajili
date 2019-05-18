<?php 

require_once('header.php');

?>

<?php

include('functionPaymentManual.php');
if(isset($_POST["GatewayID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM vw_PaymentOptions_Manual
		WHERE  GatewayID = '".$_POST["GatewayID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
	
		$output["GatewayName"] = $row["GatewayName"];
		$output["Currency"] = $row["Currency"];
		$output["Toggle"] = $row["Toggle"];
		$output["GatwayMobile"] = $row["GatwayMobile"];
		$output["GatewayEmail"] = $row["GatewayEmail"];
		$output["GatwayAddress"] = $row["GatwayAddress"];
		$output["Description"] = $row["Description"];
		$output["Type"] = $row["Type"];
		$output["GatewayKey"] = $row["GatewayKey"];
		$output["GatewaySecret"] = $row["GatewaySecret"];
		
		
		
	}
	echo json_encode($output);
}
?>

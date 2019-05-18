<?php 

require_once('header.php');

?>
<?php


include("functionPaymentOnline.php");

if(isset($_POST["GatewayID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM vw_PaymentOptions_Online WHERE GatewayID = :GatewayID"
	);
	$result = $statement->execute(
		array(
			':GatewayID'	=>	$_POST["GatewayID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
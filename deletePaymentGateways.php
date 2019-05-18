<?php 

require_once('header.php');

?>
<?php


include("functionPaymentGateways.php");

if(isset($_POST["GatewayID"]))
{
	
	
	$statement = $connection->prepare(
		"DELETE FROM paymentoptions WHERE GatewayID = :GatewayID"
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
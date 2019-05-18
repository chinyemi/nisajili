<?php 

require_once('header.php');


?>
<?php

include('functionPaymentOnline.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		
		
		$statement = $connection->prepare("
		INSERT INTO vw_PaymentOptions_Online (GatewayName, Currency,Toggle,GatwayMobile,GatewayEmail,GatwayAddress,Description,Type,GatewayKey,GatewaySecret) 
			VALUES (:GatewayName, :Currency, :Toggle, :GatwayMobile, :GatewayEmail, :GatwayAddress, :Description, :Type, :GatewayKey, :GatewaySecret)
		");
		$result = $statement->execute(
			array(
			

				
				':GatewayName'	=>	$_POST["GatewayName"],
			    ':Currency'	=>	$_POST["Currency"],
				':Toggle'	=>	$_POST["Toggle"],
			    ':GatwayMobile'	=>	$_POST["GatwayMobile"],
			    ':GatewayEmail'	=>	$_POST["GatewayEmail"],
			    ':GatwayAddress'	=>	$_POST["GatwayAddress"],
			    ':Description'	=>	$_POST["Description"],
			    ':Type'	=>	$_POST["Type"],
			    ':GatewayKey'	=>	$_POST["GatewayKey"],
			    ':GatewaySecret'	=>	$_POST["GatewaySecret"],
			
			   
			
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
			
			
		}
	}
	if($_POST["operation"] == "Edit")
	{

	
	
		$statement = $connection->prepare(
			"UPDATE vw_PaymentOptions_Online 
			SET GatewayName = :GatewayName, Currency = :Currency,Toggle = :Toggle,GatwayMobile = :GatwayMobile,GatewayEmail = :GatewayEmail,GatwayAddress = :GatwayAddress,Description = :Description,Type = :Type,GatewayKey = :GatewayKey,GatewaySecret = :GatewaySecret        
			WHERE GatewayID = :GatewayID
			"
		);
		$result = $statement->execute(
			array(
				
				':GatewayName'	=>	$_POST["GatewayName"],
			    ':Currency'	=>	$_POST["Currency"],
				':Toggle'	=>	$_POST["Toggle"],
			    ':GatwayMobile'	=>	$_POST["GatwayMobile"],
			    ':GatewayEmail'	=>	$_POST["GatewayEmail"],
			    ':GatwayAddress'	=>	$_POST["GatwayAddress"],
			    ':Description'	=>	$_POST["Description"],
			    ':Type'	=>	$_POST["Type"],
			    ':GatewayKey'	=>	$_POST["GatewayKey"],
			    ':GatewaySecret'	=>	$_POST["GatewaySecret"],
			  

				':GatewayID'			=>	$_POST["GatewayID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
		$ClosePayment=mysqli_query($conn,"UPDATE vw_PaymentOptions_Online SET Toggle='NO' WHERE GatewayID <> '".$_POST["GatewayID"]."'");
			
		}
	}
}

?>


			
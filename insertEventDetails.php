<?php 

require_once('header.php');


?>
<?php

include('functionEventDetails.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		
		$statement = $connection->prepare("
			INSERT INTO glssiteinfo (siteID, sitename,sitedescription,eventtype,sitevenue,sitemobile,siteaddress,sitecontactperson,sitetarget,sitedays) 
			VALUES (:siteID, :sitename, :sitedescription, :eventtype, :sitevenue, :sitemobile, :siteaddress, :sitecontactperson, :sitetarget, :sitedays)
		");
		$result = $statement->execute(
			array(
					
				
				':siteID'	=>	$_POST["siteID"],
			    ':sitename'	=>	$_POST["sitename"],
				':sitedescription'	=>	$_POST["sitedescription"],
			    ':eventtype'	=>	$_POST["eventtype"],
			    ':sitevenue'	=>	$_POST["sitevenue"],
			    ':sitemobile'	=>	$_POST["sitemobile"],
			    ':siteaddress'	=>	$_POST["siteaddress"],
			    ':sitecontactperson'	=>	$_POST["sitecontactperson"],
			    ':sitetarget'	=>	$_POST["sitetarget"],
			    ':sitedays'	=>	$_POST["sitedays"],
			
			   
			
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
			"UPDATE glssiteinfo 
			SET siteID = :siteID, sitename = :sitename, sitedescription = :sitedescription, eventtype = :eventtype,sitevenue = :sitevenue, sitemobile = :sitemobile, siteaddress = :siteaddress, sitecontactperson = :sitecontactperson, sitetarget = :sitetarget, sitedays = :sitedays 
			WHERE siteID = :siteID
			"
		);
		$result = $statement->execute(
			array(
				
				':siteID'	=>	$_POST["siteID"],
			    ':sitename'	=>	$_POST["sitename"],
				':sitedescription'	=>	$_POST["sitedescription"],
			    ':eventtype'	=>	$_POST["eventtype"],
			    ':sitevenue'	=>	$_POST["sitevenue"],
			    ':sitemobile'	=>	$_POST["sitemobile"],
			    ':siteaddress'	=>	$_POST["siteaddress"],
			    ':sitecontactperson'	=>	$_POST["sitecontactperson"],
			    ':sitetarget'	=>	$_POST["sitetarget"],
			    ':sitedays'	=>	$_POST["sitedays"],
			  

				':siteID'			=>	$_POST["siteID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			
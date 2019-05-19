<?php 

require_once('header.php');


?>
<?php
//include('db.php');
include('function.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
	
	
		$statement = $connection->prepare("
			INSERT INTO glssitedate (siteID,sitedate,inconferencedeadline,superearlybirddeadline,earlybirddeadline) 
			VALUES (:site_id, :sitedate, :inconferencedeadline, :superearlybirddeadline,:earlybirddeadline)
		");
		$result = $statement->execute(
			array(':sitedate'	=>	$_POST["sitedate"],
			  ':inconferencedeadline'	=>	$_POST["inconferencedeadline"],
			  ':superearlybirddeadline'	=>	$_POST["superearlybirddeadline"],
			  ':earlybirddeadline'	=>	$_POST["earlybirddeadline"],
			  ':site_id'	=>	$_POST["vsite_id"]
				
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
			"UPDATE glssitedate 
			SET sitedate = :sitedate, inconferencedeadline = :inconferencedeadline, superearlybirddeadline = :superearlybirddeadline,earlybirddeadline = :earlybirddeadline
			WHERE siteID = :siteID
			"
		);
			$result = $statement->execute(
			array(':sitedate'	=>	$_POST["sitedate"],
			  ':inconferencedeadline'	=>	$_POST["inconferencedeadline"],
			  ':superearlybirddeadline'	=>	$_POST["superearlybirddeadline"],
				':earlybirddeadline'	=>	$_POST["earlybirddeadline"],
			    ':siteID'			=>	$_POST["site_id"]
			)
		);
		
			if(!empty($result))
		{
			echo 'Data Edited';
		}
	}
	
	
			
			
			
			
			//End of Ticket issuing
	
}

?>


			
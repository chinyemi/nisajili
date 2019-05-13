<?php 

require_once('header.php');


?>
<?php

include('functionSiteSeason.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		
		
		
		$statement = $connection->prepare("
			INSERT INTO siteseason (Year, SeasonStatus,Description) 
			VALUES (:Year, :SeasonStatus, :Description)
		");
		$result = $statement->execute(
			array(
			

		
				
				':Year'	=>	$_POST["Year"],
			    ':SeasonStatus'	=>	$_POST["SeasonStatus"],
				':Description'	=>	$_POST["Description"],
			
			   
			
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
			"UPDATE siteseason 
			SET Year = :Year, SeasonStatus = :SeasonStatus,Description = :Description 
			WHERE seasonID = :seasonID
			"
		);
		$result = $statement->execute(
			array(
				
				':Year'	=>	$_POST["Year"],
			    ':SeasonStatus'	=>	$_POST["SeasonStatus"],
				':Description'	=>	$_POST["Description"],
			  

				':seasonID'			=>	$_POST["seasonID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			$CloseSeaons=mysqli_query($conn,"UPDATE siteseason SET SeasonStatus='CLOSED' WHERE seasonID <> '".$_POST["seasonID"]."'");
			
		}
	}
}

?>


			
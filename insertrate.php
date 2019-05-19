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
			INSERT INTO glssiterates (siteID,inconferencerate,superearlybirdrate_normal,superearlybirdrate_vip,earlybirdrate_normal,earlybirdrate_vip,regularrate_normal,regularrate_vip,studentrate,grouprate_normal,grouprate_vip,internationalrate,exchangerate) 
			VALUES (:site_id,:inconferencerate, :superearlybirdrate_normal, :superearlybirdrate_vip,:earlybirdrate_normal, :earlybirdrate_vip,:regularrate_normal, :regularrate_vip, :studentrate,:grouprate_normal,:grouprate_vip,:internationalrate,:exchangerate)
		");
		$result = $statement->execute(
			array(':inconferencerate'	=>	$_POST["inconferencerate"],
				':superearlybirdrate_normal'	=>	$_POST["superearlybirdrate_normal"],
			    ':superearlybirdrate_vip'	=>	$_POST["superearlybirdrate_vip"],
				':earlybirdrate_normal'	=>	$_POST["earlybirdrate_normal"],
			    ':earlybirdrate_vip'	=>	$_POST["earlybirdrate_vip"],
				':regularrate_normal'	=>	$_POST["regularrate_normal"],
			    ':regularrate_vip'	=>	$_POST["regularrate_vip"],
				':studentrate'	=>	$_POST["studentrate"],
			    ':grouprate_normal'	=>	$_POST["grouprate_normal"],
			       ':grouprate_vip'	=>	$_POST["grouprate_vip"],
			          ':internationalrate'	=>	$_POST["internationalrate"],
			             ':exchangerate'	=>	$_POST["exchangerate"],
			             ':site_id'	=>	$_POST["site_id"]
			             
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
			"UPDATE glssiterates 
			SET inconferencerate = :inconferencerate, superearlybirdrate_normal = :superearlybirdrate_normal, superearlybirdrate_vip = :superearlybirdrate_vip,earlybirdrate_normal = :earlybirdrate_normal, earlybirdrate_normal = :earlybirdrate_normal, earlybirdrate_vip = :earlybirdrate_vip,regularrate_normal = :regularrate_normal, regularrate_vip = :regularrate_vip, studentrate = :studentrate,grouprate_normal = :grouprate_normal,grouprate_vip=:grouprate_vip, internationalrate=:internationalrate,exchangerate=:exchangerate,siteID = :siteID
			WHERE rateID = :rate_id
			"
		);
		$result = $statement->execute(
			array(':inconferencerate'	=>	$_POST["inconferencerate"],
				':superearlybirdrate_normal'	=>	$_POST["superearlybirdrate_normal"],
			    ':superearlybirdrate_vip'	=>	$_POST["superearlybirdrate_vip"],
				':earlybirdrate_normal'	=>	$_POST["earlybirdrate_normal"],
			    ':earlybirdrate_vip'	=>	$_POST["earlybirdrate_vip"],
				':regularrate_normal'	=>	$_POST["regularrate_normal"],
			    ':regularrate_vip'	=>	$_POST["regularrate_vip"],
				':studentrate'	=>	$_POST["studentrate"],
			    ':grouprate_normal'	=>	$_POST["grouprate_normal"],
			    ':grouprate_vip'	=>	$_POST["grouprate_vip"],
			     ':internationalrate'	=>	$_POST["internationalrate"],
			     ':exchangerate'	=>	$_POST["exchangerate"],
			    ':siteID'			=>	$_POST["site_id"],
			       ':rate_id'	=>	$_POST["rate_id"]
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


			
<?php 

require_once('header.php');

?>

<?php

include('functionEventDetails.php');
if(isset($_POST["siteID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM glssiteinfo
		WHERE  siteID = '".$_POST["siteID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
	        $output["siteID"] = $row["siteID"];
		    $output["sitename"] = $row["sitename"];
		    $output["sitedescription"] = $row["sitedescription"];
		    $output["eventtype"] = $row["eventtype"];
		    $output["sitevenue"] = $row["sitevenue"];
            $output["sitemobile"] = $row["sitemobile"];
            $output["siteaddress"] = $row["siteaddress"];
		    $output["sitecontactperson"] = $row["sitecontactperson"];
		    $output["sitetarget"] = $row["sitetarget"];
		    $output["sitedays"] = $row["sitedays"];
	
		
	}
	echo json_encode($output);
}
?>

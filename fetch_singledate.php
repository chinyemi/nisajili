<?php 

require_once('header.php');

?>

<?php
//include('db.php');
include('function.php');
if(isset($_POST["site_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM glssitedate
		WHERE  siteID = '".$_POST["site_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sitedate"] = $row["sitedate"];
		$output["inconferencedeadline"] = $row["inconferencedeadline"];
		$output["superearlybirddeadline"] = $row["superearlybirddeadline"];
		$output["earlybirddeadline"] = $row["earlybirddeadline"];
			$output["vsite_id"] = $row["siteID"];
		}
	echo json_encode($output);
}
?>

<?php 

require_once('header.php');

?>

<?php

include('functionWebFaq.php');
if(isset($_POST["id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM webfaq
		WHERE  id = '".$_POST["id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["category"] = $row["category"];
		$output["quiz"] = $row["quiz"];
		$output["answer"] = $row["answer"];
		
	
		
	}
	echo json_encode($output);
}
?>

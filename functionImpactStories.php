<?php



function get_total_all_records()
{
	//include('db.php');
	include '../Includes.php';
	$statement = $connection->prepare("SELECT * FROM webimpactstories");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
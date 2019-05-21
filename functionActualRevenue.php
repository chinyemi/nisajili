<?php

function upload_image()
{
	include '../Includes.php';
	
	if(isset($_FILES["image"]))
	{
		$extension = explode('.', $_FILES['image']['name']);
		//$new_name = rand() . '.' . $extension[1];
		
		//Maintain Same Image nmae
		$new_name = $extension[0] . '.' . $extension[1];
		$destination = $imagespath_write.$new_name;
		move_uploaded_file($_FILES['image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($revenueID)
{
	
	include '../Includes.php';
	
	$statement = $connection->prepare("SELECT image FROM actual_revenue WHERE revenueID = '$revenueID'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}


function get_total_all_records()
{
	//include('db.php');
	include '../Includes.php';
	$statement = $connection->prepare("SELECT * FROM actual_revenue");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
<?php

function upload_image()
{
	include '../Includes.php';
	
	if(isset($_FILES["picture1"]))
	{
		$extension = explode('.', $_FILES['picture1']['name']);
		//$new_name = rand() . '.' . $extension[1];
		
		//Maintain Same Image nmae
		$new_name = $extension[0] . '.' . $extension[1];
		$destination = $imagespath_write.$new_name;
		move_uploaded_file($_FILES['picture1']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($InfoID)
{
	
	include '../Includes.php';
	
	$statement = $connection->prepare("SELECT picture1 FROM webspeakers WHERE InfoID = '$InfoID'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["picture1"];
	}
}

function get_total_all_records()
{
	
	include '../Includes.php';
	
	$statement = $connection->prepare("SELECT * FROM webspeakers");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
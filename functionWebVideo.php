<?php

function upload_image()
{
	include '../Includes.php';
	if(isset($_FILES["thumbnailimage"]))
	{
		$extension = explode('.', $_FILES['thumbnailimage']['name']);
		//$new_name = rand() . '.' . $extension[1];
		//Maintain same picture file name
	    
		$new_name = $extension[0] . '.' . $extension[1];
		$destination=$imagespath_write.'videos/' . $new_name;
		move_uploaded_file($_FILES['thumbnailimage']['tmp_name'], $destination);
	      
		return $new_name;
	
	}
}

function get_image_name($InfoID)
{

	include '../Includes.php';
	$statement = $connection->prepare("SELECT thumbnailimage FROM webvideos WHERE videoID = '$videoID'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["thumbnailimage"];
	}
}

function get_total_all_records()
{
	
	include '../Includes.php';
	$statement = $connection->prepare("SELECT * FROM webvideos");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
<?php

function upload_image()
{
	if(isset($_FILES["Image"]))
	{
		$extension = explode('.', $_FILES['Image']['name']);
		//$new_name = rand() . '.' . $extension[1];
		
		//Maintain Same Image nmae
		$new_name = $extension[0] . '.' . $extension[1];
		$destination = './userimages/' . $new_name;
		move_uploaded_file($_FILES['Image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($UserID)
{
	//include('db.php');
	include '../Includes.php';
	$statement = $connection->prepare("SELECT Image FROM cmembership WHERE UserID = '$UserID'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["Image"];
	}
}

function get_total_all_records()
{
	//include('db.php');
	include '../Includes.php';
	$statement = $connection->prepare("SELECT * FROM cmembership");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
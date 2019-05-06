<?php

//`testimonyID`,`testimony`,`fullname`,`designation`,`city`,`country`,`picture`  table = webtestimonies


function upload_image()
{
	if(isset($_FILES["picture"]))
	{
		$extension = explode('.', $_FILES['picture']['name']);
		//$new_name = rand() . '.' . $extension[1];
		//Maintain same picture file name
		
		$new_name = $extension[0] . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($testimonyID)
{
	//include('db.php');
	include '../Includes.php';
	$statement = $connection->prepare("SELECT picture FROM webtestimonies WHERE testimonyID = '$testimonyID'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["picture"];
	}
}

function get_total_all_records()
{
	//include('db.php');
	include '../Includes.php';
	$statement = $connection->prepare("SELECT * FROM webtestimonies");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
<?php 

require_once('header.php');

?>
<?php


include('functionWebVideo.php');
$query = '';
$output = array();
$query .= "SELECT * FROM webvideos ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE videoname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR youtubeURL LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR description LIKE "%'.$_POST["search"]["value"].'%" ';
	
	
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY videoID DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$thumbnailimage = '';
	if($row["thumbnailimage"] != '')
	{
		$thumbnailimage = '<img src="'.$imagespath_read.'/videos/'.$row["thumbnailimage"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$thumbnailimage = '';
	}
	$sub_array = array();
	$sub_array[] = $thumbnailimage;
	$sub_array[] = $row["videoname"];
	$sub_array[] = $row["youtubeURL"];
	$sub_array[] = $row["description"];
	
	



	$sub_array[] = '<button type="button" name="update" videoID="'.$row["videoID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" videoID="'.$row["videoID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>
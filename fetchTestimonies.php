<?php 

require_once('header.php');

?>
<?php


include('functionTestimonies.php');
$query = '';
$output = array();
$query .= "SELECT  `testimonyID`,REPLACE(`testimony`,'/','') ushuhuda,`fullname`,`designation`,`city`,`country`,`feedback`,`picture` FROM webtestimonies ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE testimony LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR fullname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR city LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR country LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR feedback LIKE "%'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY testimonyID DESC ';
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
	$picture = '';
	if($row["picture"] != '')
	{
		$picture = '<img src="upload/'.$row["picture"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$picture = '';
	}
	$sub_array = array();
	$sub_array[] = $picture;
	$sub_array[] = $row["ushuhuda"];
	$sub_array[] = $row["fullname"];
	$sub_array[] = $row["designation"];
	$sub_array[] = $row["city"];
	$sub_array[] = $row["country"];
    $sub_array[] = $row["feedback"];
	

	$sub_array[] = '<button type="button" name="update" testimonyID="'.$row["testimonyID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" testimonyID="'.$row["testimonyID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
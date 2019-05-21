<?php 

require_once('header.php');

?>
<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM vw_SiteDates  ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE sitedate   LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR inconferencedeadline  LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR superearlybirddeadline  LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR earlybirddeadline   LIKE "%'.$_POST["search"]["value"].'%" ';

;
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY siteID DESC ';
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

	$sub_array = array();
	$sub_array[] = $row["sitename"];
   $sub_array[] = $row["sitedate"];
	$sub_array[] = $row["inconferencedeadline"];
	$sub_array[] = $row["superearlybirddeadline"];
	$sub_array[] = $row["earlybirddeadline"];
	$sub_array[] = '<button type="button" name="update" siteID="'.$row["siteID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" siteID="'.$row["siteID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
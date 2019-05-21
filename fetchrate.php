<?php 

require_once('header.php');

?>



<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();
$query .= "select * from vw_SiteRates ";

if(isset($_POST["search"]["value"]))
{
	$query .= ' where inconferencerate LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR superearlybirdrate_normal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR superearlybirdrate_vip LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR earlybirdrate_normal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR earlybirdrate_vip LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR regularrate_normal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR regularrate_vip LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR studentrate LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR grouprate_normal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR  grouprate_vip LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR internationalrate LIKE "%'.$_POST["search"]["value"].'%" ';
$query .= 'OR  exchangerate LIKE "%'.$_POST["search"]["value"].'%" ';
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
    $sub_array[] = $row["inconferencerate"];
	$sub_array[] = $row["superearlybirdrate_normal"];
	$sub_array[] = $row["superearlybirdrate_vip"];
	$sub_array[] = $row["earlybirdrate_normal"];
	$sub_array[] = $row["earlybirdrate_vip"];
	$sub_array[] = $row["regularrate_normal"];
	 $sub_array[] = $row["regularrate_vip"];
	 	$sub_array[] = $row["studentrate"];
	$sub_array[] = $row["grouprate_normal"];
	$sub_array[] = $row["grouprate_vip"];
	$sub_array[] = $row["internationalrate"];
	$sub_array[] = $row["exchangerate"];
	$sub_array[] = '<button type="button" name="update" rateID="'.$row["rateID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" rateID="'.$row["rateID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$statement->rowCount(),
	"data"				=>	$data
);
echo json_encode($output);
?>
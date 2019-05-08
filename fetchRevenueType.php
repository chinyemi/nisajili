<?php 

require_once('header.php');

?>
<?php

//`exptypeID`,`expType`,`ExpCategory`,`Description`

include('functionRevenueType.php');
$query = '';
$output = array();
$query .= "SELECT `revtypeID`,`revType`,`revCategory`,REPLACE(`Description`,'/','') Description FROM RevenueType ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE revType LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR revCategory LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Description LIKE "%'.$_POST["search"]["value"].'%" ';


}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY revtypeID DESC ';
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
	
	
	$sub_array[] = $row["revType"];
	$sub_array[] = $row["revCategory"];
	$sub_array[] = $row["Description"];
   
   

	$sub_array[] = '<button type="button" name="update" revtypeID="'.$row["revtypeID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" revtypeID="'.$row["revtypeID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
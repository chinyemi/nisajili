<?php 

require_once('header.php');

?>
<?php

//`exptypeID`,`expType`,`ExpCategory`,`Description`

include('functionActualRevenue.php');
$query = '';
$output = array();
$query .= "SELECT revenueID,`Type`,Amount,DateRecorded,Site,REPLACE(`Description`,'/','') as Description FROM actual_revenue";
if(isset($_POST["search"]["value"]))
{
	$query .= ' WHERE Site LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Amount LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Description LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY revenueID DESC ';
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
	
	
	$sub_array[] = $row["Type"];
	$sub_array[] = $row["Amount"];
	$sub_array[] = $row["DateRecorded"];
        $sub_array[] = $row["Description"];
        $sub_array[] = $row["Site"];
   

	$sub_array[] = '<button type="button" name="update" revenueID="'.$row["revenueID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" revenueID="'.$row["revenueID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
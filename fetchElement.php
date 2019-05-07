<?php 

require_once('header.php');

?>
<?php



include('functionElement.php');
$query = '';
$output = array();
$query .= "SELECT `elementID`,REPLACE(`Content`,'/','') Content ,`Category`,`Toggle`,`Position` FROM webelements ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE Content LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Category LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Toggle LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Position LIKE "%'.$_POST["search"]["value"].'%" ';


}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY elementID DESC ';
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
	
	
	$sub_array[] = $row["Content"];
	$sub_array[] = $row["Category"];
	$sub_array[] = $row["Toggle"];
    $sub_array[] = $row["Position"];
   

	$sub_array[] = '<button type="button" name="update" elementID="'.$row["elementID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" elementID="'.$row["elementID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
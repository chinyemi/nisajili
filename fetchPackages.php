<?php 

require_once('header.php');

?>
<?php



include('functionPackages.php');
$query = '';
$output = array();
$query .= "SELECT `id`,`package_name`, `paid_nocash` , `remarks`, `toggle` FROM packageinfo ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE package_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR paid_nocash LIKE "%'.$_POST["search"]["value"].'%" ';
	


}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
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
	
	$sub_array[] = $row["package_name"];
	$sub_array[] = $row["paid_nocash"];
	$sub_array[] = $row["remarks"];
	$sub_array[] = $row["toggle"];
	


	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
<?php 

require_once('header.php');

?>
<?php


include('functionPaymentOnline.php');
$query = '';
$output = array();
$query .= "SELECT `GatewayID`,`GatewayName`,`Currency`,`Toggle`,`GatwayMobile`,`GatewayEmail`,`GatwayAddress`,`Description`,`Type`,`GatewayKey`,`GatewaySecret` FROM `vw_PaymentOptions_Online` ";
if(isset($_POST["search"]["value"]))
{
	$query .= ' WHERE GatewayName LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= ' OR Toggle LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= ' OR GatwayMobile LIKE "%'.$_POST["search"]["value"].'%" ';


}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY GatewayID DESC ';
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
	
	$sub_array[] = $row["GatewayName"];
	$sub_array[] = $row["Currency"];
	$sub_array[] = $row["Toggle"];
	$sub_array[] = $row["GatwayMobile"];
	$sub_array[] = $row["GatewayEmail"];
	$sub_array[] = $row["GatwayAddress"];
	$sub_array[] = $row["Description"];
	$sub_array[] = $row["Type"];
	$sub_array[] = $row["GatewayKey"];
	$sub_array[] = $row["GatewaySecret"];

	$sub_array[] = '<button type="button" name="update" GatewayID="'.$row["GatewayID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" GatewayID="'.$row["GatewayID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
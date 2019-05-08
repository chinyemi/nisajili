<?php 

require_once('header.php');

?>
<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();



$query = "select id,purchase_date,typeid,txncode,quantity,amount,r.rate as rate,sms_type
from 

 sms_purchases p, sms_rate r where p.typeid=r.rate_Id  ";
 


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

$ref=$row["txncode"];
$rowId=$row['id'];

	$sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["purchase_date"];
    $sub_array[] = $row["sms_type"];
    $sub_array[] = $row["txncode"];
    $sub_array[] = $row["quantity"];
    $sub_array[] = $row["amount"];
    $sub_array[] = '<a href="DPOPurchase.php?rid='.$rowId.'&Id='.$Id.'" class="btn btn-warning btn-xs update 
    target="_blank">RECHARGE</a>';
    
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
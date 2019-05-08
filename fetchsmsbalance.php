<?php 

require_once('header.php');

?>
<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();

$FirstName="PAYER";
$LastName=="PAYER";
$Mobile="0000";
$Amount=$_GET['Amount'];
$Reference=$_GET['Reference'];
$Email="gideon.mugalula@gmail.com";
$currecy="TZS";
$Type=$_GET['Type'];



$query = "select id,member_code ,sms_balance, 	sms_type ,user_id 	
from 

 sms_balance ORDER BY id  ";

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

$ref=$row["id"]."-".$row["member_code"];

	$sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["member_code"];
    $sub_array[] = $row["sms_balance"];
    $sub_array[] = $row["sms_type"];
    $sub_array[] = '<a href="DPOPurchase.php?Reference='.$ref.'" class="btn btn-warning btn-xs update target="_blank">RECHARGE</a>';
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
<?php 

require_once('header.php');

?>
<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();



$query = "select DISTINCT(sms_id), batch , 	sms_sent ,sms_type,receiver_count,user_id 	
from 

sent_sms  ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE batch  LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sms_sent  LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sms_type  LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR receiver_count  LIKE "%'.$_POST["search"]["value"].'%" ';


}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY sms_id DESC ';
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
    $sub_array[] = $row["sms_id"];
    $sub_array[] = $row["batch"];
    $sub_array[] = $row["sms_sent"];
    $sub_array[] = $row["sms_type"];
     $sub_array[] = $row["receiver_count"];
 
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
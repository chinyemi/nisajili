<?php 

require_once('header.php');

?>
<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();



$query = "select sms_id, sms_description,sms_composedate,`Fullname`
from 

sms_list s, 
cmembership m
WHERE
s.user_id=m.UserID ";


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY sms_description DESC ';
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
    $sub_array[] = $row["sms_description"];
    $sub_array[] = $row["sms_composedate"];
    $sub_array[] = $row["Fullname"];
    $sub_array[] = $row["sms_id"];
    $sub_array[] = '<button type="button" name="update" sms_id="'.$row["sms_id"].'" class="btn btn-warning btn-xs update">UPDATE</button>';
   
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
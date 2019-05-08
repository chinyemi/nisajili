<?php 

require_once('header.php');

?>
<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();



$query = "select  * FROM 
delegate ";


if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE fullname  LIKE "%'.$_POST["search"]["value"].'%" ';
		$query .= 'OR mobile  LIKE "%'.$_POST["search"]["value"].'%" ';
			$query .= 'OR email  LIKE "%'.$_POST["search"]["value"].'%" ';

}



if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY fullname DESC ';
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
    $sub_array[] = $row["delegateID"];
       $sub_array[] = $row["fullname"];
        $sub_array[] = $row["mobile"];
        $sub_array[] = $row["email"];
$sub_array[] = '<button type="button" name="update" user_id="'.$row["delegateID"].'" class="btn btn-warning btn-xs update">ASSIGN TO GROUP</button>';

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
<?php 

require_once('header.php');

?>
<?php
//include('db.php');

include('function.php');
$query = '';
$output = array();



$query = "select  group_id,group_name,date_created,`Fullname`,`membersno`
from 

member_groups g, 
cmembership m  WHERE g.user_id=m.UserID and";

if(isset($_POST["search"]["value"]))
{
	$query .= ' group_name  LIKE "%'.$_POST["search"]["value"].'%" ';

}



if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY group_name DESC ';
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
    $sub_array[] = $row["group_id"];
       $sub_array[] = $row["group_name"];
        $sub_array[] = $row["membersno"];
     $sub_array[] = $row["Fullname"];
     $sub_array[] = $row["date_created"];
   
   $sub_array[] = '<button type="button" name="update" group_id="'.$row["group_id"].'" class="btn btn-warning btn-xs update">UPDATE</button>';
	$sub_array[] = '<button type="button" name="delete" group_id="'.$row["group_id"].'" class="btn btn-danger btn-xs delete"> DELETE</button>';
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
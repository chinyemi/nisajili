<?php 

require_once('header.php');

?>
<?php



include('functionUserManagement.php');
$query = '';
$output = array();
$query .= "SELECT `UserID`,`UserName`,`Password`,`Gender`, 'DoB' ,`Email`,`MobileNo`,`Designation`,`Userlevel`,`dateregistered`,`UserAccountSuspended` FROM cmembership ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE Type LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR dateregistered LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR UserName LIKE "%'.$_POST["search"]["value"].'%" ';


}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY UserID DESC ';
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
	
	$sub_array[] = $row["UserName"];
	$sub_array[] = $row["Password"];
	$sub_array[] = $row["Gender"];
    $sub_array[] = $row["DoB"];
    $sub_array[] = $row["Email"];
	$sub_array[] = $row["MobileNo"];
	$sub_array[] = $row["Designation"];
	$sub_array[] = $row["Userlevel"];
	$sub_array[] = $row["dateregistered"];
	$sub_array[] = $row["UserAccountSuspendedail"];

	$sub_array[] = '<button type="button" name="update" UserID="'.$row["UserID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" UserID="'.$row["UserID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
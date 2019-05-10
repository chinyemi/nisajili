<?php 

require_once('header.php');

?>
<?php


include('functionUserManagement.php');
$query = '';
$output = array();
$query .= "SELECT   `UserID`,`UserName`,`Password`,`Fullname`,`Gender`,`Email`,`MobileNo`,`Designation`,`Userlevel`,`dateregistered`,`UserAccountSuspended`,`Image` FROM cmembership ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE UserName LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Fullname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Email LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR MobileNo LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Designation LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Userlevel LIKE "%'.$_POST["search"]["value"].'%" ';

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
	$Image = '';
	if($row["Image"] != '')
	{
		$Image = '<img src="upload/'.$row["Image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$Image = '';
	}
	$sub_array = array();
	$sub_array[] = $Image;
	
	$sub_array[] = $row["UserName"];
	$sub_array[] = $row["Password"];
	$sub_array[] = $row["Fullname"];
	$sub_array[] = $row["Gender"];
	$sub_array[] = $row["Email"];
	$sub_array[] = $row["MobileNo"];
	$sub_array[] = $row["Designation"];
	$sub_array[] = $row["Userlevel"];
	$sub_array[] = $row["dateregistered"];
	$sub_array[] = $row["UserAccountSuspended"];
	


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
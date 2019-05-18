<?php 

require_once('header.php');

?>
<?php


include('functionSpeakerBio.php');
$query = '';
$output = array();
$query .= "SELECT `InfoID`,`fullname`,`designation`,`organization`,REPLACE(`biography`,'/','') wasifu,`facebook`,`twitter`,`instagram`,`picture1`,`profile_row`,`roworder` 
FROM webspeakers ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE fullname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR organization LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR biography LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR facebook LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR twitter LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR instagram LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR profile_row LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR roworder LIKE "%'.$_POST["search"]["value"].'%" ';
	
 
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY InfoID DESC ';
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
	$picture1 = '';
	if($row["picture1"] != '')
	{
		$picture1 = '<img src="'.$imagespath_read.$row["picture1"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$picture1 = '';
	}
	$sub_array = array();
	$sub_array[] = $picture1;
	
	$sub_array[] = $row["fullname"];
	$sub_array[] = $row["designation"];
	$sub_array[] = $row["organization"];
	$sub_array[] = $row["wasifu"];
	$sub_array[] = $row["facebook"];
	$sub_array[] = $row["twitter"];
	$sub_array[] = $row["instagram"];
	$sub_array[] = $row["profile_row"];
	$sub_array[] = $row["roworder"];
	
	


	$sub_array[] = '<button type="button" name="update" InfoID="'.$row["InfoID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" InfoID="'.$row["InfoID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
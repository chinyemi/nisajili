<?php 

require_once('header.php');

?>
<?php



include('functionSpeakerContents.php');
$query = '';
$output = array();
$query .= "SELECT `contentID`,`speakerID`,`contentURL`,`imageLink`,`fa_Icon`, 	fullname,description FROM webspeakercontents c, webspeakers s where 
s.InfoID=c.speakerID   ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'and ( fullname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR description LIKE "%'.$_POST["search"]["value"].'%" )';



}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY contentID DESC ';
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
	
	
	$sub_array[] = $row["fullname"];
	$sub_array[] = $row["contentURL"];
	$sub_array[] = $row["imageLink"];
    $sub_array[] = $row["fa_Icon"];
    $sub_array[] = $row["description"];
  

	
	$sub_array[] = '<button type="button" name="update" contentID="'.$row["contentID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" contentID="'.$row["contentID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
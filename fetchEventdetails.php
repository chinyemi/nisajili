<?php 

require_once('header.php');

?>
<?php



include('functionEventDetails.php');
$query = '';
$output = array();
$query .= "SELECT `siteID`,`sitename`,`sitedescription`,`eventtype`,`sitevenue`,`sitemobile`,`siteaddress`,`sitecontactperson`,`sitetarget`,`sitedays` FROM glssiteinfo ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE sitename LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eventtype LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sitevenue LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR sitecontactperson LIKE "%'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY siteID DESC ';
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
	
	
	$sub_array[] = $row["siteID"];
	$sub_array[] = $row["sitename"];
	$sub_array[] = $row["sitedescription"];
    $sub_array[] = $row["eventtype"];
    $sub_array[] = $row["sitevenue"];
	$sub_array[] = $row["sitemobile"];
	$sub_array[] = $row["siteaddress"];
	$sub_array[] = $row["sitecontactperson"];
	$sub_array[] = $row["sitetarget"];
	$sub_array[] = $row["sitedays"];

	$sub_array[] = '<button type="button" name="update" siteID="'.$row["siteID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" siteID="'.$row["siteID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
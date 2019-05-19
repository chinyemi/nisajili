<?php 

require_once('header.php');

?>
<?php



include('functionImpactStories.php');
$query = '';
$output = array();
$query .= "SELECT `storyID`,c.`siteID`,`storyURL`,`imageLink`,`fa_Icon`,`description`,`status`,`storyTeller`,`sitename` FROM webimpactstories c, glssiteinfo s WHERE 
s.siteID =c.siteID ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'and ( sitename LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR description LIKE "%'.$_POST["search"]["value"].'%" )';



}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY storyID DESC ';
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
	
	
	$sub_array[] = $row["sitename"];
	$sub_array[] = $row["storyURL"];
	$sub_array[] = $row["imageLink"];
    $sub_array[] = $row["fa_Icon"];
    $sub_array[] = $row["description"];
	$sub_array[] = $row["status"];
	$sub_array[] = $row["storyTeller"];
  

	
	$sub_array[] = '<button type="button" name="update" storyID="'.$row["storyID"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" storyID="'.$row["storyID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
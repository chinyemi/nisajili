<?php 

require_once('header.php');

?>
<?php


include("functionUserManagement.php");

if(isset($_POST["UserID"]))
{
	
	$Image= get_image_name($_POST["UserID"]);
	if($Image != '')
	{
		unlink("userimages/" . $Image);
	}
	
	$statement = $connection->prepare(
		"DELETE FROM cmembership WHERE UserID = :UserID"
	);
	$result = $statement->execute(
		array(
			':UserID'	=>	$_POST["UserID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}


?>
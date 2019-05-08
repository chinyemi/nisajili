<?php 

require_once('header.php');

?>

<?php
//include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM delegate
		WHERE   delegateID = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	$output["membername"] = $row["fullname"];
    $output["user_id"] = $row["delegateID"];
}
	echo json_encode($output);
}
?>



  
  
  
  
  
  
   
  
  
  
   
  
 
  
  

  
   
  
  
  
   
  
  
  
  

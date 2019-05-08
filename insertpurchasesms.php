<?php 

require_once('header.php');


?>
<?php
//include('db.php');
include('function.php');



		
$smsno=$_POST["smsno"];	
$typeid=$_POST["typeid"];

$sql = "select  rate_id,rate from  sms_rate where  rate_id='$typeid' ";
$resm=mysqli_query($conn,$sql);
$srow=mysqli_fetch_array($resm);
$rate=$srow['rate'];

$amount=$smsno*$rate;

//amount 
// 	txncode 

$txncode =$typeid."-".$userid.Date("Ymdhis")."-".CLIENT_SHORT_NAME;

$sql="insert into sms_purchases set user_id='$userid',quantity='$smsno',amount='$amount',rate='$rate',typeid='$typeid',txncode='$txncode'";
	$resm=mysqli_query($conn,$sql);	

	
			echo 'Data Inserted';
	


?>


			
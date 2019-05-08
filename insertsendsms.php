<?php 

require_once('header.php');


?>
<?php
//include('db.php');
include('function.php');
$SMStoSend=$_POST['composesms'];

$sms_id=$_POST['sms_id'];
$groupid=$_POST['groupid'];
$batchno=Date("Ymdhis");
$smsbalance=$_POST['smsbalance'];
$rateid=$_POST['rateid'];



$result= mysqli_query($conn,"select COUNT(member_id) as membercount FROM member_group_list where  	group_id='$groupid'");
$row=mysqli_fetch_array($result);
$membercount=$row['membercount'];


if ($smsbalance>=$membercount)
{


$resultsms=mysqli_query($conn,"select  DISTINCT(member_id),fullname,mobile,email   from  delegate d,member_group_list m where d.delegateID=m.member_id and
       m.group_id='$groupid'");

while($trow=mysqli_fetch_array($resultsms))
{
    $Fullname=$trow['fullname'];
    $MobileNo=$trow['mobile'];
    $Email=$trow['email'];
    
    
        //text email
       if ($rateid==1){
           $type="EMAIL";
           $sql="insert into sent_sms set sms_sent='$SMStoSend',sent_to='$Email',user_id='$userid',sms_type='$type',sms_id='$sms_id',batch='$batchno'";
                $r=mysqli_query($conn,$sql);
           sendEmail($Fullname,$SMStoSend,$Email);
     }
      
     
       //text watsap
        if ($rateid==2){  
            $type="WATSHAP";
              $sql="insert into sent_sms set sms_sent='$SMStoSend',sent_to='$MobileNo',user_id='$userid',sms_type='$type',sms_id='$sms_id',batch='$batchno'";
              $r=mysqli_query($conn,$sql);
                 sendWatsappSMS($MobileNo,$SMStoSend);
                 }
                 
                 
       
    //text sms
      if ($rateid==3){
    $type="SMS";
    $sql="insert into sent_sms set sms_sent='$SMStoSend',sent_to='$MobileNo',user_id='$userid',sms_type='$type',sms_id='$sms_id',batch='$batchno'";
    $r=mysqli_query($conn,$sql);
     $SENDERID="GLSTANZANIA";
    sendSMS($Mobile,$SENDERID,$SMStoPay);
   }
   
   
   
   //text voice
      if ($rateid==4){
          $type="SMS";
    $sql="insert into sent_sms set sms_sent='$SMStoSend',sent_to='$MobileNo',user_id='$userid',sms_type='$type',sms_id='$sms_id',batch='$batchno'";
    //$r=mysqli_query($conn,$sql);
     //sendVoiceMessage($Mobile,$SENDERID,$SMStoPay);
      }
   
   
    //text voice
      if ($rateid==5){
          $type="TELEGRAM";
    $sql="insert into sent_sms set sms_sent='$SMStoSend',sent_to='$MobileNo',user_id='$userid',sms_type='$type',sms_id='$sms_id',batch='$batchno'";
    //$r=mysqli_query($conn,$sql);
     //sendVoiceMessage($Mobile,$SENDERID,$SMStoPay);
      }
   
   
   $smsbalance=$smsbalance-1;
    $sent=$sent+1;
     $update="update sent_sms set  receiver_count='$sent' WHERE batch='$batchno'";$result_x=mysqli_query($conn,$update);
     
 $update="update sms_rate set  current_balance ='$smsbalance' WHERE rate_id='$rateid'";
   $result_x=mysqli_query($conn,$update);
   
}
	
 

	echo "Message sent to all recipients, Your new balance  for $type is".$smsbalance;
}else
{
    	echo "You cannot send messages to members whose number is greater than your message balance. Member count is $membercount  while sms balance is  $smsbalance  Please  recharge";
}
?>


			
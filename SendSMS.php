<?php 

include '../Includes.php';

 $sms = new SMSSender();
   $NewMobileNumber = preg_replace('/^0?/', COUNTRY_CODE, $Mobile);
   $sms->sender = SENDERID;
   $sms->number = [$NewMobileNumber];
		
    $sms->message = $SMStoPay;	
		
	    
   return $sms->send();

?>
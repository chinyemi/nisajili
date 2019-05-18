<?php 
error_reporting(0);

date_default_timezone_set(TIME_ZONE);
session_start();




include ("../auth.php");

include '../Includes.php';



//Check Season
	
 $getSeason=mysqli_query($conn,"SELECT * FROM `siteseason` WHERE `SeasonStatus`='OPEN'");	
 $rowSeason=mysqli_fetch_array($getSeason);
 $CurrYear=$rowSeason['Year'];	




 $userid =	$_SESSION['UserID'];


//SMS Class starts here





if (file_exists('../../vendor/rmccue/requests/library/Requests.php')) {
	
	
$findSMSlibrary="../../vendor/rmccue/requests/library/Requests.php";


	
 } else {
	
$findSMSlibrary="../../../vendor/rmccue/requests/library/Requests.php";	

}



require_once $findSMSlibrary;
//use Requests;
Requests::register_autoloader();
//use Exception;
// $getSender = mysql_query("SELECT `parameterValue` sender FROM `ssystemparameter` WHERE `parameterName`='TANNA SMS'");
//   $rowSender = mysql_fetch_array($getSender);
//   $SMSSender = $rowSender['sender'];
class SMSSender {
  public $number = array();
  public $message = 'Message from DigitalBrain';
  public $sender = "GLSTANZANIA";
  
  public function send(){
    if(count($this->number) == 0){
      throw new UndefinedPhoneNumberException('Phone number field is undefined');
    }
      
        $headers = array('Host' => 'api.infobip.com', 
                     'Authorization' => 'Basic '.base64_encode('mbutho:Utade@2017'), 
                     'Content-Type' => 'application/json',
                     'Accept' => 'application/json');
      $data = array('from' => $this->sender, 
                    'to' => $this->number, 
                    'text' => $this->message);
      return $request = Requests::post('https://api.infobip.com/sms/1/text/single', $headers, json_encode($data),['timeout'=>500,'connect_timeout'=>500]);
    if(count($this->number) == 0){
      throw new UndefinedPhoneNumberException('Phone number field is undefined');
    }
    }
}

class UndefinedPhoneNumberException extends Exception {}



//SMS Class ends here

/*
function sendEmail($Fullname,$SMStoSend,$Email){
  $subject="From digital brain";
  $type="EMAIL";
  mail($Email,$subject,$SMStoSend);  
  

    
}


function sendSMS($Mobile,$SENDERID,$SMStoPay)
{
    $sms = new SMSSender();
   $NewMobileNumber = preg_replace('/^0?/', +255, $Mobile);
   $sms->sender = "GLSTANZANIA";
   $sms->number = "255758401046";
		
    $sms->message = $SMStoPay;	
		
	    
   return $sms->send();
}



  function sendWatsappSMS($Mobile,$SMStoSend)
  {
      $data = [
    'phone' => "'".$Mobile."'", // Receivers phone
    'body' =>$SMStoSend, // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://eu15.chat-api.com/instance38730/message?token=lxat51763l3j4fyg';


// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);
  

}



function setVoiceMessage($Mobile,$msgurl)
{

 $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://{base_url}/tts/3/multi",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{ \n \"messages\":[ \n { \n \"from\":\"41793026700\",\n \"to\":[ \n \"255758401046\",\n \"255758401046\"\n ],\n \"audioFileUrl\": \"http://www.hudumaapp.com/music/1.mp3\"\n },\n { \n \"from\":\"41793026700\",\n \"to\": [\"41793026785\"],\n \"text\": \"Hello world!\",\n \"language\": \"en\"\n }\n ]\n}",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
  */
  
?>
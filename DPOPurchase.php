<?php
require_once('header.php');
$id=$_GET['rid'];

$sql="select * from sms_purchases where id='$id'";
$resm=mysqli_query($conn,$sql);
$srow=mysqli_fetch_array($resm);


$FirstName="PAYER";

$LastName="PAYER";
$Mobile="0756334112";


$Email=$_GET['Email'];
$Amount=$srow['amount'];

$Reference=$srow['txncode'];
$Email="gideon.mugalula@gmail.com";
$currecy=CURRENCY;
$Type=2;





$input_xml = '<?xml version="1.0" encoding="utf-8"?>
<API3G>
<CompanyToken>AE5614A8-2436-4B01-B506-AB60DC235239</CompanyToken>

<Request>createToken</Request>
<Transaction>
<PaymentAmount>'.$Amount.'</PaymentAmount >
<PaymentCurrency>'.$currecy.'</PaymentCurrency>
<CompanyRef>'.$Reference.'</CompanyRef>
<RedirectURL>'.VERIFICATIONLINK.'</RedirectURL>
<BackURL>'.PURCHASELINK.'</BackURL>
<CompanyRefUnique>0</CompanyRefUnique>
<PTL>5</PTL>
<customerFirstName>'.$FirstName.'</customerFirstName>
<customerLastName>'.$LastName.'</customerLastName>
<customerAddress>DSM</customerAddress>
<customerCity>Dar</customerCity>
<customerCountry>TZ</customerCountry>
<customerEmail>'.$Email.'</customerEmail>
<customerPhone>'.$Mobile.'</customerPhone>
<customerZip>255</customerZip>
<DefaultPayment>MO</DefaultPayment>
<DefaultPaymentCountry>TANZANIA</DefaultPaymentCountry>
</Transaction>
<Services>
  <Service>
    <ServiceType>25736</ServiceType>
    <ServiceDescription>Payment for service</ServiceDescription>
    <ServiceDate>2013/12/20 19:00</ServiceDate>
  </Service>
</Services>
<Additional>
  <BlockPayment>BT</BlockPayment>
  <BlockPayment>PP</BlockPayment>
</Additional>
</API3G>';


$headers = array(
    "Content-type: text/xml",
    "Content-length: " . strlen($input_xml),
    "Connection: close",
);



$url = "https://secure.3gdirectpay.com/API/V6/";

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = curl_exec($ch); 


//convert the XML result into array
$array_data = json_decode(json_encode(simplexml_load_string($data)), true);
$dataToken= $array_data['TransToken'];


header("Location:https://secure.3gdirectpay.com/dpopayment.php?ID=$dataToken");



if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);



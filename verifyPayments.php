<?php
require_once('header.php');
$TransID = $_GET['TransID'];
$CCDapproval = $_GET['CCDapproval'];
$PnrID = $_GET['PnrID'];
$Token = $_GET['TransactionToken'];
$CompanyRef = $_GET['CompanyRef'];


//$TransID = "A54A74D7-B7F8-4F6A-BE03-4DA423BAB228";
//$CCDapproval = "";
//$PnrID = "1-1020190508090525-EAPCEXPO";
//$Token = "A54A74D7-B7F8-4F6A-BE03-4DA423BAB228";
//$CompanyRef = "1-1020190508090525-EAPCEXPO";


$input_xml = '<?xml version="1.0" encoding="utf-8"?>
<API3G>
  <CompanyToken>9F416C11-127B-4DE2-AC7F-D5710E4C5E0A</CompanyToken>
  <Request>verifyToken</Request>
  <TransactionToken>' . $Token . '</TransactionToken>
</API3G>';



$headers = array(
    "Content-type: text/xml",
    "Content-length: " . strlen($input_xml),
    "Connection: close",
);


//$url = "https://secure1.sandbox.directpay.online/API/v6/";
$url = "https://secure.3gdirectpay.com/API/V6/";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = curl_exec($ch);



//convert the XML result into array
$array_data = json_decode(json_encode(simplexml_load_string($data)), true);



$Result = $array_data['Result'];
$ResultExplanation = $array_data['ResultExplanation'];
$CustomerName = $array_data['CustomerName'];
$CustomerCredit = $array_data['CustomerCredit'];
$TransactionApproval = $array_data['TransactionApproval'];
$TransactionCurrency = $array_data['TransactionCurrency'];
$TransactionAmount = $array_data['TransactionAmount'];
$FraudAlert = $array_data['FraudAlert'];
$FraudExplnation = $array_data['FraudExplnation'];
$TransactionNetAmount = $array_data['TransactionNetAmount'];
$TransactionSettlementDate = $array_data['TransactionSettlementDate'];

$TransactionRollingReserveAmount = $array_data['TransactionRollingReserveAmount'];
$TransactionRollingReserveDate = $array_data['TransactionRollingReserveDate'];
$CustomerPhone = $array_data['CustomerPhone'];
$CustomerCountry = $array_data['CustomerCountry'];
$CustomerAddress = $array_data['CustomerAddress'];
$CustomerCity = $array_data['CustomerCity'];
$CustomerZip = $array_data['CustomerZip'];
$MobilePaymentRequest = $array_data['MobilePaymentRequest'];
$AccRef = $array_data['AccRef'];



$product = explode("-", $CompanyRef);
$prodKey = $product[0];
$clientcode = $product[2];

$sql = "select COUNT(Token) as count FROM dbo_payments WHERE Trans_Id='$TransID'";
$resm = mysqli_query($conn, $sql);
$srow = mysqli_fetch_array($resm);
$count = $srow['count'];
$Period =Date("Ym");



if ($count == 0) {
    $insert = "insert into dbo_payments set   Result='$Result',User_Ref='$PnrID',
    ResultExplanation='$ResultExplanation',
    Music_Code='$prodKey',
    clientcode='$clientcode',
    TransactionApproval='$TransactionApproval',
    TransactionCurrency='$TransactionCurrency',
    TransactionAmount='$TransactionAmount',
    FraudAlert='$FraudAlert',
    TransactionNetAmount='$TransactionNetAmount',
    TransactionSettlementDate='$TransactionSettlementDate',
    TransactionRollingReserveAmount='$TransactionRollingReserveAmount',
    TransactionRollingReserveDate='$TransactionRollingReserveDate',
    CustomerPhone='$CustomerPhone',
    CustomerCountry='$CustomerCountry',
    CustomerAddress='$CustomerAddress',
    CustomerCity='$CustomerCity',
    CustomerZip='$CustomerZip',
    MobilePaymentRequest='$MobilePaymentRequest',Period='$Period',
    AccRef='$CompanyRef',Token ='$Token',Trans_Id='$TransID'";
    $resm = mysqli_query($conn, $insert) or die($insert . mysqli_error($conn));






    $sql = "select TransactionAmount FROM dbo_payments WHERE Trans_Id='$TransID'";
    $resm = mysqli_query($conn, $sql);
    $srow = mysqli_fetch_array($resm);
    $TransactionAmount = $srow['TransactionAmount'];


    $sql = "select rate,current_balance from  sms_rate where  rate_id='$prodKey' ";
    $resm = mysqli_query($conn, $sql);
    $srow = mysqli_fetch_array($resm);
    $rate = $srow['rate'];
    $current_balance = $srow['current_balance'];


    $cashbal = $TransactionAmount % $rate;

    $qty = $TransactionAmount / $rate;

    $qty = $qty + $current_balance;

    $qty = number_format($qty, 0);

    $sql = "update sms_rate set current_balance='$qty' where rate_id='$prodKey'";
    $resm = mysqli_query($conn, $sql);


    $sql = "update sms_purchases set status_id=1 where  	txncode='$CompanyRef'";
    $resm = mysqli_query($conn, $sql);

    $result = "Yo have succesfully rechared your account!!!!";
}
?>
<form class="form-horizontal" role="form" method="post">
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <?php echo $result; ?>	
        </div>
    </div>
</form>

<?php 

$pageID=$_GET['pageID'];


if ($pageID=='FrameContent_NoCash') {
	
	$iFrameLink="delegate_registration_no_pay.php";
}

if ($pageID=='FrameContent_Cash') {
	
	$iFrameLink="delegate_registration_manual_pay.php";
}

if ($pageID=='FrameContent_CheckIn') {
	
	$iFrameLink="summitchecking_ticket_proc.php";
}

if ($pageID=='FrameContent_CheckInQRCode') {
	
	$iFrameLink="qr/summitchecking_qrcode_proc.php";
}

if ($pageID=='FrameContent_RegistrantsReport') {
	
	$iFrameLink="registrantsreports_proc.php";
}

if ($pageID=='FrameContent_Car_Reports') {
	
	$iFrameLink="delegate_car_reports.php";
}

if ($pageID=='FrameContent_Car_CheckIn') {
	
	$iFrameLink="gatepasschecking_ticket_proc.php";
}

if ($pageID=='FrameContent_Speaker_Bio') {
	
	$iFrameLink="SpeakerBio_html.php";
}

if ($pageID=='FrameContent_Web_Video') {
	
	$iFrameLink="WebVideo_html.php";
}

if ($pageID=='FrameContent_Testimonies') {
	
	$iFrameLink="Testimonies_html.php";
}



if ($pageID=='FrameContent_Orders_Individual') {
	
	$iFrameLink="Process_Order_Individual_html.php";
}

if ($pageID=='FrameContent_Gen_Cert') {
	
	$iFrameLink="Generate_Certificates_proc.php";
}
if ($pageID=='SysInfo') {
	
	$iFrameLink="Info_html.php";
}

if ($pageID=='GLSdates') {
	
	$iFrameLink="Dates_html.php";
}


if ($pageID=='SysRates') {
	
	$iFrameLink="Rates_html.php";
}


if ($pageID=='GenerateDelRpt') {
	
	$iFrameLink="generatedelegaterpt_proc.php";
}

if ($pageID=='GenerateCarRpt') {
	
	$iFrameLink="generatecarrpt_proc.php";
}

if ($pageID=='FrameContent_SiteSeason') {
	
	$iFrameLink="SiteSeason_html.php";
}

if ($pageID=='textSMS') {
	
	$iFrameLink="CreateTextSMS.php";
}

if ($pageID=='sendSMS') {
	
	$iFrameLink="SendTextSMS.php";
}

if ($pageID=='sendeEmail') {
	
	$iFrameLink="SendEmail.php";
}


if ($pageID=='sentMsgs') {
	
	$iFrameLink="SentMesages.php";
}


if ($pageID=='watsapMsgs') {
	
	$iFrameLink="WatsapMesages.php";
}

if ($pageID=='smsBalance') {
	
	$iFrameLink="SmsBalance.php";
}


if ($pageID=='defineGroups') {
	
	$iFrameLink="DefineGroups.php";
}


if ($pageID=='assignMemberToIndividual') {
	
	$iFrameLink="AssignMemberToIndividual.php";
}


if ($pageID=='assignMemberToGroups') {
	
	$iFrameLink="AssignMembersToGroup.php";
}

if ($pageID=='FrameContent_RecordExpenses') {
	
	$iFrameLink="Expenses_html.php";
}

if ($pageID=='FrameContent_ExpensesType') {
	
	$iFrameLink="ExpensesType_html.php";
}



?>
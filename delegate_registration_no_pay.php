<?php 

require_once('header.php');

?>

<?php

	if (isset($_POST["submit"])) {
		
		$fullname = $_POST['fullname'];
		
		$split = explode(' ', $fullname,2);
		$FirstName = $split[0];
		$LastName = $split[1];
	
		$Mobile = $_POST['Mobile'];
		$Mobile = preg_replace('/\s+/', '', $Mobile);
		
		
		$Email = $_POST['Email'];
		$Organization = $_POST['Organization'];
		
		
		$package = $_POST['package'];
		$Amount= $_POST['Amount'];
		$GLSSite = $_POST['GLSSite'];
		
		$type = "MERCHANT"; //default value = MERCHANT
		
		
		// Check if fname has been entered
		if (!$_POST['GLSSite']) {
			$errGLSSite = 'Select GLSSite'.$GLSSite;
		}
		// Check if fname has been entered
		if (!$_POST['fullname']) {
			$errfullname = 'Please enter Full Name';
		}
		
		// Check if mobile has been entered
		if (!$_POST['Mobile']) {
			$errMobile = 'Please enter mobile number';
		}
		
		 $mobileprefix=substr($Mobile, 0, 2);
	
		//Check MobileNumber Format
		
		/*
		if (($mobileprefix!='06') && ($mobileprefix!='07'))  {
			
		$errMobileFormat = 'mobile number must start with 06 or 07. e.g:  0713427857';	
		} 
		*/
	
		
		
		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
			$errValidEmail = "Invalid email address"; 
		     }
		
		
		// Check if fname has been entered
		if (!$_POST['Organization']) {
			$errOrganization = 'Please enter Organization';
		}
		
		// Check if fname has been entered
		if (!$_POST['Amount']) {
			$errAmount = 'Please enter Amount';
		}
		// Check if mobile has been entered
		if (!$_POST['package']) {
			$errpackage = 'Please enter package';
		}
		
		

		
		
// If there are no errors, submit form
if (!$errfullname && !$errMobile && !$errValidEmail && !$errOrganization && !$errpackage && !$errGLSSite) {

$GLSSite = strtoupper($GLSSite);
$package = strtoupper($package);

$ticketno =substr($GLSSite,0,3).rand(1,1000).date('h').date('i').date('s').substr($package, 0, 1);

$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$paymentrefno = substr(str_shuffle($letters),0,4);

	
$tarehe=date('Y-m-d');
	
//Check Season
	
 $getSeason=mysqli_query($conn,"SELECT * FROM `siteseason` WHERE `SeasonStatus`='OPEN'");	
 $rowSeason=mysqli_fetch_array($getSeason);
	
	
$CurrYear=$rowSeason['Year'];		
	
	
	
$Cert_Amount="1000";


	$getData=mysqli_query($conn,"SELECT * FROM `delegate`  WHERE `mobile`='".$Mobile."' AND `glsyear` ='".$CurrYear."' AND `glssite`='".$GLSSite."' ");
	  $hesabu=mysqli_num_rows($getData);
	  
	if ($hesabu=='0'){
	
	//Get GLS Site Information		
		
  $getSite=mysqli_query($conn,"SELECT i.`sitename` sitename,d.`earlybirddeadline` earlybirddeadline,r.`earlybirdrate_normal` earlybirdrate_normal,r.`earlybirdrate_vip` earlybirdrate_vip,r.`regularrate_normal` regularrate_normal, r.`regularrate_vip` regularrate_vip,r.`studentrate` studentrate, r.`grouprate_normal` grouprate_normal,r.`grouprate_vip` grouprate_vip
FROM `glssiteinfo` i,`glssitedate` d,`glssiterates` r
WHERE i.`sitename`='".$GLSSite."'
AND i.`siteID`=d.`siteID`
AND d.`siteID`=r.`siteID`");	
		
		
		
  $rowSite=mysqli_fetch_array($getSite);	
 		

  $SiteName=$rowSite['sitename'];		
  $EarlyBirdrateNormal=$rowSite['earlybirdrate_normal'];
  $EarlyBirdrateVIP=$rowSite['earlybirdrate_vip'];
  $EarlyBirdDeadline=$rowSite['earlybirddeadline'];	
  $RegularRateNormal=$rowSite['regularrate_normal'];
  $RegularRateVIP=$rowSite['regularrate_vip'];
  $GroupRateNormal=$rowSite['grouprate_normal'];
  $GroupRateVIP=$rowSite['grouprate_vip'];
  $Studentrate=$rowSite['studentrate'];		
		


	$Amount='0';	
					
	

//Register delegate	
$GLSDar = mysqli_query($conn,"INSERT INTO `delegate` (`fullname`, `mobile`,`email`, `organization`, `paymentrefnum`, `ticketNo`, `datereg`, `amount`, `package`,`checkedin`,`teamedition`, `glsyear`, `ticket_paid`,`cert_paid`,`cert_amount`,`cert_pay_ref`,`cert_pay_date`,`glssite`) VALUES('".$fullname."','".$Mobile."','".$Email."','".$Organization."','".$paymentrefno."','".$ticketno."','".$tarehe."','".$Amount."','".$package."','NO','NO','".$CurrYear."','YES','YES','".$Cert_Amount."','".$paymentrefno."','".$tarehe."','".$GLSSite."')");	
if($GLSDar){
	

	
//Get GLS Site Information	
	
$getSite=mysqli_query($conn,"SELECT i.`sitename` sitename,d.`sitedate` dates,i.`sitevenue` venue,i.eventtype eventtype,i.sitedescription sitedescription FROM `glssiteinfo` i,`glssitedate` d,`glssiterates` r
WHERE i.`sitename`='".$GLSSite."' AND i.`siteID`=d.`siteID` AND d.`siteID`=r.`siteID`");
	
$rowGLSSite=mysqli_fetch_array($getSite);		
	
//Generate QR Code


$qrcode=' <div class="text-center">
    <img src="https://chart.googleapis.com/chart?cht=qr&chl='.$ticketno.'&chs=160x160&chld=L|0"
         class="qr-code img-thumbnail img-responsive">
  </div>';	
	
if ($GLSSite=='CONFERENCE') { 
	
	$summitcheckingtime="03:00PM";	
	
	$Workshop_Conference="Conference";
	
} elseif ($GLSSite=='WORKSHOP1') {
	
	$summitcheckingtime="01:00PM";	
	
	$Workshop_Conference="Conference";
	
} elseif ($GLSSite=='WORKSHOP2') {
	
	$summitcheckingtime="01:00PM";	
	
	$Workshop_Conference="Conference";
	
} elseif ($GLSSite=='WORKSHOP3') {
	
	$summitcheckingtime="01:00PM";	
	
	$Workshop_Conference="Conference";
	
} elseif ($GLSSite=='WORKSHOP4') {
	
	$summitcheckingtime="01:00PM";	
	
	$Workshop_Conference="Conference";
	
} else {
	
	$summitcheckingtime="08:00AM";
}
	
$result='<div class="alert alert-success">You have successfully registered '.$fullname.' as '.$package.' delegate to attend '.PROJECT_NAME. ' at '.$rowGLSSite['venue'].'. SMS confirmation and email with ticket no: '.$ticketno.' has been sent to '.$Mobile.' and '.$Email.' respectively</div>';
	
//SMStobesent
	
$SMStoPay="Dear ".$fullname.",You are registered to attend ".PROJECT_NAME." at ".$rowGLSSite['venue']." on ".$rowGLSSite['eventtype']." at 02:00PM under the package of ".$package." Your TicketNo is ".$ticketno." .Kindly visit our website ".URL." to print your QR Code for easy check-in . \nFor help call ".MOBILE;

//Start Sending Email	
	

	
$to = $Email;
$subject = "Your summit ticket for ".PROJECT_NAME;
	
$emailbody='<table  width="80%" height="20%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  <tr>
    
    <th width="68%" align="center" valign="middle"><font color="#333333">
    <h1>'.PROJECT_NAME.'<BR> ('.$rowGLSSite['sitedescription'].')</h1></font></strong></th> 
    
  </tr>
</table>
<table width="80%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  <tr> 
      <td height="3" colspan="4" valign="top"><div align="center"> 
          <p><strong><font color="#333333">Ticket No:'.$ticketno.'</font></strong></p>
        </div></td>
    </tr>
    <tr align="center"> 
      <td height="1" colspan="4" valign="top">'.$qrcode.'</td>
    </tr>
    <tr align="center"> 
      <td height="1" align="left" valign="top"><font color="#333333">Name:  </font></td>
      <td width="303" height="1" align="left" valign="top"><font color="#333333">'.$fullname.'</font></td>
      <td height="1" align="left" valign="top"><font color="#333333">Paid: </font></td>
      <td height="1" align="left" valign="top"><font color="#333333">YES</font></td>
    </tr>
    <tr> 
      <td height="10" valign="top"><font color="#333333">Mobile Number:</font></td>
      <td height="10" valign="top"><font color="#333333">'.$Mobile.'</font></td>
      <td height="10" valign="top"><font color="#333333">Email:</font></td>
      <td height="10" valign="top"><font color="#333333">'.$Email.'</font></td>
    </tr>
    <tr> 
      <td width="128" height="25" valign="top"><font color="#333333"> 
        <label for="firstName">Amount:<br/>
        </label>
      </font></td>
      <td valign="top"><font color="#333333"> 
        <label for="secondName">'.CURRENCY.number_format($Amount,2).'<br/>
        </label>
      </font></td>
      <td width="128" valign="top"><font color="#333333"> 
        <label for="label">Package:<br/>
        </label>
      </font></td>
      <td width="339" valign="top"><font color="#333333">'.$package.'</font></td>
    </tr>
    <tr> 
      <td height="25" valign="top"><font color="#333333"> 
        <label for="genderF"></label>
        <label for="Surname2">Venue:<br/>
        </label>
      </font></td>
      <td valign="top"><font color="#333333"> 
        <label for="Surname2"></label>
        <label for="element_2">'.$rowGLSSite['venue'].'</label>
      </font>
        <div><font color="#333333">
          <label for="Surname2"><br/>
          </label>
        </font> </div>        <div></div></td>
      <td valign="top"><font color="#333333"> 
        <label for="Surname2"></label>
        <label for="element_2">Date:</label></font><font color="#333333"><label for="Surname2"><br/>
        </label>
      </font> <div></div></td>
      <td height="25" valign="top"><font color="#333333">
        <label for="mobileF2">'.$rowGLSSite['eventtype'].'<br>
          Start: 08:00AM to 05:00PM
          <br/>
        </label>
      <br/>
        </font> <div></div></td>
    </tr>
    <tr>
      <td height="42" colspan="4" valign="top"><font color="#333333">
        <label for="emailF2">Summit check in will start at '.$summitcheckingtime.'. Kindly come with this ticket in either hard copy or soft copy </label>
for   check in.<br>
 For enquiry and general help, call us on '.MOBILE.'</font></td>
    </tr>
  </table>
';	

	
// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: '.EMAIL_SENDER. "\r\n";	

	
mail($to,$subject,$emailbody,$headers);
	
	
//End of Send Email	
	
	
	
	
	
}else{
  $result='<div class="alert alert-danger">Sorry, you are NOT Registered!</div>';
}
		
		} else {
		
		$result='<div class="alert alert-danger">ERROR! This mobile number is in use, kindly use different number to register!</div>';
	}
		

	
	
}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
    <title><?php echo PROJECT_NAME;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/pikaday.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
  </head>
  <body>
   	
  <h4 align="center">Registration for <?php echo PROJECT_NAME;?> | Volunteers, Complimentary,Sponsored, Delegates,Exhibitor and Officials</h4>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				
				<form class="form-horizontal" role="form" method="post" action="delegate_registration_no_pay.php?Id=<?php echo $Id;?>">
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
                   
                    <div class="form-group">
                      <label for="facilityname" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
							<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Write your full name" value="<?php echo htmlspecialchars($_POST['fullname']); ?>">
							<?php echo "<p class='text-danger'>$errfullname</p>";?>
						</div>
					</div>
					<div class="form-group">
					  <label for="commonname2" class="col-sm-2 control-label">Mobile</label>
					  <div class="col-sm-10">
							<input type="text" class="form-control" id="Mobile" name="Mobile" placeholder="Mobile Number" value="<?php echo htmlspecialchars($_POST['Mobile']); ?>">
							<?php echo "<p class='text-danger'>$errMobile</p>";?>
						</div>
					</div>
					
					
						<div class="form-group">
					  <label for="commonname2" class="col-sm-2 control-label">Email</label>
					  <div class="col-sm-10">
							<input type="text" class="form-control" id="Email" name="Email" placeholder="Email Address" value="<?php echo htmlspecialchars($_POST['Email']); ?>">
							<?php echo "<p class='text-danger'>$errValidEmail</p>";?>
						</div>
					</div>
					
					
					<div class="form-group">
					  <label for="commonname2" class="col-sm-2 control-label">Organization</label>
					  <div class="col-sm-10">
							<input type="text" class="form-control" id="Organization" name="Organization" placeholder="Enter Organization or Company" value="<?php echo htmlspecialchars($_POST['Organization']); ?>">
							<?php echo "<p class='text-danger'>$errOrganization</p>";?>
						</div>
					</div>
					
				<div class="form-group">
		<label for="Region" class="col-sm-2 control-label">Package</label>
		<div class="col-sm-10">
		 
		
		
		  
		  <?php $getPackage=mysqli_query($conn,"SELECT `package_name` FROM  `packageinfo` WHERE `paid_nocash`='NO'"); ?>
		
		  <select name="package" id="package" class="form-control">
		  <option disabled="disabled" selected="selected">Select Package</option>
		 <?php while ($rowPackage=mysqli_fetch_array($getPackage)) { ?>
		   <option value="<?php echo $rowPackage['package_name'];?>"><?php echo $rowPackage['package_name'];?></option>
          <?php } ?>
		  </select>
        
		  
		  <?php echo "<p class='text-danger'>$errpackage</p>";?>
		</div>
		</div>
		
	
	    <div class="form-group">
		<label for="GLSSite" class="col-sm-2 control-label">Site</label>
		<div class="col-sm-10">
		 
		
		
		 
		   
      <?php $FetchGLSSite=mysqli_query($conn,"SELECT i.`sitename` sitename,i.sitedescription sitedescription,i.sitevenue venue,i.sitetarget seats  FROM `glssiteinfo` i,`glssitedate` d,`glssiterates` r
	  WHERE  i.`siteID`=d.`siteID` AND d.`siteID`=r.`siteID`"); ?>
		
		 <select name="GLSSite" id="GLSSite" class="form-control">
		  <option disabled="disabled" selected="selected">-Select Site-</option>
		 <?php while ($rowFetchGLSSite=mysqli_fetch_array($FetchGLSSite)) { ?>
		   <option value="<?php echo $rowFetchGLSSite['sitename'];?>" title="<?php $getRegisteredDelegates=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite`='".$rowFetchGLSSite['sitename']."' AND `ticket_paid`='YES' "); 
	   $registered=mysqli_num_rows($getRegisteredDelegates); $remaining=$rowFetchGLSSite['seats']-$registered; echo "Total Seats: ".$rowFetchGLSSite['seats'].",Registered: ".$registered.",Remaining: ".$remaining ;?>"><?php echo $rowFetchGLSSite['sitedescription']."-".$rowFetchGLSSite['venue'];?></option>
          <?php }?>
		  </select>
		  <?php echo "<p class='text-danger'>$errGLSSite</p>";?>
		</div>
		</div>
		
		
		<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2" align="center">
							<input id="submit" name="submit" type="submit" value="Register" class="btn btn-primary">
						</div>
					</div>
		
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
     <script src="js/moment/moment.min.js"></script>
    <script src="js/pikaday.js"></script>
       <script type="text/javascript">
$(document).ready(function($) {
  var list_target_id = 'council'; //first select list ID
  var list_select_id = 'region'; //second select list ID
  var initial_target_html = '<option value="">Please select a Region</option>'; //Initial prompt for target select
 
  $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
 
  $('#'+list_select_id).change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();
 
    //Display 'loading' status in the target select list
    $('#'+list_target_id).html('<option value="">Loading...</option>');
 
    if (selectvalue == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({url: 'getselect.php?svalue='+selectvalue,
             success: function(output) {
                //alert(output);
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });
   var list_target_id2 = 'ward'; //first select list ID
  var list_select_id2 = 'council'; //second select list ID
  var initial_target_html = '<option value="">Please select a Council</option>'; //Initial prompt for target select
 
  $('#'+list_target_id2).html(initial_target_html); //Give the target select the prompt option
 
  $('#'+list_select_id2).change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue2 = $(this).val();
 
    //Display 'loading' status in the target select list
    $('#'+list_target_id2).html('<option value="">Loading...</option>');
 
    if (selectvalue2 == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id2).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({url: 'getward.php?svalue2='+selectvalue2,
             success: function(output) {
                //alert(output);
                $('#'+list_target_id2).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });
  var list_target_id3 = 'facility'; //first select list ID
  var list_select_id3 = 'ward'; //second select list ID
  var initial_target_html = '<option value="">Please Select a Ward</option>'; //Initial prompt for target select
 
  $('#'+list_target_id3).html(initial_target_html); //Give the target select the prompt option
 
  $('#'+list_select_id3).change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue3 = $(this).val();
 
    //Display 'loading' status in the target select list
    $('#'+list_target_id3).html('<option value="">Loading...</option>');
 
    if (selectvalue3 == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id3).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({url: 'getFacility.php?svalue3='+selectvalue3,
             success: function(output) {
                //alert(output);
                $('#'+list_target_id3).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });
});
</script>
<script>
    var picker = new Pikaday({ field: document.getElementById('dob'),
    firstDay: 1,
        minDate: new Date(1900, 1, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [1900,2020]
        });
</script>
  </body>
</html>
<?php //Send SMS	

	if ($GLSDar) {
		
 require_once('SendSMS.php');
	
	} 
	

	?>
<?php error_reporting(0);
include("../globalsettings.php"); 
date_default_timezone_set(TIME_ZONE);
session_start();
include ("../auth.php");
include("../connect.php");


$CurrYear=date('Y');
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
//$ticketno =substr($GLSSite,0,3).rand(1,1000).date('h').date('i').date('s').substr($package, 0, 1);

$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$paymentrefno = substr(str_shuffle($letters),0,4);

	
$tarehe=date('Y-m-d');



	$getData=mysql_query("SELECT * FROM `delegate`  WHERE `mobile`='".$Mobile."' AND `glsyear`='2018' AND `glssite`='".$GLSSite."' ");
	  $hesabu=mysql_num_rows($getData);
	  
	if ($hesabu=='0'){
	
	if ($package=='NORMAL') {
		
		$Amount='1000';
	} 
	
	if ($package=='VIP') {
		
		$Amount='1000';
	} 
		
	
		

//Register delegate	
$GLSDar = mysql_query("INSERT INTO `delegate` (`fullname`, `mobile`,`email`, `organization`, `paymentrefnum`, `datereg`, `amount`, `package`,`checkedin`,`teamedition`, `glsyear`, `ticket_paid`, `glssite`) VALUES('".$fullname."','".$Mobile."','".$Email."','".$Organization."','".$paymentrefno."','".$tarehe."','".$Amount."','".$package."','NO','NO','2018','NO','".$GLSSite."')");	
if($GLSDar){
	
	
	
//$result='<div class="alert alert-danger">Redirected to PesaPal!</div>';
	
	
	
header("location: pesapal-iframe_processing.php?FirstName=".$FirstName."&LastName=".$LastName."&Mobile=".$Mobile."&Email=".$Email."&Package=".$package."&Amount=".$Amount."&GLSSite=".$GLSSite."&Type=".$type."&Reference=".$paymentrefno);	
	
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
    <title>Delegate Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/pikaday.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
  </head>
  <body>
   	<a class="btn btn-primary" href="../index.html">Home</a>
	<a class="btn btn-primary" href="myticketglstz.php">My Ticket</a>
	<a class="btn btn-primary" href="AboutGLS.php">About GLS Zambia</a>
	<img src="images/zambia-flag-button-1.png" style="width:8%">
  <h4 align="center">Register for the Global Leadership Summit-2018 | Individual Registration</h4>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				
				<form class="form-horizontal" role="form" method="post" action="delegate_registration.php">
				
                   
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
		 
		
		 <select name="package" id="package" class="form-control">
		  
		 
		   <option value="Normal" selected="selected">Normal</option>
         <option disabled="disabled" value="VIP">VIP</option>
        
		  </select>
		  <?php echo "<p class='text-danger'>$errpackage</p>";?>
		</div>
		</div>
		
						<div class="form-group">
		<label for="Region" class="col-sm-2 control-label">GLSSite</label>
		<div class="col-sm-10">
		 
		
		 <select name="GLSSite" id="GLSSite" class="form-control">
		  
		  <option disabled="disabled" selected="selected">Select GLS site</option>
		 
		   
         <option value="Lusaka">Lusaka</option>
         <option value="Ndola">Ndola</option>
        
		  </select>
		  <?php echo "<p class='text-danger'>$errGLSSite</p>";?>
		</div>
		</div>
		<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2" align="center">
							<input id="submit" name="submit" type="submit" value="Register" class="btn btn-primary">
						</div>
					</div>
			<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
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
	

	?>
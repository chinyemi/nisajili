<?php 
require_once('header.php');

if (isset($_POST["submit"])) {
		$Season = $_POST['Season'];
		$Site = $_POST['Site'];
		
		// Check if glsyear has been entered
		if (!$_POST['Season']) {
			$errSeason = 'Please select season';
		}
		
		// Check if Site has been entered
		if (!$_POST['Site']) {
			$errSite = 'Please select site';
		}
		
	
		
// If there are no errors, submit form
if (!$errSeason && !$errSite) {
	
//$result="delegate_reports.php?Id=".$Id."&Year=".$Season."&ReportID=".$Site."_".$Season;	
header("location: actualrevenue_reports.php?Id=".$Id."&Year=".$Season."&ReportID=".$Site."_".$Season);
//exit();
	
	
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
    <title>Generate <?php echo PROJECT_NAME;?> Certifcates</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/pikaday.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="bg.css">
    <script>
		function ClearFields() {
     document.getElementById("fullname").value = "";
     document.getElementById("Mobile").value = "";
}
	</script>	
    
  </head>
  <body>
  	
  <h3 align="center">Generate Actual Revenue Reports</h3>

  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				
				<form class="form-horizontal" role="form" method="post" action="actualrevenue_proc.php?Id=<?php echo $Id;?>">
				
                   <div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result;?>	
						</div>
						
					</div>
                   

					
			<div class="form-group">
		<label for="Season" class="col-sm-2 control-label">Season</label>
		<div class="col-sm-10">
		 <?php $getseason=mysqli_query($conn,"SELECT * FROM `siteseason` ORDER BY `Year`"); ?>
		
		 <select name="Season" id="Season" class="form-control">
		  <option disabled="disabled" selected="selected">Year</option>
		 <?php while ($rowseason=mysqli_fetch_array($getseason)) { ?>
		   <option value="<?php echo $rowseason['Year'];?>"><?php echo $rowseason['Year'];?></option>
          <?php }?>
		  </select>
		</div>
		
	 </div>
					
       
                    
      <div class="form-group">
						<label for="Site" class="col-sm-2 control-label">Site</label>
						<div class="col-sm-10">
                 <select name="Site" id="Site" class="form-control">
                     
                 </select>
						</div>
					</div>
					
            			
		<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2" align="center">
							<input id="submit" name="submit" type="submit" value="Generate" class="btn btn-primary">
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
  var list_target_id = 'Site'; //first select list ID
  var list_select_id = 'Season'; //second select list ID
  var initial_target_html = '<option value="">Please select site</option>'; //Initial prompt for target select
 
  $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
 
  $('#'+list_select_id).change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();
 
    //Display 'loading' status in the target select list
    $('#'+list_target_id).html('<option value="">Please Wait...</option>');
 
    if (selectvalue == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({url: 'getselectSeason.php?Id=<?php echo $Id?>&svalue='+selectvalue,
             success: function(output) {
                //alert(output);
                $('#'+list_target_id).html(output);
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
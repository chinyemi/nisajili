<?php 

require_once('header.php');


include 'sysfunctions.php';

?>

<?php

	if (isset($_POST["submit"])) {
		
		CreateDBVeiwsBudgetRevenue($_POST['Season']);
	
$result='<div class="alert alert-success">Dashboard tabular site reports for Budget Revenue generated!</div>';
	
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
   	
  <h4 align="center">Generate Dashboard Tabular Reports For Budget Revenue</h4>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				
				<form class="form-horizontal" role="form" method="post" action="generatebudgetrevenue_proc.php?Id=<?php echo $Id;?>">
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
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
						<div class="col-sm-10 col-sm-offset-2" align="center">
							<input id="submit" name="submit" type="submit" value="Generate  Site Budget Revenue Reports" class="btn btn-primary">
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
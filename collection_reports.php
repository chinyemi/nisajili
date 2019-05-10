<?php 

require_once('header.php');

?>
<?php 

$CurrYear=$_GET['Year'];
$Mwaka=date('Y');
$ReportID=$_GET['ReportID'];







//Get site information


$getSiteInfo=mysqli_query($conn,"SELECT * FROM `glssiteinfo` WHERE `sitename` = '".substr($ReportID, 0, -5)."'");



$rowSiteInfo=mysqli_fetch_array($getSiteInfo);



if ($CurrYear==$Mwaka) {
	
$Event = "Site Colection for ".PROJECT_NAME."(".$rowSiteInfo['sitename'].") at ".$rowSiteInfo['sitevenue']." on ".$rowSiteInfo['eventtype'];
	
	
} else {
	
$Event = "Site Colection for ".PROJECT_NAME."(".$rowSiteInfo['sitename'].") at ".$rowSiteInfo['sitevenue']." on previous year";
	
	
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
$('#example').dataTable( {
 "aProcessing": true,
 "aServerSide": true,
"ajax": "collection_reports_proc.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>&ReportID=<?php echo $ReportID; ?>",
} );
} );

</script>
</head>

<body class="dt-example">

<h3><?php echo $Event;?></h3>
<table id="example" class="display" cellspacing="0" width="100%">
<thead>
<tr>

<th>delegateID</th>
<th>fullname</th>
<th>amount</th>
<th>ticket_paid</th>
<th>payment_mode</th>
<th>payment_ref_no</th>
<th>payment_status</th>
<th>payment_method</th>
<th>payment_date</th>
<th>pesapal_tranx_track_id</th>

</tr>
</thead>
</table>
<br><br>

<table id="example" class="display" cellspacing="0" width="100%">


<th><form action="export_excel.php?ReportID=<?php echo $ReportID; ?>" method="POST">

<input type="submit" name="export_excel" class="btn btn-success" value="Export all raw <?php echo substr($ReportID, 0, -5);?> data to Excel" <?php if ($_SESSION['UserLevel']!='Administrator') { ?>disabled<?php } ?> title="Only Users with Administrator role can export raw data to Excel">
</form></th>
<th><form action="export_excel_uploaded.php?ReportID=<?php echo $ReportID; ?>" method="POST">

<input type="submit" name="export_excel" class="btn btn-success" value="Export all <?php echo substr($ReportID, 0, -5);?> bulk tickets data to Excel" <?php if ($_SESSION['UserLevel']!='Administrator') { ?>disabled<?php } ?> title="Only Users with Administrator role can export uploaded data to Excel">
</form></th>
</tr>
</table>

</body>
</html>
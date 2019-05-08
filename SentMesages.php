<?php 

require_once('header.php');


?>
<html>
	<head>
		<title>Create Cards</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">Sent Messages</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>SMS ID</th>
							<th>BATCH NO</th>
							<th>SENT MESAGE</th>
						<th>MESAGE TYPE</th>
						<th>RECEIVERS</th>		
            			
            			
                         	</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="dateModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="date_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Send SMS</h4>
				</div>
				<div class="modal-body">
				
		
		  	<label>Send SMS</label>
					 <textarea readonly name="composesms" id="composesms" class="form-control" /></textarea>
					<br />
				 	<label>Select Receiver Groups</label>
				 	<div class="modal-body">
					<?php $getGroups=mysqli_query($conn,"SELECT * from member_groups"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		  <label>	
<input type="checkbox"  value="<?php echo $rowGroups['group_id']?>"  name="groupid" id="groupid">
		<?php echo $rowGroups['group_name']?></label><br>
		 <?php
		 }
		 ?>
		 
				</div>
				<div class="modal-footer">
					<input type="hidden" name="sms_id" id="sms_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#date_form')[0].reset();
		$('.modal-title').text("Compose SMS");
		$('#action').val("Add");
		$('#operation').val("Add");
	
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchsmsbatches.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>&userid=<?php echo $userid?>",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});
	

	

	
	
});
</script>
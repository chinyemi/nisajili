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
			<h1 align="center">SMS Balance</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#dateModal" class="btn btn-info btn-lg">Racharge SMS</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>DATE</th>
							<th>MESSAGE TYPE</th>
					    	<th>TRANSACTION ID</th>
						    <th>NUMBER OF MESSAGES</th>
            				<th>AMOUNT</th>
            					<th>RECHARGE</th>
            	
            			
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
					<h4 class="modal-title">SMS Balance</h4>
				</div>
				<div class="modal-body">
				
		
		  	<label>Number of Messages</label>
		  	
				<input type="text" name="smsno" id="smsno" class="form-control" />
				
				 
				 
				 	    	<label>Select Message Type</label>	<br />
				 	    <select name="typeid" id="typeid" class="form-control">
				 	        <option></option>
					<?php $getGroups=mysqli_query($conn,"SELECT * from  sms_rate"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['rate_id']?>"><?php echo $rowGroups['sms_type']."(".$rowGroups['current_balance'].")"?></option>
		 <?php
		 }
		 
		 ?>
		 </select>
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
			url:"fetchsmspurchase.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>&userid=<?php echo $userid?>",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});
	


	$(document).on('submit', '#date_form', function(event){
		event.preventDefault();
	
		var composesms = $('#composesms').val();
	
	   
	
		if(composesms != '')
		{
			$.ajax({
				url:"insertpurchasesms.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#date_form')[0].reset();
					$('#dateModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("SMS Field is required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var sms_id = $(this).attr("sms_id");
		$.ajax({
			url:"fetch_singlesms.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{sms_id:sms_id},
			dataType:"json",
			success:function(data)
			{
	
				$('#dateModal').modal('show');
				$('#composesms').val(data.composesms);
			    $('.modal-title').text("Send SMS");
				$('#sms_id').val(sms_id);
			    $('#action').val("Send");
				$('#operation').val("Send");
			}
		})
	});
	
	
	
	$(document).on('click', '.delete', function(){
		var site_id = $(this).attr("siteID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deletedate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:"POST",
				data:{site_id:site_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>
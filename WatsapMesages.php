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
			<h1 align="center">Send Whatsap Messages</h1>
			
			<div class="table-responsive">
				
				<div align="left">
				
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>SMS</th>
							<th>COMPOSE DATE</th>
							<th>RECIPIENTS</th>
						
								<th>CREATED BY</th>
            				<th>SEND</th>
            			
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
					<h4 class="modal-title">Send Whasap Messages</h4>
				</div>
				<div class="modal-body">
				
		
		  	<label>Send Whasap Messages</label>
					<textarea readonly name="composesms" id="composesms" class="form-control" /></textarea>
					<br />
					
					<?php
					 $result=mysqli_query($conn,"select current_balance from sms_rate where rate_id=2");
					 $row=mysqli_fetch_array($result);
					 $current_balance=$row['current_balance'];
					
					?>
					
		<la bel>SMS Balance</label>
					 <input type="text" readonly name="smsbalance" id="smsbalance" value="<?php echo $current_balance?>" class="form-control" />
					<br />
					
	<label>Select Receiver Groups</label>
				 
		<select name="groupid" id="composesms" class="form-control" >
		    <option>-Select Receiver group--</option>
		<?php $getGroups=mysqli_query($conn,"SELECT * from member_groups where membersno>0  order by group_name"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		  <label>	
<option  value="<?php echo $rowGroups['group_id']?>">
<?php echo $rowGroups['group_name']."(".  $rowGroups['membersno'].")" ?>
	</option>
	<?php
		 }
		 ?>
		 </select>
				<div class="modal-footer">
					<input type="hidden" name="sms_id" id="sms_id" />
						<input type="hidden" name="rateid" id="rateid"value="2" />
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
		$('.modal-title').text("Send Whasap Messages");
		$('#action').val("Add");
		$('#operation').val("Add");
	
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchsmstosend.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>&userid=<?php echo $userid?>",
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
				url:"insertsendsms.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
			    $('.modal-title').text("Send Whasap Messages");
				$('#sms_id').val(sms_id);
			    $('#action').val("Send");
				$('#operation').val("Send");
			}
		})
	});
	
	
	

	
});
</script>
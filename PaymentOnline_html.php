
<?php 

require_once('header.php');


?>
<html>
	<head>
		<title>Data Table CRUD Operations</title>
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
			<h1 align="center">Payment | Option</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Online Payment</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>

   					 
            				 <th>GatewayName</th>
            				 <th>Currency</th>
                             <th>Toggle</th>
                             <th>GatwayMobile</th>
                             <th>GatewayEmail</th>
                             <th>GatwayAddress</th>
                             <th>Description</th>
                             <th>Type</th>
                             <th>GatewayKey</th>
                             <th>GatewaySecret</th>
                           
                           
							<th>Update</th>
							<th>Delete</th>
						
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Online Payment</h4>
				</div>
				<div class="modal-body">
					
					

					<label>GatewayName</label>
					<input type="text" name="GatewayName" id="GatewayName" class="form-control" />
					
					<br />
					
					<label>Currency</label>
					<input type="text" name="Currency" id="Currency" class="form-control" />
					
					<br />
					
					<label>Toggle</label>
				
					<select name="Toggle" id="Toggle" class="form-control" required>
        			<option selected disabled>--Select--</option>
  					<option value="YES">YES</option>
  					<option value="NO">NO</option>
 	               
					</select>
                    <br />      
					
					<label>GatwayMobile</label>
					<input type="text" name="GatwayMobile" id="GatwayMobile" class="form-control" />
					
					<br />
					
					<label>GatewayEmail</label>
					<input type="text" name="GatewayEmail" id="GatewayEmail" class="form-control" />
					
					<br />
					
					<label>GatwayAddress</label>
					<input type="text" name="GatwayAddress" id="GatwayAddress" class="form-control" />
					
					<br />
					
					<label>Description</label>
					<input type="text" name="Description" id="Description" class="form-control" />
					
					<br />
					
					<label>Type</label>
				
					<select name="Type" id="Type" class="form-control" required>
        			
  					<option selected value="Online">Online</option>
  					
 	               
					</select>
                    <br /> 
                    
                    <label>GatewayKey</label>
					<input type="text" name="GatewayKey" id="GatewayKey" class="form-control" />
					
					<br />
					
					<label>GatewaySecret</label>
					<input type="text" name="GatewaySecret" id="GatewaySecret" class="form-control" />
					
					<br />
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="GatewayID" id="GatewayID" />
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
		$('#user_form')[0].reset();
		$('.modal-title').text("Add Online Payment");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchPaymentOnline.php?Id=<?php echo $Id;?>",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});
	

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		
		var GatewayName = $('#GatewayName').val();
		var Currency = $('#Currency').val();
		var Toggle = $('#Toggle').val();
		var GatwayMobile = $('#GatwayMobile').val();
		var GatewayEmail = $('#GatewayEmail').val();
		var GatwayAddress = $('#GatwayAddress').val();
		var Description = $('#Description').val();
		var Type = $('#Type').val();
		var GatewayKey = $('#GatewayKey').val();
		var GatewaySecret = $('#GatewaySecret').val();
		
	
		if(GatewayName != '' && Toggle != '')
		{
			$.ajax({
				url:"insertPaymentOnline.php?Id=<?php echo $Id;?>",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	

	$(document).on('click', '.update', function(){
		var GatewayID = $(this).attr("GatewayID");
		$.ajax({
			url:"fetch_singlePaymentOnline.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{GatewayID:GatewayID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#GatewayName').val(data.GatewayName);
				$('#Currency').val(data.Currency);
				$('#Toggle').val(data.Toggle);
				$('#GatwayMobile').val(data.GatwayMobile);
				$('#GatewayEmail').val(data.GatewayEmail);
				$('#GatwayAddress').val(data.GatwayAddress);
				$('#Description').val(data.Description);
				$('#Type').val(data.Type);
				$('#GatewayKey').val(data.GatewayKey);
				$('#GatewaySecret').val(data.GatewaySecret);
			
				$('.modal-title').text("Edit Option Payment");
				$('#GatewayID').val(GatewayID);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var GatewayID = $(this).attr("GatewayID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deletePaymentOnline.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{GatewayID:GatewayID},
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
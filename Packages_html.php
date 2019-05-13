
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
			<h1 align="center">Manage | Package</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Package</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
            				
            				 <th>package_name</th>
            				 <th>paid_nocash</th>
                             <th>remarks</th>
                             <th>toggle</th>
                           
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
					<h4 class="modal-title">Add Package</h4>
				</div>
				<div class="modal-body">

				
					<label>package_name</label>
					<input type="text" name="package_name" id="package_name" class="form-control" />
					
					<br />
					
					<label>paid_nocash</label>
				
					<select name="paid_nocash" id="paid_nocash" class="form-control" required>
        			<option selected disabled>--Select--</option>
  					<option value="YES">YES</option>
  					<option value="NO">NO</option>
 	               
					</select>
                    <br />      
					
					<label>remarks</label>
					<input type="text" name="remarks" id="remarks" class="form-control" />
					
					<br />
					
					<label>toggle</label>
				
					<select name="toggle" id="toggle" class="form-control" required>
        			<option selected disabled>--Select--</option>
  					<option value="YES">YES</option>
  					<option value="NO">NO</option>
 	               
					</select>
                    <br /> 
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
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
		$('.modal-title').text("Add Package");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchPackages.php?Id=<?php echo $Id;?>",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 2, 3],
				"orderable":false,
			},
		],

	});
	

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		
		var package_name = $('#package_name').val();
		var paid_nocash = $('#paid_nocash').val();
		var remarks = $('#remarks').val();
        var toggle = $('#toggle').val();
		
		
	
		if(package_name != '' && paid_nocash != '')
		{
			$.ajax({
				url:"insertPackages.php?Id=<?php echo $Id;?>",
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
			alert("Fields are Required");
		}
	});
	
	
	
	$(document).on('click', '.update', function(){
		var id = $(this).attr("id");
		$.ajax({
			url:"fetch_singlePackages.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#package_name').val(data.package_name);
				$('#paid_nocash').val(data.paid_nocash);
				$('#remarks').val(data.remarks);
                $('#toggle').val(data.toggle);
				
			
				$('.modal-title').text("Edit Package");
				$('#id').val(id);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deletePackages.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{id:id},
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

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
			<h1 align="center">Manage | Website Element</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Element</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>

   
            			
            				 <th>Content</th>
                             <th>Category</th>
                             <th>Toggle</th>
                             <th>Position</th>
                             
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
					<h4 class="modal-title">Add Expense</h4>
				</div>
				<div class="modal-body">
					<label>Content</label>
					<textarea  name="Content" id="Content" class="form-control" rows="4" cols="50"></textarea>
					<br />	
					
					<label>Category</label>
					<input type="text" name="Category" id="Category" class="form-control" />
					
					<br />	

					<label>Toggle</label>
					
					<select name="Toggle" id="Toggle" class="form-control" required>
        			<option selected disabled>--YES/NO--</option>
        			
  					<option value="YES">YES</option>
  					<option value="NO">NO</option>
					</select>
					<br />
					
				   <label>Position</label>
					
					<select name="Position" id="Position" class="form-control" required>
        			<option selected disabled>--YES/NO--</option>
        			<option value="Bottom">Bottom</option>
  					<option value="N/A">N/A</option>
  					
					</select>
					<br />
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="elementID" id="elementID" />
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
		$('.modal-title').text("Add Expense");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchElement.php?Id=<?php echo $Id;?>",
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
		
		var Content = $('#Content').val();
		var Category = $('#Category').val();
		var Toggle = $('#Toggle').val();
		var Position = $('#Position').val();
	
		if(Content != '' && Category != '')
		{
			$.ajax({
				url:"insertElement.php?Id=<?php echo $Id;?>",
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
		var elementID = $(this).attr("elementID");
		$.ajax({
			url:"fetch_singleElement.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{elementID:elementID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#Content').val(data.Content);
				$('#Category').val(data.Category);
				$('#Toggle').val(data.Toggle);
				$('#Position').val(data.Position);
				
			
				$('.modal-title').text("Edit Expense");
				$('#elementID').val(elementID);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var elementID = $(this).attr("elementID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteElement.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{elementID:elementID},
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
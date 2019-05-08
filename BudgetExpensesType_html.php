
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
			<h1 align="center">Manage | Budget Expenses Type</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Expenses Type</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>

            				 <th>expType</th>
                             <th>ExpCategory</th>
                            
                             <th>Description</th>
                          
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
					<h4 class="modal-title">Add Budget Expense Type</h4>
				</div>
				<div class="modal-body">
						<label>Exp Type</label>
					<input type="text" name="expType" id="expType" class="form-control" />
					
					<br />

					<label>Exp Category</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<select name="ExpCategory" id="ExpCategory" class="form-control" required>
        			<option selected disabled>--Select Exp Category--</option>
  					<option value="Cost of Goods Sold">Cost of Goods Sold</option>
  					<option value="Operating Expenses">Operating Expenses</option>
 	                <option value="Financial Expenses">Financial Expenses</option>
 	                <option value="Extraordinary Expenses">Extraordinary Expenses</option>
 	                <option value="Non-Operating Expenses">Non-Operating Expenses</option>
 	                <option value=">Non-Cash Expense">Non-Cash Expense</option>
 	                <option value="Other Expenses">Other Expenses</option>
					</select>
					<br />
					
					<label>Description</label>
					<textarea  name="Description" id="Description" class="form-control" rows="4" cols="50"></textarea>
					<br />
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="exptypeID" id="exptypeID" />
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
		$('.modal-title').text("Add Budget Expense");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchBudgetExpenseType.php?Id=<?php echo $Id;?>",
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
		
		var expType = $('#expType').val();
		var ExpCategory = $('#ExpCategory').val();
		var Description = $('#Description').val();
		

		if(expType != '' && ExpCategory != '')
		{
			$.ajax({
				url:"insertBudgetExpenseType.php?Id=<?php echo $Id;?>",
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
		var exptypeID = $(this).attr("exptypeID");
		$.ajax({
			url:"fetch_singleBudgetExpenseType.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{exptypeID:exptypeID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#expType').val(data.expType);
				$('#ExpCategory').val(data.ExpCategory);
				$('#Description').val(data.Description);
				
			
				$('.modal-title').text("Edit Expense Type");
				$('#exptypeID').val(exptypeID);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var exptypeID = $(this).attr("exptypeID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteBudgetExpenseType.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{exptypeID:exptypeID},
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
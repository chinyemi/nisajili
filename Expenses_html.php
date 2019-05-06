
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
			<h1 align="center">Manage | Site Expenses</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Expenses</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>

   
							 
            			
            				 <th>Type</th>
                             <th>Amount</th>
                             <th>Date Recorded</th>
                             <th>Description</th>
                             <th>Site</th>
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

					<label>Type</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<?php 
					$getExpensesType=mysqli_query($conn,"SELECT * FROM `ExpenseType`");
		
					?>
					<select name="Type" id="Type" class="form-control" required>
        			<option selected disabled>--Select Type--</option>
        			<?php 	while ($rowExpensesType=mysqli_fetch_array($getExpensesType)) { ?>
  					<option value="<?php echo $rowExpensesType['expType']; ?>"><?php echo $rowExpensesType['expType']."(".$rowExpensesType['ExpCategory'].")"; ?></option>
  					 <?php 	} ?>
					</select>
					<br />
					<label>Amount</label>
					<input type="text" name="Amount" id="Amount" class="form-control" />
					
					<br />
					<label>DateRecorded</label>
					<input type="date" name="DateRecorded" id="DateRecorded" class="form-control" />
					
					<br />
					<label>Description</label>
					<textarea  name="Description" id="Description" class="form-control" rows="4" cols="50"></textarea>
					<br />
					<label>Site</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<?php 
					$getSiteName=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");
		
					?>
					<select name="Site" id="Site" class="form-control" required>
        			<option selected disabled>--Select Site--</option>
        			<?php 	while ($rowSiteName=mysqli_fetch_array($getSiteName)) { ?>
  					<option value="<?php echo $rowSiteName['sitename']; ?>"><?php echo $rowSiteName['sitename']; ?></option>
  					
 	               <?php 	} ?>
					</select>
					<br />
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="expenseID" id="expenseID" />
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
			url:"fetchExpense.php?Id=<?php echo $Id;?>",
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
		
		var Type = $('#Type').val();
		var Amount = $('#Amount').val();
		var DateRecorded = $('#DateRecorded').val();
		var Description = $('#Description').val();
		var Site = $('#Site').val();
		
	
		if(Type != '' && Amount != '')
		{
			$.ajax({
				url:"insertExpense.php?Id=<?php echo $Id;?>",
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
		var expenseID = $(this).attr("expenseID");
		$.ajax({
			url:"fetch_singleExpense.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{expenseID:expenseID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#Type').val(data.Type);
				$('#Amount').val(data.Amount);
				$('#DateRecorded').val(data.DateRecorded);
				$('#Description').val(data.Description);
				$('#Site').val(data.Site);
			
				$('.modal-title').text("Edit Expense");
				$('#expenseID').val(expenseID);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var expenseID = $(this).attr("expenseID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteExpense.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{expenseID:expenseID},
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
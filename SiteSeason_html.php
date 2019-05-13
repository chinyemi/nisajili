
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
			<h1 align="center">Manage | Site Season</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Season</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>

   
							
							 
            				 <th>Year</th>
            				 <th>SeasonStatus</th>
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
					<h4 class="modal-title">Add Season</h4>
				</div>
				<div class="modal-body">


					<label>Year</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<select name="Year" id="Year" class="form-control" required>
        			<option selected disabled>--Select Year--</option>
  					<option value="2018">2018</option>
  					<option value="2019">2019</option>
 	                <option value="2020">2020</option>
 	                <option value="2021">2021</option>
 	                <option value="2022">2022</option>
					</select>
					<br />
					<label>SeasonStatus</label>
					<!--input type="text" name="SeasonStatus" id="SeasonStatus" class="form-control" /-->
					<select name="SeasonStatus" id="SeasonStatus" class="form-control" required>
        			<option selected disabled>--Select Status--</option>
  					<option value="OPEN">OPEN</option>
  					<option value="CLOSED">CLOSED</option>
 	            
					</select>
					<br />
					<label>Description</label>
					<textarea  name="Description" id="Description" class="form-control" rows="4" cols="50"></textarea>
					<br />
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="seasonID" id="seasonID" />
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
		$('.modal-title').text("Add Season");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchSiteSeason.php?Id=<?php echo $Id;?>",
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
		
		var Year = $('#Year').val();
		var SeasonStatus = $('#SeasonStatus').val();
		var Description = $('#Description').val();
		
	
		if(Year != '' && SeasonStatus != '')
		{
			$.ajax({
				url:"insertSiteSeason.php?Id=<?php echo $Id;?>",
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
		var seasonID = $(this).attr("seasonID");
		$.ajax({
			url:"fetch_singleSiteSeason.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{seasonID:seasonID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#Year').val(data.Year);
				$('#SeasonStatus').val(data.SeasonStatus);
				$('#Description').val(data.Description);
			
				$('.modal-title').text("Edit Seaon");
				$('#seasonID').val(seasonID);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var seasonID = $(this).attr("seasonID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteSiteSeason.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{seasonID:seasonID},
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
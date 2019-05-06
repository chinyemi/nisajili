
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
			<h1 align="center">Manage | Testimonies</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Testimony</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Image</th>
							 <th>testimony</th>
            				 <th>fullname</th>
            				 <th>designation</th>
                             <th>city</th>
                             <th>country</th>
                             <th>feedback</th>
                           
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
					<h4 class="modal-title">Add Testimony</h4>
				</div>
				<div class="modal-body">

					<label>testimony</label>
					<!--input type="text" name="testimony" id="testimony" class="form-control" /-->
					
					<textarea  name="testimony" id="testimony" class="form-control" rows="4" cols="50"></textarea>

					
					
					<br />
					<label>fullname</label>
					<input type="text" name="fullname" id="fullname" class="form-control" />
					<br />
					<label>designation</label>
					<input type="text" name="designation" id="designation" class="form-control" />
					<br />
					<label>city</label>
					<input type="text" name="city" id="city" class="form-control" />
					<br />
					<label>country</label>
					<input type="text" name="country" id="country" class="form-control" />
					<br />
				    <label>feedback</label>
					<!--input type="text" name="feedback" id="feedback" class="form-control" /-->
					<select name="feedback" id="feedback" class="form-control" required>
        			<option selected disabled>--YES/NO--</option>
  					<option value="YES">YES</option>
  					<option value="NO">NO</option>
 	                
					</select>
					<br />
					
					<label>Select User Image</label>
					<input type="file" name="picture" id="picture" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="testimonyID" id="testimonyID" />
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
		$('.modal-title').text("Add Testimony");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchTestimonies.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		var testimony = $('#testimony').val();
		var fullname = $('#fullname').val();
		var designation = $('#designation').val();
		var city = $('#city').val();
		var country = $('#country').val();
	    var feedback = $('#feedback').val();
	
		var extension = $('#picture').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#picture').val('');
				return false;
			}
		}	
		

		
		if(testimony != '' && fullname != '')
		{
			$.ajax({
				url:"insertTestimonies.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		var testimonyID = $(this).attr("testimonyID");
		$.ajax({
			url:"fetch_singleTestimonies.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{testimonyID:testimonyID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#testimony').val(data.testimony);
				$('#fullname').val(data.fullname);
				$('#designation').val(data.designation);
				$('#city').val(data.city);
				$('#country').val(data.country);
				$('#feedback').val(data.feedback);
				$('.modal-title').text("Edit Testimony");
				$('#testimonyID').val(testimonyID);
				$('#user_uploaded_image').html(data.picture);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var testimonyID = $(this).attr("testimonyID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteTestimonies.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:"POST",
				data:{testimonyID:testimonyID},
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
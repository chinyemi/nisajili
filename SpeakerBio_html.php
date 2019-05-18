
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
			<h1 align="center">Manage | Speaker Bio</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Speaker Bio</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>

							<th>Image</th>
							 
            				 <th>fullname</th>
            				 <th>designation</th>
                             <th>organization</th>
                             <th>biography</th>
                             <th>facebook</th>
                             <th>twitter</th>
                             <th>instagram</th>
                             <th>profile_row</th>
                             <th>roworder</th>
                           
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
					<h4 class="modal-title">Add Spekaer</h4>
				</div>
				<div class="modal-body">

					
					<label>fullname</label>
					<input type="text" name="fullname" id="fullname" class="form-control" />
					<br />
					<label>designation</label>
					<input type="text" name="designation" id="designation" class="form-control" />
					<br />
					<label>organization</label>
					<input type="text" name="organization" id="organization" class="form-control" />
					<br />
					<label>biography</label>
				
					<textarea  name="biography" id="biography" class="form-control" rows="4" cols="50"></textarea>

					<br />
					
					<label>facebook</label>
					<input type="text" name="facebook" id="facebook" class="form-control" />
					<br />
					<label>twitter</label>
					<input type="text" name="twitter" id="twitter" class="form-control" />
					<br />
					<label>instagram</label>
					<input type="text" name="instagram" id="instagram" class="form-control" />
					<br />
					<label>profile_row</label>
					<!--input type="text" name="profile_row" id="profile_row" class="form-control" /-->
					<select name="profile_row" id="profile_row" class="form-control" required>
        			<option selected disabled>--Select Row--</option>
  					<option value="1">1</option>
  					<option value="2">2</option>
 	                <option value="3">3</option>
 	                <option value="4">4</option>
 	                <option value="5">5</option>
					</select>
					<br />
					<label>roworder</label>
					<!--input type="text" name="roworder" id="roworder" class="form-control" /-->
					<select name="roworder" id="roworder" class="form-control"  required>
        			<option selected disabled>--Select Row Order--</option>
  					<option value="1">1</option>
  					<option value="2">2</option>
 	                <option value="3">3</option>
 	                <option value="4">4</option>
 	                <option value="5">5</option>
 	                <option value="6">6</option>
 	                <option value="7">7</option>
 	                <option value="8">8</option>
 	                <option value="9">9</option>
 	                <option value="10">10</option>
 	                <option value="11">11</option>
 	                <option value="12">12</option>
 	                <option value="13">13</option>
 	                <option value="14">14</option>
 	                <option value="15">15</option>
 	                <option value="16">16</option>
					</select>
					<br />
					
					<label>Select User Image</label>
					<input type="file" name="picture1" id="picture1" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="InfoID" id="InfoID" />
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
		$('.modal-title').text("Add Speaker");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchSpeakerBio.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		
		var fullname = $('#fullname').val();
		var designation = $('#designation').val();
		var organization = $('#organization').val();
		var biography = $('#biography').val();
		var facebook = $('#facebook').val();
		var twitter = $('#twitter').val();
		var instagram = $('#instagram').val();
		var profile_row = $('#profile_row').val();
		var roworder = $('#roworder').val();
		
		
		var extension = $('#picture1').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#picture1').val('');
				return false;
			}
		}	
		
		
		if(fullname != '' && profile_row != '')
		{
			$.ajax({
				url:"insertSpeakerBio.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		var InfoID = $(this).attr("InfoID");
		$.ajax({
			url:"fetch_singleSpeakerBio.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{InfoID:InfoID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#fullname').val(data.fullname);
				$('#designation').val(data.designation);
				$('#organization').val(data.organization);
				$('#biography').val(data.biography);
				$('#facebook').val(data.facebook);
				$('#twitter').val(data.twitter);
				$('#instagram').val(data.instagram);
				$('#profile_row').val(data.profile_row);
				$('#roworder').val(data.roworder);
				$('.modal-title').text("Edit Speaker");
				$('#InfoID').val(InfoID);
				$('#user_uploaded_image').html(data.picture1);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var InfoID = $(this).attr("InfoID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteSpeakerBio.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:"POST",
				data:{InfoID:InfoID},
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
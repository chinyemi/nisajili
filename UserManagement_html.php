
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
			<h1 align="center">Manage | Users</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add User</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Image</th>
            				 <th>UserName</th>
            				 <th>Password</th>
                             <th>Fullname</th>
                             <th>Gender</th>
                             <th>Email</th>
                             <th>MobileNo</th>
                             <th>Designation</th>
                             <th>Userlevel</th>
                             <th>dateregistered</th>
                            <th>Suspended</th>
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
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">


					<label>UserName</label>
					<input type="text" name="UserName" id="UserName" class="form-control" />
					<br />
					<label>Password</label>
					<input type="password" name="Password" id="Password" class="form-control" title="Kindly update password every time you update anything on user information"/>
					<br />
					<label>Fullname</label>
					<input type="text" name="Fullname" id="Fullname" class="form-control" />
					<br />
					<label>Gender</label>
				
					<select name="Gender" id="Gender" class="form-control" required>
        			<option selected disabled>--Select Gender--</option>
  					<option value="Male">Male</option>
  					<option value="Female">Female</option>
 	               
					</select>
					<br />
					
					<label>Email</label>
					<input type="text" name="Email" id="Email" class="form-control" />
					<br />
					<label>MobileNo</label>
					<input type="text" name="MobileNo" id="MobileNo" class="form-control" />
					<br />
					<label>Designation</label>
					<select name="Designation" id="Designation" class="form-control" required>
       			    <?php 
						
					$getDesignation=mysqli_query($conn,"SELECT * FROM Designations");	
						
						?>
        			<option selected disabled>--Select Designation--</option>
        			<?php   
						while ($rowDesignation=mysqli_fetch_array($getDesignation)) {
						?>
  					<option value="<?php echo $rowDesignation['DesignationName'];?>" title="<?php echo $rowDesignation['Description'];?>"><?php echo $rowDesignation['DesignationName'];?></option>
  					<?php 
						}
						?>
					</select>
					<br />
					<label>Userlevel</label>
					<!--input type="text" name="profile_row" id="profile_row" class="form-control" /-->
					<select name="Userlevel" id="Userlevel" class="form-control" required>
        			   <?php 
						
					$getDesignation=mysqli_query($conn,"SELECT * FROM userroles");	
						
						?>
        			<option selected disabled>--Select Role Name--</option>
        			<?php   
						while ($rowUserlevel=mysqli_fetch_array($getDesignation)) {
						?>
  					<option value="<?php echo $rowUserlevel['RoleName'];?>" title="<?php echo $rowUserlevel['Description'];?>"><?php echo $rowUserlevel['RoleName'];?></option>
  					<?php 
						}
						?>
					</select>
					<br />
		

					<label>Date</label>
					<input type="date" name="dateregistered" id="dateregistered" class="form-control" />
				
					<br />
					<label>Suspended</label>
				
					<select name="UserAccountSuspended" id="UserAccountSuspended" class="form-control" required>
        			<option selected disabled>--YES/NO--</option>
  					<option value="YES">YES</option>
  					<option value="NO">NO</option>
 	               
					</select>
					<br />
					
					<label>Select User Image</label>
					<input type="file" name="Image" id="Image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="UserID" id="UserID" />
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
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchUserManagement.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		
		var UserName = $('#UserName').val();
		var Password = $('#Password').val();
		var Fullname = $('#Fullname').val();
		var Gender = $('#Gender').val();
		var Email = $('#Email').val();
		var MobileNo = $('#MobileNo').val();
		var Designation = $('#Designation').val();
		var Userlevel = $('#Userlevel').val();
		var dateregistered = $('#dateregistered').val();
		var UserAccountSuspended = $('#UserAccountSuspended').val();
		
		var extension = $('#Image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#Image').val('');
				return false;
			}
		}	
		
		if(UserName != '' && Password != '')
		{
			$.ajax({
				url:"insertUserManagement.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
			alert("Fields Required");
		}
	});
	

	$(document).on('click', '.update', function(){
		var UserID = $(this).attr("UserID");
		$.ajax({
			url:"fetch_singleUserManagement.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{UserID:UserID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#UserName').val(data.UserName);
				$('#Password').val(data.Password);
				$('#Fullname').val(data.Fullname);
				$('#Gender').val(data.Gender);
				$('#Email').val(data.Email);
				$('#MobileNo').val(data.MobileNo);
				$('#Designation').val(data.Designation);
				$('#Userlevel').val(data.Userlevel);
				$('#dateregistered').val(data.dateregistered);
				$('#UserAccountSuspended').val(data.UserAccountSuspended);
				$('.modal-title').text("Edit User");
				$('#UserID').val(UserID);
				$('#user_uploaded_image').html(data.Image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var UserID = $(this).attr("UserID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteUserManagement.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:"POST",
				data:{UserID:UserID},
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
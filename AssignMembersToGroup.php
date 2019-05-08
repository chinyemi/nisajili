<?php 

require_once('header.php');


?>
<html>
	<head>
		<title>Assign Member To Group</title>
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
			<h1 align="center">Assign Member To Group</h1>
			
			<div class="table-responsive">
				
					<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#dateModal" class="btn btn-info btn-lg">Group Member Assign</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>MEMBER ID</th>
							<th>NAME NAME</th>
							<th>MEMBER MOBILE</th>
								<th>MEMBER EMAIL</th>
								<th>ACTION</th>
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
					<h4 class="modal-title">New Group</h4>
				</div>
				<div class="modal-body">
				
		
			<label>BY GENDER</label>	<br />
				 	    <select name="gender" id="gender" class="form-control">
					
<option  value=""></option> 	
<option  value="Male">Male</option>
<option  value="Female">Female</option>
		 </select></br></br>
		 
	
		<label>BY PACKAGE</label>	<br />	 

				 	    <select name="package" id="package" class="form-control">
					<?php $getGroups=mysqli_query($conn,"SELECT distinct(package) from  delegate order by package"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['package']?>"><?php echo $rowGroups['package']?></option>
		 <?php
		 }
		 
		 ?>
		</select></br><br>
		
		
		
			<label>CHECKED IN</label>	<br />
		<select name="checkedin" id="checkedin" class="form-control">
					<?php $getGroups=mysqli_query($conn,"SELECT distinct( 	checkedin) from  delegate order by  checkedin"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['checkedin']?>"><?php echo $rowGroups['checkedin']?></option>
		 <?php
		 }
		 
		 ?>
		</select></br><br>
		
		
					<label>TICKET PAID</label>	<br />
		<select name="ticketpaid" id="ticketpaid" class="form-control">
		   
					<?php $getGroups=mysqli_query($conn,"SELECT distinct( 	ticket_paid ) from  delegate order by  ticket_paid "); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['ticket_paid']?>"><?php echo $rowGroups['ticket_paid']?></option>
		 <?php
		 }
		 
		 ?>
		</select></br><br>
		
		
		
		
					<label>CERTIFICATE PAID</label>	<br />
		<select name="certpaid" id="certpaid" class="form-control">
		     <option  value=""></option>
					<?php $getGroups=mysqli_query($conn,"SELECT distinct( 	cert_paid ) from  delegate order by  cert_paid "); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['cert_paid']?>"><?php echo $rowGroups['cert_paid']?></option>
		 <?php
		 }
		 
		 ?>
		</select></br><br>
		
	    	<label>SELECT GROUP TO ASSIGN</label>	<br />
				 	    <select name="groupid" id="groupid" class="form-control">
				 	          <option  value=""></option>
					<?php $getGroups=mysqli_query($conn,"SELECT * from  member_groups"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['group_id']?>"><?php echo $rowGroups['group_name']."(".$rowGroups['membersno'].")"?></option>
		 <?php
		 }
		 
		 ?>
		  </select>
				</div>
			
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
			<input type="hidden" name="typeid" id="typeid"  value="2"/>
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
		$('.modal-title').text("New Group");
		$('#action').val("Add");
		$('#operation').val("Add");
	
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchmember.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>&userid=<?php echo $userid?>",
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
	
		var groupname = $('#groupname').val();
	
	   
	
		if(groupname != '')
		{
			$.ajax({
				url:"insertusergroup.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
			alert("Group name is required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("user_id");
		$.ajax({
			url:"fetch_singlemember.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
	
				$('#dateModal').modal('show');
				$('#membername').val(data.membername);
			    $('.modal-title').text("Group Assign");
				$('#user_id').val(user_id);
			    $('#action').val("Add");
				$('#operation').val("Add");
			}
		})
	});
	
	
	
	$(document).on('click', '.delete', function(){
		var site_id = $(this).attr("siteID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deletedate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:"POST",
				data:{site_id:site_id},
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
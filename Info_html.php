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
			<h1 align="center">Site Info</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#infoModal" class="btn btn-info btn-lg">Add Info</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>sitename</th>
							 <th>sitedescription</th>
            				 <th>eventtype</th>
            				 <th>sitevenue</th>
                             <th>sitemobile</th>
                             <th>siteaddress</th>
                             <th>sitecontactperson</th>
                             <th>sitetarget</th>
                             <th>sitedays </th>
                             	<th>Update</th>
							<th>Delete</th>
                         	</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="infoModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="info_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Site Info</h4>
				</div>
				<div class="modal-body">
					<label>sitename</label>
					<input type="text" name="sitename" id="sitename" class="form-control" />
					<br />
					<label>sitedescription</label>
					<input type="text" name="sitedescription" id="sitedescription" class="form-control" />
					<br />
					<label>eventtype</label>
					<input type="text" name="eventtype" id="eventtype" class="form-control" />
					<br />
					<label>sitevenue</label>
					<input type="text" name="sitevenue" id="sitevenue" class="form-control" />
					<br />
					<label>sitemobile</label>
					<input type="text" name="sitemobile" id="sitemobile" class="form-control" />
					<br />
					<label>siteaddress</label>
					<input type="text" name="siteaddress" id="siteaddress" class="form-control" />
					<br />
					<label>sitecontactperson</label>
					<input type="text" name="sitecontactperson" id="sitecontactperson" class="form-control" />
					<br />
					<label>sitetarget</label>
					<input type="text" name="sitetarget" id="sitetarget" class="form-control" />
					<br />
					<label>sitedays</label>
					<input type="text" name="sitedays" id="sitedays" class="form-control" />
					<br />
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="site_id" id="site_id" />
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
		$('#info_form')[0].reset();
		$('.modal-title').text("Add Site Info");
		$('#action').val("Add");
		$('#operation').val("Add");
	
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchinfo.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#info_form', function(event){
		event.preventDefault();
		var sitename = $('#sitename').val();
		var sitedescription = $('#sitedescription').val();
		var eventtype = $('#eventtype').val();
		var sitevenue = $('#sitevenue').val();
		var sitemobile = $('#sitemobile').val();
		var siteaddress = $('#siteaddress').val();
		var sitecontactperson = $('#sitecontactperson').val();
		var sitetarget = $('#sitetarget').val();
	    var sitedays = $('#sitedays').val();
	
		
		if(sitename != '' && sitedescription != '')
		{
			$.ajax({
				url:"infoinsert.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#info_form')[0].reset();
					$('#infoModal').modal('hide');
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
		var site_id = $(this).attr("siteID");
		$.ajax({
			url:"fetch_singleinfo.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{site_id:site_id},
			dataType:"json",
			success:function(data)
			{
	
				$('#infoModal').modal('show');
				$('#sitename').val(data.sitename);
				$('#sitedescription').val(data.sitedescription);
				$('#eventtype').val(data.eventtype);
				$('#sitevenue').val(data.sitevenue);
				$('#sitemobile').val(data.sitemobile);
				$('#siteaddress').val(data.siteaddress);
				$('#sitecontactperson').val(data.sitecontactperson);
				$('#sitetarget').val(data.sitetarget);
				$('#sitedays').val(data.sitedays);
				$('.modal-title').text("Edit Info");
				$('#site_id').val(site_id);
			    $('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	
	
	$(document).on('click', '.delete', function(){
		var site_id = $(this).attr("siteID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteinfo.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
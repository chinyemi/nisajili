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
			<h1 align="center">Dates</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#dateModal" class="btn btn-info btn-lg">Add Date</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
						    <th>sitename</th>
							<th>sitedate</th>
							<th>inconferencedeadline</th>
            				 <th>superearlybirddeadline</th>
                             <th>earlybirddeadline</th>
                             <th>Update</th>
							<th>Delete</th>
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
					<h4 class="modal-title">Add Dates</h4>
				</div>
				<div class="modal-body">
				    
				    
				 	    	<label>Select Site</label>	<br />
				 	    <select name="vsite_id" id="vsite_id" class="form-control" >
				  <option></option>
				
				 
				 	<?php $getGroups=mysqli_query($conn,"SELECT * from  glssiteinfo"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['siteID']?>"><?php echo $rowGroups['sitename'] ?></option>
		 <?php
		 }
		 
		 ?></select><br>
		 
					<label>sitedate</label>
					<input type="date" name="sitedate" id="sitedate" class="form-control" />
					<br />
					<label>inconferencedeadline</label>
					<input type="date" name="inconferencedeadline" id="inconferencedeadline" class="form-control" />
					<br />
				
						<label>earlybirddeadline</label>
					<input type="date" name="earlybirddeadline" id="earlybirddeadline" class="form-control" />
					<br />
					
						<label>superearlybirddeadline</label>
					<input type="date" name="superearlybirddeadline" id="superearlybirddeadline" class="form-control" />
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
		$('#date_form')[0].reset();
		$('.modal-title').text("Add Date Info");
		$('#action').val("Add");
		$('#operation').val("Add");
	
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchdate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		var sitedate = $('#sitedate').val();
		var inconferencedeadline = $('#inconferencedeadline').val();
		var earlybirddeadline = $('#earlybirddeadline').val();
	    var superearlybirddeadline= $('#superearlybirddeadline').val();
	    var site_id=$('#site_id').val();
	
		if(sitedate != '' && earlybirddeadline != '')
		{
			$.ajax({
				url:"insertdate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var site_id = $(this).attr("siteID");
		$.ajax({
			url:"fetch_singledate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{site_id:site_id},
			dataType:"json",
			success:function(data)
			{
	
				$('#dateModal').modal('show');
				$('#sitedate').val(data.sitedate);
				$('#inconferencedeadline').val(data.inconferencedeadline);
				$('#earlybirddeadline').val(data.earlybirddeadline);
				$('#superearlybirddeadline').val(data.superearlybirddeadline);
				$('#vsite_id').val(site_id);
			    $('.modal-title').text("Edit Date");
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
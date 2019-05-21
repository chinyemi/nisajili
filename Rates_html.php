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
			<h1 align="center">Site Rates  (<?php echo CURRENCY?>)</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#infoModal" class="btn btn-info btn-lg">Add Site Rates</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
				  	<thead>
						<tr>
						       <th>site name</th>
						     <th>inconferencerate</th>
						    <th>superearlybirdrate
						     normal</th>
							 <th>superearlybirdrate
							 vip</th>
            				 <th>earlybirdrate
            				 normal</th>
            				 <th>earlybirdrate
            				 vip</th>
                             <th>regularrate
                             normal</th>
                             <th>regularrate
                             vip</th>
                             <th>studentrate</th>
                             <th>grouprate
                             normal</th>
                             <th>grouprate
                             vip</th>
                             <th>international
                             rate</th>
                             <th>exchangerate</th>
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
					<h4 class="modal-title">Add Site Rates</h4>
				</div>
				
				<div class="modal-body">
				  
					
					
				 	    	<label>Select Site</label>	<br />
				 	    <select name="site_id" id="site_id" class="form-control" >
				 	        <option></option>
				 
				
				 
				 	<?php $getGroups=mysqli_query($conn,"SELECT * from  glssiteinfo"); 
	    while ($rowGroups=mysqli_fetch_array($getGroups)) { ?>
		 	
<option  value="<?php echo $rowGroups['siteID']?>"><?php echo $rowGroups['sitename'] ?></option>
		 <?php
		 }
		 
		 ?></select><br>
		 	<label>inconferencerate</label>
					<input type="text" name="inconferencerate" id="inconferencerate" class="form-control" />
					<br />
					
		 
					<label>superearlybirdrate_normal</label>
					<input type="text" name="superearlybirdrate_normal" id="superearlybirdrate_normal" class="form-control" />
					<br />
					<label>superearlybirdrate_vip</label>
					<input type="text" name="superearlybirdrate_vip" id="superearlybirdrate_vip" class="form-control" />
					<br />
					<label>earlybirdrate_normal</label>
					<input type="text" name="earlybirdrate_normal" id="earlybirdrate_normal" class="form-control" />
					<br />
					<label>earlybirdrate_vip</label>
					<input type="text" name="earlybirdrate_vip" id="earlybirdrate_vip" class="form-control" />
					<br />
					<label>regularrate_normal</label>
					<input type="text" name="regularrate_normal" id="regularrate_normal" class="form-control" />
					<br />
					<label>regularrate_vip</label>
					<input type="text" name="regularrate_vip" id="regularrate_vip" class="form-control" />
					<br />
					<label>studentrate</label>
					<input type="text" name="studentrate" id="studentrate" class="form-control" />
					<br />
					<label>grouprate_normal</label>
					<input type="text" name="grouprate_normal" id="grouprate_normal" class="form-control" />
					<br />
					<label>grouprate_vip</label>
					<input type="text" name="grouprate_vip" id="grouprate_vip" class="form-control" />
					<br />
					
					
						<label>internationalrate</label>
					<input type="text" name="internationalrate" id="internationalrate" class="form-control" />
					<br />
					
					
					
						<label>exchangerate</label>
					<input type="text" name="exchangerate" id="exchangerate" class="form-control" />
					<br />
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="rate_id" id="rate_id" />
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
		$('.modal-title').text("Add Site Rates");
		$('#action').val("Add");
		$('#operation').val("Add");
	
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchrate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		var inconferencerate = $('#inconferencerate').val();
		var superearlybirdrate_normal = $('#superearlybirdrate_normal').val();
		var superearlybirdrate_vip = $('#superearlybirdrate_vip').val();
		var earlybirdrate_normal = $('#earlybirdrate_normal').val();
		var earlybirdrate_vip = $('#earlybirdrate_vip').val();
		var regularrate_normal = $('#regularrate_normal').val();
		var regularrate_vip = $('#regularrate_vip').val();
		var internationalrate = $('#internationalrate').val();
		var exchangerate = $('#exchangerate').val();
	    var grouprate_normal = $('#grouprate_normal').val();
	    var grouprate_vip = $('#grouprate_vip').val();
      	var studentrate = $('#studentrate').val();
		var site_id= $('#site_id').val();
  
		if(superearlybirdrate_normal != '' && superearlybirdrate_vip != '')
		{
			$.ajax({
				url:"insertrate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
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
		var rate_id = $(this).attr("rateID");
		$.ajax({
			url:"fetch_singlerate.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
			method:"POST",
			data:{rate_id:rate_id},
			dataType:"json",
			success:function(data)
			{
			   
				$('#infoModal').modal('show');
				$('#inconferencerate').val(data.inconferencerate);
				$('#superearlybirdrate_normal').val(data.superearlybirdrate_normal);
				$('#superearlybirdrate_vip').val(data.superearlybirdrate_vip);
				$('#earlybirdrate_normal').val(data.earlybirdrate_normal);
				$('#earlybirdrate_vip').val(data.earlybirdrate_vip);
				$('#regularrate_normal').val(data.regularrate_normal);
				$('#regularrate_vip').val(data.regularrate_vip);
				$('#studentrate').val(data.studentrate);
				$('#grouprate_normal').val(data.grouprate_normal);
				$('#grouprate_vip').val(data.grouprate_vip);
				$('#internationalrate').val(data.internationalrate);
				$('#exchangerate').val(data.exchangerate);
				$('#site_id').val(data.site_id);
				$('.modal-title').text("Edit Rates");
				$('#rate_id').val(rate_id);
			    $('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	
	
	$(document).on('click', '.delete', function(){
		var rate_id = $(this).attr("rateID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleterates.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>",
				method:"POST",
				data:{rate_id:rate_id},
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
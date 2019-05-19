
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
			<h1 align="center">Manage | Stories</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Story</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							 
            				 <th>SiteName</th>
                             <th>storyURL</th>
                             <th>imageLink</th>
                             <th>imageLink</th>
                             <th>fa_Icon</th>
                             <th>description</th>
                             <th>status</th>
                             <th>storyTeller</th>
                             
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
					<h4 class="modal-title">Add Story</h4>
				</div>
				<div class="modal-body">

					<label>SiteName</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<?php 
					$getName=mysqli_query($conn,"SELECT `siteID`,`sitename` FROM `glssiteinfo``");
		
					?>
					<select name="siteID" id="siteID" class="form-control" required>
        			<option selected disabled>--Select Site--</option>
        			<?php 	while ($rowName=mysqli_fetch_array($getName)) { ?>
  					<option value="<?php echo $rowName['siteID']; ?>"><?php echo $rowName['sitename']; ?></option>
  					
 	               <?php 	} ?>
					</select>
					<br />
					
					
					<label>storyURL</label>
					<input type="text" name="storyURL" id="storyURL" class="form-control" />
					
					<br />
					
					<label>imageLink</label>
					<input type="text" name="imageLink" id="imageLink" class="form-control" />
					
					<br />
					
				
					<label>fa_Icon</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<select name="fa_Icon" id="fa_Icon" class="form-control" required>
        			<option selected disabled>--Select Icon--</option>
  					<option value="fas fa-globe">fas fa-globe</option>
  					<option value="fas fa-play">fas fa-play</option>
					</select>
					
					<br />
						
					<label>description</label>
					<input type="textbox" name="description" id="description" class="form-control" />
                     <br />
                     

                     <label>status</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<select name="status" id="status" class="form-control" required>
        			<option selected disabled>--Select Status--</option>
  					<option value="is-active">is-active</option>
  					<option value="not-active">not-active</option>
					</select>
					
					<br />
                    
                    <label>storyTeller</label>
					<input type="textbox" name="storyTeller" id="storyTeller" class="form-control" />
                     <br />
                     
				</div>
				<div class="modal-footer">
					<input type="hidden" name="storyID" id="storyID" />
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
		$('.modal-title').text("Add Story);
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchImpactStories.php?Id=<?php echo $Id;?>",
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
		
		var siteID = $('#siteID').val();
		var storyURL = $('#storyURL').val();
		var imageLink = $('#imageLink').val();
		var fa_Icon = $('#fa_Icon').val();
		var description = $('#description').val();
		var status = $('#status').val();
		var storyTeller = $('#storyTeller').val();
							

	  
		if(siteID != '' && storyURL != '')
		{
			$.ajax({
				url:"insertImpactStories.php?Id=<?php echo $Id;?>",
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
		var storyID = $(this).attr("storyID");
		$.ajax({
			url:"fetch_singleImpactStories.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{storyID:storyID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#siteID').val(data.siteID);
				$('#storyURL').val(data.storyURL);
				$('#imageLink').val(data.imageLink);
				$('#fa_Icon').val(data.fa_Icon);
				$('#description').val(data.description);
				$('#status').val(data.status);
				$('#storyTeller').val(data.storyTeller);
			     
			
				$('.modal-title').text("Edit Story");
				$('#storyID').val(storyID);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	
	$(document).on('click', '.delete', function(){
		var storyID = $(this).attr("storyID");
		if(confirm("Are you sure you want to delete this story?"))
		{
			$.ajax({
				url:"deleteImpactStories.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{storyID:storyID},
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
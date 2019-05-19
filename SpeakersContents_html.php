
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
			<h1 align="center">Manage | Speaker Contents</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add Speaker Contents</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							 
            			
            				 <th>fullname</th>
                             <th>contentURL</th>
                             <th>imageLink</th>
                             <th>fa_Icon</th>
                             <th>description</th>
                             
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
					<h4 class="modal-title">Add Speaker Contents</h4>
				</div>
				<div class="modal-body">

					<label>fullname</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<?php 
					$getName=mysqli_query($conn,"SELECT `InfoID` ,`fullname` FROM `webspeakers`");
		
					?>
					<select name="speakerID" id="speakerID" class="form-control" required>
        			<option selected disabled>--Select Speaker--</option>
        			<?php 	while ($rowName=mysqli_fetch_array($getName)) { ?>
  					<option value="<?php echo $rowName['InfoID']; ?>"><?php echo $rowName['fullname']; ?></option>
  					
 	               <?php 	} ?>
					</select>
					<br />
					
					
					<label>contentURL</label>
					<input type="text" name="contentURL" id="contentURL" class="form-control" />
					
					<br />
					
					<label>imageLink</label>
					<input type="text" name="imageLink" id="imageLink" class="form-control" />
					
					<br />
					
				
					<label>fa_Icon</label>
					<!--input type="text" name="Year" id="Year" class="form-control" /-->
					<select name="fa_Icon" id="fa_Icon" class="form-control" required>
        			<option selected disabled>--Select Icon--</option>
  					<option value="fas fa-play">fas fa-play</option>
  					<option value="fas fa-file-alt">fas fa-file-alt</option>
					</select>
					
					<br />
						
					<label>description</label>
					<input type="textbox" name="description" id="description" class="form-control" />
                     <br />
                     
                     
				</div>
				<div class="modal-footer">
					<input type="hidden" name="contentID" id="contentID" />
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
		$('.modal-title').text("Add Speaker Contents");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchSpeakerContents.php?Id=<?php echo $Id;?>",
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
		
		var speakerID = $('#speakerID').val();
		var contentURL = $('#contentURL').val();
		var imageLink = $('#imageLink').val();
		var fa_Icon = $('#fa_Icon').val();
		var description = $('#description').val();
							
		
		if(speakerID != '' && contentURL != '')
		{
			$.ajax({
				url:"insertSpeakerContents.php?Id=<?php echo $Id;?>",
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
		var contentID = $(this).attr("contentID");
		$.ajax({
			url:"fetch_singleSpeakerContents.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{contentID:contentID},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#speakerID').val(data.speakerID);
				$('#contentURL').val(data.contentURL);
				$('#imageLink').val(data.imageLink);
				$('#fa_Icon').val(data.fa_Icon);
				$('#description').val(data.description);
			     
			
				$('.modal-title').text("Edit Speaker Contents");
				$('#contentID').val(contentID);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	
	$(document).on('click', '.delete', function(){
		var contentID = $(this).attr("contentID");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteSpeakerContents.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{contentID:contentID},
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
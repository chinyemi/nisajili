
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
			<h1 align="center">Manage | FAQ</h1>
			
			<div class="table-responsive">
				
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add FAQ</button>
				</div>
				<br/>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
           				 
            				 <th>category</th>
                             <th>quiz</th>
                            
                             <th>answer</th>
                          
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
					<h4 class="modal-title">Add FAQ</h4>
				</div>
				<div class="modal-body">
						<label>category</label>
					<input type="text" name="category" id="category" class="form-control" />
					
					<br />
				
					<label>quiz</label>
						<input type="text" name="quiz" id="quiz" class="form-control" />
					
					<br />
				
					
					<label>answer</label>
					<input type="textarea"  name="answer" id="answer" class="form-control" rows="4" cols="50"></textarea>
					<br />
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
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
		$('.modal-title').text("Add FAQ");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetchWebFaq.php?Id=<?php echo $Id;?>",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 2, 3],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		
		var category = $('#category').val();
		var quiz = $('#quiz').val();
		var answer = $('#answer').val();
		

		if(quiz != '' && answer != '')
		{
			$.ajax({
				url:"insertWebFaq.php?Id=<?php echo $Id;?>",
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
		var id = $(this).attr("id");
		$.ajax({
			url:"fetch_singleWebFaq.php?Id=<?php echo $Id;?>",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#category').val(data.category);
				$('#quiz').val(data.quiz);
				$('#answer').val(data.answer);
				
			
				$('.modal-title').text("Edit FAQ");
				$('#id').val(id);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deleteWebFaq.php?Id=<?php echo $Id;?>",
				method:"POST",
				data:{id:id},
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
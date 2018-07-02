<?php
$function= $_SERVER['DOCUMENT_ROOT'].'/dashboard/function.php'; 
require ($function);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Roles</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script href="js/bootstrap.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
</head>
<body>
<?php 
	if(isset($_POST["add_btn"]))
	{
		$role_name =$_POST['role_name'];
		if ($role_name == "") 
		{

		}
		else 
		{
			create_user_role($role_name);
		}
	}

	// get list user role
	$listRole = get_contend('ListUserRole','','');
?>
	<div class="row">
		<div class="left-menu col-sm-3 col-md-2">
			<div class="btn-group-vertical btn-block">
				<span class="oi oi-globe" title="globe" aria-hidden="true"><a href="URLList.html">URL List</a></span>
				<span class="oi oi-person" title="person" aria-hidden="true"><a href="UserList.html">User Management</a></span>
				<span class="oi oi-pie-chart" title="pie-chart" aria-hidden="true">User Roles</span>
				<span class="oi oi-lock-locked" title="lock-locked" aria-hidden="true"><a href="SignInPage.html"> Log Out</a> </span>
			</div>
		</div>
		<div class="col-sm-9 col-md-10">
			<ul class="list-inline">
				<li class="list-inline-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddRole">Add Role <span class="oi oi-plus" title="plus" aria-hidden="true"></span></button></li>
				
			</ul>
			<div class="form-group">
					<label for=roleView" class="col-form-label">Select Role: </label>
			        <select class="input-small" id="roleView">
					    <option></option>
					    <option>Role2</option>
					    <option>Role3</option>
					    <option>Role4</option>
					</select>
				</div>
			<div class="row">
				<table class="table table-bordered">
					<thead class="tableHead">
						<tr class="d-flex">
							<th class="col col-2"> Role ID </th>
							<th class="col col-4"> Role Name </th>
							<th class="col col-2"> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listRole as $role): ?>
						<tr class="d-flex">
							<td class="col col-2"><?php echo $role['RoleID']; ?></td>
							<td class="col col-4"><?php echo $role['RoleName']; ?></td>
							<td class="col col-4">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit"><span class="oi oi-pencil" title="pencil" aria-hidden="true"></span></button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete"><span class="oi oi-x" title="x" aria-hidden="true"></span></button>
							</td>
						<?php endforeach; ?>
					</tbody>
		
				</table>
				</table>
			</div>
		</div>
	</div>

	<div class="modal" id="Edit">
		<div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h5 class="modal-title">Edit User</h5>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <!-- Modal body -->
		      <div class="modal-body">
		      	<h6> Insert Content Here </h6>
		      </div>
		      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		      </div>
		    </div>
	    </div>
    </div>


	<div class="modal" id="Delete">
		<div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h5 class="modal-title">Warning</h5>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <!-- Modal body -->
		      <div class="modal-body">
		      	<h6> Are you sure you want to delete this user?</h6>
		      </div>
		      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		    </div>
		</div>
	</div>
    </div>

    <div class="modal" id="AddRole">
					<div class="modal-dialog">
					    <div class="modal-content">
					      <!-- Modal Header -->

					      <div class="modal-header">
					        <h3 class="modal-title">Add Role</h3>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>
					      <!-- Modal body -->
					      <div class="modal-body">
					      	<form action="" method="POST">
					        <label for="userRoleInput" class="col-form-label">Role Name:</label>
            				<input type="text" class="form-control" id="userRoleInput" name="role_name" autofocus>

					      
					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					        <button type="submit" name="add_btn" class="btn btn-primary">Save</button>
					      </div>
					      </div>
					    </div>
					</div>
				</div>
</body>
</html>
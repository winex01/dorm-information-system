<div class="modal fade" id="userModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add User</h4>
			</div>
			<div class="modal-body">
			<div align="center" id="user-form-response" class="text-danger"></div>
				<form class="form-horizontal" role="form">
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="newUserName">Username:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="newUserName" placeholder="Username" autofocus>
				      <div class="text-danger" id="nun-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="newUserPass">Password:</label>
				    <div class="col-sm-8"> 
				      <input type="password" class="form-control" id="newUserPass" placeholder="Password">
				      <div class="text-danger" id="nup-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="newConfirmPass">Confirm Password:</label>
				    <div class="col-sm-8"> 
				      <input type="password" class="form-control" id="newConfirmPass" placeholder="Confirm Password">
				      <div class="text-danger" id="ncp-err"></div>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="button" class="btn btn-primary" id="userSave">Save
						<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
					  </button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
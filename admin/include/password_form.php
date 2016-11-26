
<div class="modal fade" id="passModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<div align="center" id="response" class="text-danger"></div>
					<form class="form-horizontal" role="form">
					  <div class="form-group">
					    <label class="control-label col-sm-4" for="newPass">New Password:</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="newPass" placeholder="Enter Password" autofocus>
					      <div class="text-danger" id="np-err"></div>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-4" for="confirmPass">Confirm Password:</label>
					    <div class="col-sm-8"> 
					      <input type="password" class="form-control" id="confirmPass" placeholder="Confirm password">
					      <div class="text-danger" id="cp-err"></div>
					    </div>
					  </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<button type="button" class="btn btn-primary" id="passSave">Save changes
				<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
				</button>
			</div>
					</form>
		</div>
	</div>
</div>


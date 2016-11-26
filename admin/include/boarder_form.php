<div class="modal fade" id="modal-boarder">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			<div align="center" id="boarder-response" class="text-danger"></div>
				<form class="form-horizontal" role="form">
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="firstName">First Name:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="firstName" placeholder="First Name" autofocus>
				      <div class="text-danger" id="fN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="middleName">Middle Name:</label>
				    <div class="col-sm-8"> 
				      <input type="text" class="form-control" id="middleName" placeholder="Middle Name">
				      <div class="text-danger" id="mN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="lastName">Last Name:</label>
				    <div class="col-sm-8"> 
				      <input type="text" class="form-control" id="lastName" placeholder="Last Name">
				      <div class="text-danger" id="lN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="telNumber">Tel / Phone #:</label>
				    <div class="col-sm-4"> 
				      <input type="text" class="form-control" id="telNumber" placeholder="Telephone #">
				      <div class="text-success" id="tN-err"></div>
				    </div>
				    <div class="col-sm-4"> 
				      <input type="text" class="form-control" id="phoneNumber" placeholder="Phone #">
				      <div class="text-danger" id="pN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="homeAddress">Home Address:</label>
				    <div class="col-sm-8"> 
				      <textarea class="form-control" id="homeAddress" placeholder="Address"></textarea>
				      <div class="text-danger" id="hA-err"></div>
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<button type="button" class="btn btn-primary" id="saveBoarder">Save
				<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-update-form">
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
				    <label class="control-label col-sm-4" for="upFirstName">First Name:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="upFirstName" placeholder="First Name" autofocus>
				      <div class="text-danger" id="fN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="upMiddleName">Middle Name:</label>
				    <div class="col-sm-8"> 
				      <input type="text" class="form-control" id="upMiddleName" placeholder="Middle Name">
				      <div class="text-danger" id="mN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="upLastName">Last Name:</label>
				    <div class="col-sm-8"> 
				      <input type="text" class="form-control" id="upLastName" placeholder="Last Name">
				      <div class="text-danger" id="lN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="upTelNumber">Tel / Phone #:</label>
				    <div class="col-sm-4"> 
				      <input type="text" class="form-control" id="upTelNumber" placeholder="Telephone #">
				      <div class="text-success" id="tN-err"></div>
				    </div>
				    <div class="col-sm-4"> 
				      <input type="text" class="form-control" id="upPhoneNumber" placeholder="Phone #">
				      <div class="text-danger" id="pN-err"></div>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="upHomeAddress">Home Address:</label>
				    <div class="col-sm-8"> 
				      <textarea class="form-control" id="upHomeAddress" placeholder="Address"></textarea>
				      <div class="text-danger" id="hA-err"></div>
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<button type="button" class="btn btn-primary" id="updateBoarderBUtton">Save
				<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-sms">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Sending SMS</h4>
			</div>
			<div class="modal-body">
				<form onsubmit="event.preventDefault();" class="form-horizontal" role="form">
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="smsPhoneNum">Send to:</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" id="smsPhoneNum" disabled>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="smsMessage">Message:</label>
				    <div class="col-sm-10"> 
				    <textarea class="form-control" id="smsMessage" autofocus placeholder="100 characters only"></textarea>
				    <div class="text-danger" id="sM-err"></div>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-12">
				      <button type="submit" class="btn btn-success" id="smsSend">Send
				      <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
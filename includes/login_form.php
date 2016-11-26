<div class="container">
<div class="container-fluid">
	<div class="panel panel-primary login-form">
		<div class="panel-heading">
			<h3 class="panel-title">Please, Login</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" id="formLogin" action="" method="post">
			  <div class="form-group">
			  <label id="msg" class="text-danger" style="margin-left: 190px;"></label>
			    <label class="control-label col-sm-2" for="username">Username:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="username" placeholder="Enter username">
			      <div class="text-danger" id="un-err"></div>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Password:</label>
			    <div class="col-sm-10"> 
			      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
			      <div class="text-danger" id="pw-err"></div>
			    </div>
			  </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label><input type="checkbox"> Remember me</label>
			      </div>
			    </div>
			  </div>
			</form>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary" id="buttonSubmit">Submit <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
			    </div>
			  </div>

		</div>
	</div>
</div>


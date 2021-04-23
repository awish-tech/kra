<?php
require_once 'header.php';

?>

<div class="container">
	<div class="jumbotron">
		<fieldset>
			<legend>Login</legend>
			<form method="POST" action="includes/login.inc.php" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="kra_pin">KRA Pin</label>
					<input type="text" name="kra_pin" class="form-control col-md-4" required="required" placeholder="Enter KRA Pin">
				</div>

				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" name="pass" class="form-control col-md-4" required="required" placeholder="*************">
				</div>

				<div class="form-group">
					<input type="submit" name="submit_btn_login" class="form-control col-md-4 btn btn-primary" value="Login">
				</div>
				
			</form>
		</fieldset>
		
	</div>
	
</div>


<?php

require_once 'footer.php';

?>
<?php
require_once 'header.php';

?>

<div class="container" >

	<div class="jumbotron">
		<h3>Register KRA Pin</h3>
		<hr>
		

				
		

			<?php
			if( isset( $_GET['infosent']) ) {
				if( $_GET['infosent'] == "success" ) {
					echo <<<_END
					<div class="row">
					<div class="col-md-4">
						<fieldset>
							<legend>Personal Info</legend>
							<form method="POST" action="includes/create_account.inc.php" class="" role="form" id="second_personal_info_form">
								<div class="form-group">
									<label for="marital_status">Marital Status: </label>
									<select class="form-control" name="marital_status">
										<option selected="selected">Single</option>
										<option>Married</option>
									</select>
									
									
								</div>


								<div class="form-group">
									<label for="people_with_difficulty">Do you have any Difficulty/Disability: </label><br>
									<input type="radio" name="people_with_difficulty" value="2" required="required">
									<label for="yes">Yes</label><br>

									<input type="radio" name="people_with_difficulty" value="1" required="required">
									<label for="no">No</label>
									
								</div>

								
								
							</form>
						</fieldset>
						
					</div> <!-- close div col-md-4 -->



					<div class="col-md-4">
						<fieldset>
							<legend>Contacts</legend>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" form="second_personal_info_form" required="required">
									
							</div>

							<div class="form-group">
								<label for="email2">Email <em>(optional)</em>: </label>
								<input type="email" name="email2" class="form-control" form="second_personal_info_form" >
									
							</div>

							<div class="form-group">
								<label for="phone">Phone Number </label>
								<input type="text" name="phone" class="form-control" form="second_personal_info_form" required="required">
									
							</div>

							<div class="form-group">
								<label for="phone2">Phone Number <em>(optional)</em>: </label>
								<input type="text" name="phone2" class="form-control" form="second_personal_info_form">
									
							</div>
						</fieldset>
						
					</div> <!-- close div col-md-4 -->

					<div class="col-md-4">
						<fieldset>
							<legend>Employment Status</legend>

							<div class="form-group">
								<label for="employment_status"></label>
								<select class="form-control" form="second_personal_info_form" name="employment_status">
									<option selected="selected" value="1">Employed</option>
									<!--<option>Self-Employed</option>-->
									<option value="2">Not Employed</option>
								</select>
								
							</div>
						</fieldset>
						
					</div>



					</div> <!-- close div row -->

					<div class="form-group">
						<input type="submit" form="second_personal_info_form" name="submit_basic_info_btn2" value="SAVE" class="btn btn-primary">
						
					</div>
_END;
				}elseif ( $_GET['infosent'] == "successnotemployed" || $_GET['infosent'] == "successemployeedetails") {
					echo <<<_END

					<div class="row">
						<div class="col-md-4">
							<fieldset>
								<legend>Create Password</legend>
								<form method="POST" action="includes/create_account.inc.php" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" name="password" class="form-control" required="required" placeholder="*************">
									</div>

									<div class="form-group">
										<label for="re_password">Re-type Password</label>
										<input type="password" name="re_password" class="form-control" required="required" placeholder="*************">
									</div>

									<div class="form-group">
										<input type="submit" name="submit_last_form" class="form-control col-md-4 btn btn-primary" value="Submit">
									</div>
									
								</form>
							</fieldset>
						</div>



					</div>


_END;
				} elseif (  $_GET['infosent'] == "successemployed" ) {
					echo <<<_END


					<div class="row">
						<div class="col-md-4">
							<fieldset>
								<legend>Employement Details</legend>
								<form method="POST" action="includes/create_account.inc.php" class="" role="form" id="employee_form">
									<div class="form-group">
										<label for="employee_no">Employee Number</label>
										<input type="text" name="employee_no" class="form-control" required="required">
											
									</div>


									<div class="form-group">
										<label for="employer_name">Employer Name</label>
										<input type="text" name="employer_name" class="form-control" required="required">
											
									</div>

									<div class="form-group">
										<label for="employer_kra_pin">Employer KRA-Pin</label>
										<input type="text" name="employer_kra_pin" class="form-control" required="required">
											
									</div>

									<div class="form-group">
										<label for="date_of_employment">Date of Employment</label>
										<input type="date" name="date_of_employment" class="form-control" required="required">
											
									</div>
								</form>
							</fieldset>
							
						</div> <!-- close div col-md-4 -->



						<div class="col-md-4">
							<fieldset>
								<legend>Payslip Details</legend>
								<div class="form-group">
									<label for="payslip_no">Payslip Number</label>
									<input type="text" name="payslip_no" class="form-control" form="employee_form" required="required">
										
								</div>

								<div class="form-group">
									<label for="salary">Salary Amount </label>
									<input type="text" name="salary" class="form-control" form="employee_form" required="required">
										
								</div>

								<div class="form-group">
									<label for="allowances">Other Allowances </label>
									<input type="text" name="allowances" class="form-control" form="employee_form" required="required">
										
								</div>

								<div class="form-group">
									<label for="deductions">Total Deductions </label>
									<input type="text" name="deductions" class="form-control" form="employee_form" required="required">
										
								</div>
							</fieldset>
							
						</div> <!-- close div col-md-4 -->


					</div> <!-- close div row -->

					<div class="form-group">
							<input type="submit" form="employee_form" name="submit_employee_details" value="SAVE" class="btn btn-primary">
							
					</div>




_END;
				}

			} else {
				echo <<<_END

				<script type="text/javascript">
			
					$(function() {
						$('#selected_nationality' ).on( 'change', function() {
							//alert( this.value );
							if( this.value == 1 ) {
								$(".for_kenyans").addClass("for_kenyans_visible");
								$(".for_kenyans_visible" ).removeClass("for_kenyans");
							}else if( this.value = 2) {

								$(".for_kenyans_visible" ).addClass("for_kenyans");
								$(".for_kenyans").removeClass("for_kenyans_visible");
							}
							
						});

						

					});
				</script>

				<div class="row for_kenyans">

				<div class="col-md-4">
					<fieldset>
						<legend>Residency</legend>
						<div class="form-group">
								<label for="nationality">Nationality: </label>
								<select class="form-control" form="personal_info_form" name="nationality" id="selected_nationality">
									<option value="1">Kenyan</option>
									<option value="2" selected="selected">Non Kenyan</option>
								</select>
								
							</div>


					</fieldset>


				</div>



				<div class="col-md-4 for_kenyans">
					<fieldset>
						<legend>Personal Info</legend>
						<form method="POST" action="includes/create_account.inc.php" class="" role="form" id="personal_info_form">
							<div class="form-group">
								<label for="national_id">National ID: </label>
								<input type="text" name="national_id" class="form-control " required="required">
								
							</div>

							<div class="form-group">
								<label for="first_name">First Name: </label>
								<input type="text" name="first_name" class="form-control" required="required">
								
							</div>

							<div class="form-group">
								<label for="sir_name">Sir Name: </label>
								<input type="text" name="sir_name" class="form-control">
								
							</div>

							<div class="form-group">
								<label for="last_name">Last Name: </label>
								<input type="text" name="last_name" class="form-control" required="required">
								
							</div>

							<div class="form-group">
								<label for="gender">Gender: </label><br>
								<input type="radio" name="gender" value="F" required="required">
								<label for="female">Female</label><br>

								<input type="radio" name="gender" value="M" required="required">
								<label for="male">Male</label>
								
							</div>

							<div class="form-group">
								<label for="date_of_birth">Date of birth: </label>
								<input type="date" name="date_of_birth" class="form-control" required="required">
								
							</div>

							
							
						</form>
					</fieldset>
					
				</div>

				<div class="col-md-4 for_kenyans">

					<fieldset>
						<legend>Place Of Residence</legend>
						<!--<form method="POST" action="create_account.inc.php" class="" role="form">-->

							<div class="form-group">
								<label for="sub_county">Sub-County: </label>
								<select class="form-control" form="personal_info_form" name="sub_county" >
									<option value="1">Rabai</option>
									<option value="2" selected="selected">Kala</option>
								</select>
								
							</div>

							<div class="form-group">
								<label for="district">District: </label>
								<input type="text" name="district" class="form-control" form="personal_info_form" required="required">
								
							</div>

							<div class="form-group">
								<label for="division">Division: </label>
								<input type="text" name="division" class="form-control" form="personal_info_form" required="required">
								
							</div>

							<div class="form-group">
								<label for="location">Location: </label>
								<input type="text" name="location" class="form-control" form="personal_info_form" required="required">
								
							</div>

							<div class="form-group">
								<label for="village">Street/Village: </label>
								<input type="text" name="village" class="form-control" form="personal_info_form" required="required">
								
							</div>
							
						<!--</form>-->
					</fieldset>
					
				</div>

				
				</div><!-- end of row -->

				<div class="form-group">
					<input type="submit" form="personal_info_form" name="submit_basic_info_btn" value="SAVE" class="btn btn-primary">
					
				</div>
_END;


			}


			?>	
			
			
		

		
		
		
	</div>
</div>








<?php
require_once 'footer.php';

?>
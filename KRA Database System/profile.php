<?php

require_once 'header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3>Personal Info</h3>
			<?php

			if ( isset( $_SESSION['user_id']) ) {
				require_once 'includes/functions.inc.php';

				$result_personal_info = queryMysql( "SELECT * FROM Personal_info WHERE national_id_no = '".$_SESSION['user_id']."'" );
				if( $result_personal_info ) {
					$row = $result_personal_info -> fetch_array( MYSQLI_NUM );

				}
				?>

				<table class="table">
					<tr>
						<td>Name: <b><?php echo $row[1]." ".$row[3]." ".$row[2]; ?></b></td>
						<td>ID Number: <b><?php echo $row[0]; ?></b></td>
					</tr>

					<tr>
						<td>Gender: <b><?php echo $row[5]; ?></b></td>
						<td>Date of Birth:<b><?php echo $row[4]; ?></b></td>
						
					</tr>
					<tr>
						<td>Marital Status: <b><?php ?></b></td>
						<td>&nbsp;</td>
					</tr>
				</table>



				<h3>Place of Residence</h3>
				<table class="table">
					<tr>
						<td>Nationality: </td>
						<td>County:</td>
						<td>Sub-County: </td>	
					</tr>

					<tr>
						<td>District: <b><?php echo $row[6]; ?></b></td>
						<td>Division: <b><?php echo $row[7]; ?></b></td>
						<td>Location: <b><?php echo $row[8]; ?></b></td>
					</tr>

					<tr>
						<td>District: <b><?php echo $row[9]; ?></b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>
					
				</table>


				<h3>Contacts</h3>
				<table class="table">
					<?php

					$result_contact_info = queryMysql( "SELECT * FROM kra_contact_list WHERE national_id_no = '".$_SESSION['user_id']."'" );
					if( $result_contact_info ) {
						$row = $result_contact_info -> fetch_array( MYSQLI_NUM );
					?>

						<tr>
							<td>Phone: <b><?php echo "0".$row[2]; ?></b></td>
						</tr>

						<tr>
							<td>Email: <b><?php echo $row[1]; ?></b></td>
						</tr>
					<?php	
					}
					?>
				</table>


				<h3>Employment Details</h3>
				<table class="table">
					
					<?php

					$result_employment_info = queryMysql( "SELECT * FROM kra_employment_details WHERE national_id_no = '".$_SESSION['user_id']."'" );
					if( $result_employment_info -> num_rows ) {
						$row3 = $result_employment_info -> fetch_array( MYSQLI_NUM );
					?>

						<tr>
							<td>Employment Status: Currently Employed<b><?php  ?></b></td>
						</tr>

						<tr>
							<td>Employer: <b><?php echo $row3[1]; ?></b></td>
							<td>Employer KRA Pin: <b><?php echo $row3[2]; ?></b></td>
						</tr>

						<tr>
							<td>Employee Number: <b><?php echo $row3[0]; ?></b></td>
							<td>Date of Employment: <b><?php echo $row3[3]; ?></b></td>
						</tr>
					<?php	
					} else {

					?>	
						<tr>
							<td>Employment Status: <b>Currently Unemployed<?php  ?></b></td>
						</tr>
					<?php	
					}
					?>
					
				</table>




				<h5>Payslip</h5>
				<table class="table">
					<?php

					$result_payslip_info = queryMysql( "SELECT * FROM kra_payslip_data WHERE employee_id = (SELECT employee_id FROM kra_employment_details WHERE national_id_no = '".$_SESSION['user_id']."') " );
					if( $result_payslip_info ) {
						$row4 = $result_payslip_info -> fetch_array( MYSQLI_NUM );
					?>

						<tr>
							<td>Payslip Number: <b><?php echo "0".$row4[0]; ?></b></td>
							<td>&nbsp;</td>
						</tr>

						<tr>
							<td>Salary: <b><?php echo $row4[1]; ?></b></td>
							<td>Other Allowances: <b><?php echo $row4[2]; ?></b></td>
						</tr>

						<tr>

							<?php

						$result_tax_info = queryMysql( "SELECT * FROM `kra_taxing table` WHERE Income_tax_id = (SELECT income_tax_id FROM kra_payslip_data WHERE payslip_no = '".$row4[0]."') " );
						if( $result_tax_info ) {
							$row5 = $result_tax_info -> fetch_array( MYSQLI_NUM );
							?>

							<td>Tax Rate: <b><?php echo $row5[2]."%"; ?></b></td>

						<?php	
						}
						?>

							
							<td>Total Deductions: <b><?php echo $row4[3]; ?></b></td>
						</tr>
					<?php	
					}
					?>
				</table>

			<?php	
			}
			?>
			
		</div>
		
	</div>
	
</div>



<?php

require_once 'footer.php';
?>
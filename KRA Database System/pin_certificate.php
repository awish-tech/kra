<?php
session_start();
require_once 'includes/functions.inc.php';



?>

<!DOCTYPE html>
<html>
<head>
	<title>Certificate</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="design/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="design/assets/css/bootstrap.min.css">
</head>
<body>

	<div class="p-15 m-15">
		<div class="m-15 btn btn-light"><a class="nav-link" href="#">Download</a></div>

		<div class="m-15 btn btn-light"><a class="nav-link" href="login.php">Login</a></div>
		
	</div>

	<div class="container border border-danger">
		<div class="logo">
			<img src="images/logo.png">
		</div>

		<div class="pinHeader w-50 bg-warning pt-3 pb-3 mx-auto">
			<h2 style="text-align: center;">PIN Certificate</h2>
		</div>

		<div class="contacts_certificate">
			<b>For General Tax Questions<br>
			Contact KRA Call Centre<br>
			Tel: +254(020) 4999 999<br>
			Call: +254(0711)088 999<br>
			Email: callcentre@kra.go.ke
			</b>
		</div>
		<hr class="line">

		<div class="date_pin float-right">
			
			<?php
				$result_kra = queryMysql( "SELECT * FROM kra_pin WHERE national_id_no = '".$_SESSION['id']."' " );
				if( $result_kra ) {
					$row = $result_kra -> fetch_array( MYSQLI_NUM );
					$kra_pin = $row[0];
					echo "Certificate Date:" .$row[1]."<br>";
					echo "Personal Identification Number<br>";
					echo $kra_pin;
				}

			?>
			

			
		</div>
		<hr class="line">

		<div class="certify mx-auto">
			<p >This is to certify that taxpayer shown herein has been registered with Kenya Revenue Authority</p>
		</div>

		<div class="taxpayer_info">
			<h3 class="center">Taxpayer Information</h3>
			<table class="table table-bordered">
				<tr>

					<td>Taxpayer Name</td>

					<?php

					$result_user_name = queryMysql( "SELECT * FROM kra_identification_details WHERE national_id_no = '".$_SESSION['id']."' " );
					if( $result_user_name ) {
						$row = $result_user_name -> fetch_array( MYSQLI_NUM );
						echo "<td>".$row[1]. " " .$row[2]. " " .$row[3]."</td>";
					}

				?>
					
				</tr>

				<tr>
					<td>Email Address</td>
					<?php

					$result_user_email = queryMysql( "SELECT * FROM kra_contact_list WHERE national_id_no = '".$_SESSION['id']."' " );
					if( $result_user_email ) {
						$row = $result_user_email -> fetch_array( MYSQLI_NUM );
						echo "<td>".$row[1]."</td>";
					}
					?>
					
				</tr>
			</table>
			
		</div>

		<div class="registered_address">
			<h3 class="center">Registered Address</h3>
			<table class="table table-bordered">
				<tr>
					<td>L.R Number</td>
					<td>Building: </td>
				</tr>

				<tr>
					<td>Street/Road: Mazeras</td>
					<td>City/Town:Busia</td>
				</tr>

				<tr>
					<td>County:Busia</td>
					<td>District :Busia</td>
				</tr>

				<tr>
					<td>Tax Area:Kasarani</td>
					<td>Station: Bungoma</td>
				</tr>

				<tr>
					<td>P.O Box: 35</td>
					<td>Postal Code: 80114</td>
				</tr>
			</table>
			
		</div>
		
	</div>

</body>
</html>

<?php



?>
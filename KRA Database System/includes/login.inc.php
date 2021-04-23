<?php

require_once 'functions.inc.php';

if( isset( $_POST['submit_btn_login']) ) {
	if ( isset( $_POST['kra_pin']) && isset( $_POST['pass']) ) {
		
		$kra_pin = sanitizeString( $_POST['kra_pin'] );
		$pass = sanitizeString( $_POST['pass'] );

		$result = queryMysql( "SELECT * FROM kra_pin WHERE kra_pin = '$kra_pin'" );

		if( $result -> num_rows ) {
			$row = $result -> fetch_array( MYSQLI_NUM );
			$result -> close();

			$salt1 = "i&z#";
			$salt2 = "h(_)";

			$token = hash('ripemd128', "$salt1$pass$salt2" );
			if ( $token == $row[2] ) {
				session_start();

				$result_username = queryMysql( "SELECT * FROM kra_identification_details WHERE national_id_no ='".$row[3]."' " );
				if ( $result_username -> num_rows ) {
					$row2 = $result_username -> fetch_array( MYSQLI_NUM );

					$_SESSION['username'] = $row2[1];
				}
				$_SESSION['user_id'] = $row[3];
				$_SESSION['kra_pin'] = $row[0];

				header( "Location: ../index.php?login=success");
				exit();



			} else {
				header( "Location: ../login.php?error=wrongpinorpassword" );
				exit();
			}


		} else {
			header( "Location: ../login.php?error=wrongpinorpassword" );
			exit();
		}
	} else {
		header( "Location: ../login.php?error=novaluesentered" );
		exit();
	}

}else {
	header( "Location: ../login.php?error=useformtologin" );
	exit();
}



?>
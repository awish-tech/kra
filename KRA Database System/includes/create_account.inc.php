<?php
session_start();

require_once 'functions.inc.php';


if( isset( $_POST['national_id'] ) ) {
	
	$_SESSION['id'] = sanitizeString( $_POST['national_id'] );
	$new_user_id = $_SESSION['id'];

	$national_id = sanitizeString( $_POST['national_id'] );
	$first_name = sanitizeString( $_POST['first_name'] );
	$middle_name = sanitizeString( $_POST['sir_name'] );
	$last_name = sanitizeString( $_POST['last_name'] );
	$gender = sanitizeString( $_POST['gender'] );
	$date_of_birth = sanitizeString( $_POST['date_of_birth'] );

	$nationality = sanitizeString( $_POST['nationality'] );
	$_SESSION['sub_county'] = sanitizeString( $_POST['sub_county'] );
	$district = sanitizeString( $_POST['district'] );
	$division = sanitizeString( $_POST['division'] );
	$location = sanitizeString( $_POST['location'] );
	$village = sanitizeString( $_POST['village'] );

	//$_SESSION['id'] = $national_id;


	$result_if_user_exists = queryMysql( "SELECT * FROM kra_identification_details WHERE national_id_no = '$national_id'");
	$rows = $result_if_user_exists -> num_rows;
	//$row = $result_if_user_exists -> fetch_array( MYSQLI_NUM );

	

	//$_SESSION['id'] = $row[0];
	if( $rows > 0 ) {
		header( "Location: ../create_account.php?error=userexists" );
		exit();
	} else {
		

		$result = queryMysql( "INSERT INTO kra_identification_details(national_id_no, first_name, last_name, middle_name, date_of_birth, gender, district, division, location, village) VALUES( '$national_id', '$first_name', '$last_name', '$middle_name', '$date_of_birth', '$gender', '$district', '$division', '$location', '$village'  )" );
		if( $result ) {

			//echo $new_user_id;
		
			header( "Location: ../create_account.php?infosent=success" );
			exit();
		}	
	}
	

}



if ( isset( $_POST['submit_basic_info_btn2']) ) {
	//global $new_user_id;

	$email = sanitizeString( $_POST['email'] );
	$email2 = sanitizeString( $_POST['email2'] );
	$phone = sanitizeString( $_POST['phone'] );
	$phone2 = sanitizeString( $_POST['phone2'] );

	$_SESSION['employment_status'] = sanitizeString( $_POST['employment_status'] );
	$_SESSION['marital_status'] = sanitizeString( $_POST['marital_status'] );
	$_SESSION['disability_status'] = sanitizeString( $_POST['people_with_difficulty'] );
	$employment_status = $_SESSION['employment_status'];
	$marital_status = $_SESSION['marital_status'] ;
	$disability_status = $_SESSION['disability_status'];


	$result_user_id = queryMysql( "SELECT * FROM kra_identification_details WHERE national_id_no ='".$_SESSION['id']."' ");

	$rows = $result_user_id -> num_rows;
	if( $rows > 0 ) {

		$result = queryMysql( "INSERT INTO kra_contact_list( email, phone, national_id_no) VALUES( '$email', '$phone', '".$_SESSION['id']."' )" );

		if( $result ) {

			//if the client is employed display employment details form
			if( $employment_status == '1' ) {
				//header( "Location: ../index.php" );
				header( "Location: ../create_account.php?infosent=successemployed" );

			}elseif ( $employment_status == '2' ) {
				header( "Location: ../create_account.php?infosent=successnotemployed" );
			}
			
		}
	} else {
		header( "Location: ../create_account.php?error=nofirstform");
		exit();
	}


	
}

if( isset( $_POST['submit_employee_details']) ) {

	$employee_no = sanitizeString( $_POST['employee_no'] );
	$employer_name = sanitizeString( $_POST['employer_name'] );
	$employer_kra_pin = sanitizeString( $_POST['employer_kra_pin'] );
	$date_of_employment = sanitizeString( $_POST['date_of_employment'] );
	$payslip_no = sanitizeString( $_POST['payslip_no'] );
	$salary = sanitizeString( $_POST['salary'] );
	$allowances = sanitizeString( $_POST['allowances'] );
	$deductions = sanitizeString( $_POST['deductions'] );


	$result_employed_person = queryMysql( "INSERT INTO kra_employment_details(employee_id, employer_name, employer_kra_pin, date_of_employment, national_id_no) VALUES('$employee_no', '$employer_name', '$employer_kra_pin', '$date_of_employment', '".$_SESSION['id']."') ");

	
	if ( $salary < 25000 ) {
		$income_tax_id = 1;
	}elseif ($salary >= 25000 && $salary < 50000 ) {
		$income_tax_id = 2;
	}elseif ($salary >= 50000 && $salary <= 90000) {
		$income_tax_id = 3;
	}elseif ($salary > 90000) {
		$income_tax_id = 4;
	}

	$result_payslip_details = queryMysql( "INSERT INTO kra_payslip_data(payslip_no, salary, other_allowances, total_deductions, employee_id, income_tax_id) VALUES( '$payslip_no', '$salary', '$allowances', '$deductions', '$employee_no', '$income_tax_id')" );




	if( $result_employed_person ) {
		if( $result_payslip_details ) {
			header( "Location: ../create_account.php?infosent=successemployeedetails" );
		}
	}
	

	

}


if( isset( $_SESSION['id']) ) {

	if( isset( $_POST['submit_last_form']) ) {

		function generateCode( $limit ) {
			$code = '';

			for ( $i=0; $i < $limit ; $i++) { 
				# code...
				$code .= mt_rand(0, 9);
				
			}
			return $code;
		}

			$half_pin = generateCode( 9 );
			$full_pin = "A".$half_pin."Q";
		
			
		$password = sanitizeString($_POST['password']);
		$re_password = sanitizeString( $_POST['re_password'] );
		
		

		if( $password == $re_password ) {
			//salting the password before input into the database
			$salt1 = "i&z#";
			$salt2 = "h(_)";

			$token = hash( 'ripemd128', "$salt1$password$salt2" );

			$result_kra = queryMysql( "INSERT INTO kra_pin(kra_pin, date_created, password, national_id_no) VALUES('$full_pin', NOW(), '$token', '".$_SESSION['id']."')" );

			$result_personal_details = queryMysql( "INSERT INTO kra_personal_details(kra_pin, disability_status, residential_id, subcounty_id, employment_status, marital_status) VALUES( '$full_pin', '".$_SESSION['disability_status']."', '1', '".$_SESSION['sub_county']."', '".$_SESSION['employment_status']."', '".$_SESSION['marital_status']."' )");


			if( $result_kra ) {
				header( "Location: ../pin_certificate.php?infosent=registrationsuccess" );
				exit();

			} else {
				header( "Location: ../create_account.php?error=nouserid" );
				exit();
			}

		}
	}
}else {
	header( "Location: ../create_account.php?error=nofirstform" );
}

?>
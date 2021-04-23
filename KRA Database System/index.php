<?php
require_once 'header.php';

if( isset( $_GET['logout']) ) {
	if( $_GET['logout'] == "success" ) {
		echo "<script> alert('Logut Successful');</script>";
	}
}


if( isset( $_GET['login']) ) {
	if( $_GET['login'] == "success" ) {
		echo "<script> alert('Login Successful');</script>";
	}
}


?>

<div class="container" >
	<p>
		 

Taxation for Non- Resident?s Employment Income

Any amount paid to Non-Resident individuals in respect of any employment with or services rendered to an employer who is resident in Kenya or to a permanent establishment in Kenya is subject to income tax charged at the prevailing individual income tax rates.
</p>

<p>
 

Non?Residents are however not entitled to any personal relief.

 

How do I file for Individual Income Tax Returns?

An individual income tax return is a declaration of income earned by an individual within a particular year.

 

Every individual with a KRA PIN is required to file this return.

 

You can file your Individual Income Tax Returns for a particular year of income, anytime between 1st January to 30th June of the following year.
	</p>

	
</div>








<?php
require_once 'footer.php';

?>
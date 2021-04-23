<?php

function generateCode( $limit ) {
	$code = '';

	for ( $i=0; $i < $limit ; $i++) { 
		# code...
		$code .= mt_rand(0, 9);
		
	}
	return $code;
}

echo "Random numbers<br>";
	$half_pin = generateCode( 9 );
	$full_pin = "A".$half_pin."Q";
	echo $full_pin;
	//echo mt_rand(0, 9);

?>
<?php


$dbhost = "localhost";
$dbusername = "root";
$dbname = " kra management system";
$dbpass = "";

$connection = new mysqli( $dbhost, $dbusername, $dbpass, $dbname );
if( $connection -> connect_error ) die( $connection -> connect_error);

function queryMysql( $query ) {
	global $connection;
	$result = $connection -> query( $query );

	if( !$result ) die( $connection -> error );
	return $result;
}

function sanitizeString( $var ) {
	global $connection;
	$var = strip_tags($var );
	$var = htmlentities($var );
	$var = stripslashes( $var );

	return $connection -> real_escape_string( $var );
}
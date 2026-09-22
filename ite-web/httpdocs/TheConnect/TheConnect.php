<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
ini_set('display_errors', '0');
session_start();

$hostname = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "itetechc_web01";
$password = getenv('DB_PASS') ?: "FM0$2tH~A%iP";
$database = getenv('DB_NAME') ?: "itetechc_web01";

$con = mysqli_connect($hostname , $username , $password , $database);

if (mysqli_connect_errno()){
	echo " ... : " . mysqli_connect_error();
}
else{
	mysqli_query($con,"SET NAMES UTF8");
}
$mysqli = new mysqli($hostname, $username, $password, $database);

$fixed_SL = " SELECT * FROM fixed";
$fixed_QR 	= mysqli_query($con,$fixed_SL);
$fixed 	= mysqli_fetch_array($fixed_QR);

?>

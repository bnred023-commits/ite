
<?php

include 'TheConnect/TheConnect.php';
$Fixed_SL = " SELECT * FROM Fixed";
$Fixed_QR 	= mysqli_query($con,$Fixed_SL);
$Fixed 	= mysqli_fetch_array($Fixed_QR);

if ($fixed[fixed_status_id]=='2') {
	echo "<script>  window.location='closed-for-renovations.html'; </script>";
}

if (isset($_GET[Language])){
	$_SESSION[Language] = $_GET[Language];
	// echo"<script> window.history.back(); </script>";
}
if (!isset($_SESSION[Language])) {
	$_SESSION[Language]= "Thailand";
}

include 'index_statistics.php';

?>

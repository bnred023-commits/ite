<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[DeviceID])){
	$_SESSION[DeviceID] =  $_GET[DeviceID];
}
$DeviceID =   $_SESSION[DeviceID] ;


$Device_SL = " SELECT * FROM Device WHERE DeviceID = '$DeviceID'";
$Device_QR = mysqli_query($con,$Device_SL);
$Device 	= mysqli_fetch_array($Device_QR);

@unlink("../Files/DevicePhoto/".$Device['DevicePhoto']);

$Device_Del ="DELETE FROM `Device` WHERE DeviceID = '$DeviceID' ";
$Device_Qurey  = mysqli_query($con,$Device_Del);

if($Device_Qurey) {
	echo"<script>  window.location='Device.php?DELETE'; </script>";
}
else{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>
<html>
<head>
	<?php include 'index_link.php'; ?>
</head>
<body>

</body>
</html>
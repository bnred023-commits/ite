<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[qrcode_id])){
	$_SESSION[qrcode_id] =  $_GET[qrcode_id];
}
$qrcode_id =   $_SESSION[qrcode_id] ;

$qrcode_SL = " SELECT * FROM qrcode WHERE qrcode_id = '$qrcode_id'";
$qrcode_QR = mysqli_query($con,$qrcode_SL);
$qrcode 	= mysqli_fetch_array($qrcode_QR);

@unlink("../Files/qrcode_photo/".$qrcode['qrcode_photo']);

$qrcode_Del ="DELETE FROM `qrcode` WHERE qrcode_id = '$qrcode_id' ";
$qrcode_Qurey  = mysqli_query($con,$qrcode_Del);

if($qrcode_Qurey) {
	echo"<script>  window.location='qrcode.php?DELETE'; </script>";
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
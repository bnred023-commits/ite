<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[store_photos_id])){
	$_SESSION[store_photos_id] =  $_GET[store_photos_id];
}
$store_photos_id =   $_SESSION[store_photos_id] ;

$store_photos_SL = " SELECT * FROM store_photos WHERE store_photos_id = '$store_photos_id'";
$store_photos_QR = mysqli_query($con,$store_photos_SL);
$store_photos 	= mysqli_fetch_array($store_photos_QR);

@unlink("../Files/store_photos_img/".$store_photos['store_photos_img']);

$store_photos_Del ="DELETE FROM `store_photos` WHERE store_photos_id = '$store_photos_id' ";
$store_photos_Qurey  = mysqli_query($con,$store_photos_Del);

$Historylog      = " INSERT INTO `Historylog` ( HistorylogDate,  HistorylogTime , HistorylogIP, HistorylogAgent, Historyloglanguage, HistorylogActivities, admin_id, admin_name ) VALUES (NOW(), NOW(),'$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]','store_photos Del ','$_SESSION[admin_id]','$LoginData[admin_name]')";
$HistorylogQuery = mysqli_query($con,$Historylog);

if($store_photos_Qurey) 
{
	echo"<script>  window.location='store_photos.php?DELETE'; </script>";
}
else
{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'index_link.php'; ?>
</head>
<body>

</body>
</html>
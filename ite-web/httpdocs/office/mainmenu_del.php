<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[mainmenu_id])){
	$_SESSION[mainmenu_id] =  $_GET[mainmenu_id];
}
$mainmenu_id =   $_SESSION[mainmenu_id] ;


$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$mainmenu_id'";
$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
$mainmenu 	= mysqli_fetch_array($mainmenu_QR);

@unlink("../Files/mainmenu_photo/".$mainmenu['mainmenu_photo']);
@unlink("../Files/mainmenu_min/".$mainmenu['mainmenu_photo']);

@unlink("../Files/mainmenu_cover/".$mainmenu['mainmenu_cover']);

$mainmenu_picture_SL = " SELECT * FROM mainmenu_picture WHERE mainmenu_id = '$mainmenu_id'";
$mainmenu_picture_QR = mysqli_query($con,$mainmenu_picture_SL);
while ($mainmenu_picture 	= mysqli_fetch_array($mainmenu_picture_QR)) {
	@unlink("../Files/mainmenu_picture_photo/".$mainmenu_picture['mainmenu_picture_photo']);
}

$mainmenu_picture_Del ="DELETE FROM `mainmenu_picture` WHERE mainmenu_id = '$mainmenu_id' ";
$mainmenu_picture_Qurey  = mysqli_query($con,$mainmenu_picture_Del);

$Historylog      = " INSERT INTO `Historylog` ( HistorylogDate,  HistorylogTime , HistorylogIP, HistorylogAgent, Historyloglanguage, Historylogmainmenu, admin_id, admin_name ) VALUES (NOW(), NOW(),'$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]','mainmenu_del  $mainmenu[mainmenu_name]','$_SESSION[admin_id]','$LoginData[admin_name]')";
$HistorylogQuery = mysqli_query($con,$Historylog);

$mainmenu_del ="DELETE FROM `mainmenu` WHERE mainmenu_id = '$mainmenu_id' ";
$mainmenu_Qurey  = mysqli_query($con,$mainmenu_del);

if($mainmenu_Qurey) {
	echo"<script>  window.location='mainmenu.php?DELETE'; </script>";
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
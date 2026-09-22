<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[web_content_id])){
	$_SESSION[web_content_id] =  $_GET[web_content_id];
}
$web_content_id =   $_SESSION[web_content_id] ;


$web_content_SL = " SELECT * FROM web_content WHERE web_content_id = '$web_content_id'";
$web_content_QR = mysqli_query($con,$web_content_SL);
$web_content 	= mysqli_fetch_array($web_content_QR);

@unlink("../Files/web_content_photo/".$web_content['web_content_photo']);
@unlink("../Files/web_content_min/".$web_content['web_content_photo']);

$web_content_picture_SL = " SELECT * FROM web_content_picture WHERE web_content_id = '$web_content_id'";
$web_content_picture_QR = mysqli_query($con,$web_content_picture_SL);
while ($web_content_picture 	= mysqli_fetch_array($web_content_picture_QR)) {
	@unlink("../Files/web_content_picture_photo/".$web_content_picture['web_content_picture_photo']);
}

$web_content_picture_Del ="DELETE FROM `web_content_picture` WHERE web_content_id = '$web_content_id' ";
$web_content_picture_Qurey  = mysqli_query($con,$web_content_picture_Del);


$web_content_del ="DELETE FROM `web_content` WHERE web_content_id = '$web_content_id' ";
$web_content_Qurey  = mysqli_query($con,$web_content_del);

if($web_content_Qurey) {
	echo"<script>  window.location='web_content.php?DELETE'; </script>";
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
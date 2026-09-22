<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[suggestion_id])){
	$_SESSION[suggestion_id] =  $_GET[suggestion_id];
}
$suggestion_id =   $_SESSION[suggestion_id] ;


$suggestion_SL = " SELECT * FROM suggestion WHERE suggestion_id = '$suggestion_id'";
$suggestion_QR = mysqli_query($con,$suggestion_SL);
$suggestion 	= mysqli_fetch_array($suggestion_QR);

@unlink("../Files/suggestion_photo/".$suggestion['suggestion_photo']);
@unlink("../Files/suggestion_min/".$suggestion['suggestion_photo']);

$suggestion_picture_SL = " SELECT * FROM suggestion_picture WHERE suggestion_id = '$suggestion_id'";
$suggestion_picture_QR = mysqli_query($con,$suggestion_picture_SL);
while ($suggestion_picture 	= mysqli_fetch_array($suggestion_picture_QR)) {
	@unlink("../Files/suggestion_picture_photo/".$suggestion_picture['suggestion_picture_photo']);
}

$suggestion_picture_Del ="DELETE FROM `suggestion_picture` WHERE suggestion_id = '$suggestion_id' ";
$suggestion_picture_Qurey  = mysqli_query($con,$suggestion_picture_Del);


$suggestion_del ="DELETE FROM `suggestion` WHERE suggestion_id = '$suggestion_id' ";
$suggestion_Qurey  = mysqli_query($con,$suggestion_del);

if($suggestion_Qurey) {
	echo"<script>  window.location='suggestion.php?DELETE'; </script>";
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
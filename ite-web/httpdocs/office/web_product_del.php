<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[web_product_id])){
	$_SESSION[web_product_id] =  $_GET[web_product_id];
}
$web_product_id =   $_SESSION[web_product_id] ;


$web_product_SL = " SELECT * FROM web_product WHERE web_product_id = '$web_product_id'";
$web_product_QR = mysqli_query($con,$web_product_SL);
$web_product 	= mysqli_fetch_array($web_product_QR);

@unlink("../Files/web_product_photo/".$web_product['web_product_photo']);
@unlink("../Files/web_product_min/".$web_product['web_product_photo']);

$web_product_picture_SL = " SELECT * FROM web_product_picture WHERE web_product_id = '$web_product_id'";
$web_product_picture_QR = mysqli_query($con,$web_product_picture_SL);
while ($web_product_picture 	= mysqli_fetch_array($web_product_picture_QR)) {
	@unlink("../Files/web_product_picture_photo/".$web_product_picture['web_product_picture_photo']);
}

$web_product_picture_Del ="DELETE FROM `web_product_picture` WHERE web_product_id = '$web_product_id' ";
$web_product_picture_Qurey  = mysqli_query($con,$web_product_picture_Del);


$web_product_del ="DELETE FROM `web_product` WHERE web_product_id = '$web_product_id' ";
$web_product_Qurey  = mysqli_query($con,$web_product_del);

if($web_product_Qurey) {
	echo"<script>  window.location='web_product.php?DELETE'; </script>";
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
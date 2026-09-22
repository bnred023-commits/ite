<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[product_id])){
	$_SESSION[product_id] =  $_GET[product_id];
}
$product_id =   $_SESSION[product_id];

$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
$product_QR = mysqli_query($con,$product_SL);
$product 	= mysqli_fetch_array($product_QR);


// $FloorplanPicture_SL = " SELECT * FROM Floorplan WHERE product_id = '$product_id'";
// $FloorplanPicture_QR = mysqli_query($con,$FloorplanPicture_SL);
// while ($FloorplanPicture 	= mysqli_fetch_array($FloorplanPicture_QR)) {
// 	@unlink("../Files/Floorplanpicture_photo/".$FloorplanPicture['Floorplanpicture_photo']);
// }
// $FloorplanPicture_Del ="DELETE FROM Floorplan WHERE product_id = '$product_id' ";
// $FloorplanPicture_Qurey  = mysqli_query($con,$FloorplanPicture_Del);

$product_picture_SL = " SELECT * FROM product_picture WHERE product_id = '$product_id'";
$product_picture_QR = mysqli_query($con,$product_picture_SL);
while ($product_picture 	= mysqli_fetch_array($product_picture_QR)) {
	@unlink("../Files/product_picture_photo/".$product_picture['product_picture_photo']);
}
$product_picture_Del ="DELETE FROM `product_picture` WHERE product_id = '$product_id' ";
$product_picture_Qurey  = mysqli_query($con,$product_picture_Del);

// @unlink("../Files/productCoverPage/".$product['productCoverPage']);
// $productCoverPage_Del ="DELETE FROM `productCoverPage` WHERE product_id = '$product_id' ";
// $productCoverPage_Qurey  = mysqli_query($con,$productCoverPage_Del);

@unlink("../Files/product_photo/".$product['product_photo']);
@unlink("../Files/product_min/".$product['product_photo']);
$product_Del ="DELETE FROM `product` WHERE product_id = '$product_id' ";
$product_Qurey  = mysqli_query($con,$product_Del);


$Specification_SL = " SELECT * FROM Specification WHERE SpecificationCode = 'product_id$product_id'";
$Specification_QR = mysqli_query($con,$Specification_SL);
while ($Specification 	= mysqli_fetch_array($Specification_QR)) {
	@unlink("../Files/SpecificationPhoto/".$Specification['SpecificationPhoto']);
}
$Specification_Del ="DELETE FROM `Specification` WHERE SpecificationCode = 'product_id$product_id' ";
$Specification_Qurey  = mysqli_query($con,$Specification_Del);

if($product_Qurey) {


	$Historylog      = " INSERT INTO `Historylog` ( HistorylogDate,  HistorylogTime , HistorylogIP, HistorylogAgent, Historyloglanguage, HistorylogActivities, admin_id, admin_name ) VALUES (NOW(), NOW(),'$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]','product_Del $product[product_name] ','$_SESSION[admin_id]','$LoginData[admin_name]')";
	$HistorylogQuery = mysqli_query($con,$Historylog);

	echo"<script>  window.location='product.php?DELETE'; </script>";
}
else{
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
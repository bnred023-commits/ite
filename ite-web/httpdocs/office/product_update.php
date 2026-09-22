<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'product.php';

if (isset($_GET[product_id])){
	$_SESSION[product_id] =  $_GET[product_id];
}
$product_id =   $_SESSION[product_id] ;

$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
$product_QR = mysqli_query($con,$product_SL);
$product 	= mysqli_fetch_array($product_QR);

if ($_POST['productUpdate']) {

	$product_name = function_teeth($_POST['product_name']);
	if (isset($_POST['product_price'])&&trim($_POST['product_price'])!='') {
		$product_price = $_POST['product_price'];
	}
	else{
		$product_price = 0;
	}
	$catalog_id = function_teeth($_POST['catalog_id']);
	$product_detail = function_teeth($_POST['product_detail']);
	$product_review = function_review($_POST['product_review']);

	
	$product_Update = "UPDATE `product` SET `product_datetime` = NOW(),
	`product_name` = '$product_name',
	`product_price` = '$product_price',
	`product_detail` = '$product_detail',
	`catalog_id` = '$catalog_id',
	`product_review` = '$product_review' WHERE `product_id` = '$product_id'";
	$product_Reult = mysqli_query($con,$product_Update);

	if (!$product_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if($_FILES['product_photo']['name']!=''){
		$suffix = strrchr($_FILES["product_photo"]["name"],".");
		suffix($suffix);
		
		@unlink("../Files/product_photo/".$product['product_photo']);
		@unlink("../Files/product_min/".$product['product_photo']);
		$suffix = strrchr($_FILES["product_photo"]["name"],".");
		$product_photo = rand().$suffix;
		$upload = move_uploaded_file($_FILES["product_photo"]["tmp_name"],"../Files/product_photo/".$product_photo);
		$product_photo_Update = "UPDATE `product` SET `product_photo` = '$product_photo' WHERE `product_id` = '$_SESSION[product_id]'";
		$product_photo_Reult = mysqli_query($con,$product_photo_Update);
		$table =  'product';
		min_resize($product_photo,$table);
	}
	if ($product_Reult) {
		echo"<script>   window.location='product_one.php?UPDATE'; </script>";
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navbar.php'; ?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="main-left">
				<div class="row">
					<div class="col-md-12">
						<? include 'index_AdminMenu.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3>  แก้ไข สินค้า : <span class="text-primary bold"> <?php echo $product[product_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="product_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "สินค้า" ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-2" > รูป  สินค้า   </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="product_photo" >
										</div>
										<label class="control-label col-md-2 text-left" > รูปใหม่ที่ต้องการเปลี่ยน </label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ชื่อสินค้า  <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input placeholder="ชื่อสินค้า" id="product_name" type="text" class="form-control" value="<? echo $product[product_name]; ?>" name="product_name"  required >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ประเภทสินค้า  </label>
										<div class="col-md-6">
											<select class="form-control"   name="catalog_id" >
												<?
												$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$product[catalog_id]'";
												$catalog_QR = mysqli_query($con,$catalog_SL);
												$catalog 	= mysqli_fetch_array($catalog_QR);

												if (!isset($catalog[catalog_id])||$catalog[catalog_id]=='') {
													?>
													<option value="0"> -- </option>
													<?
												}
												else{
													?>
													<option value="<?php echo $catalog[catalog_id]; ?>"><? echo $catalog[catalog_name]; ?></option>
													<?
												}
												$catalog_SL = " SELECT * FROM catalog WHERE catalog_id != '$product[catalog_id]' ORDER BY catalog_id ASC";
												$catalog_QR 	= mysqli_query($con,$catalog_SL);
												while ($catalog 	= mysqli_fetch_array($catalog_QR)) {
													?>
													<option value="<?php echo $catalog[catalog_id]; ?>"><?php echo $catalog[catalog_name]; ?></option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ราคา  </label>
										<div class="col-md-6">
											<input type="text"   class="form-control"  name="product_price" value="<? echo $product[product_price]; ?>" placeholder="เฉพาะตัวเลข">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea  placeholder="รายละเอียดเบื้องต้น" id="product_detail" class="form-control" rows="4" name="product_detail" ><? echo $product[product_detail]; ?></textarea>
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-6">
											<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="productUpdate" value="x">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหา
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="product_review"><? echo $product[product_review]; ?></textarea>
								</div>
							</div>	
						</form>
					</div>
					<!-- 12 -->
				</div>
				<!-- row -->
			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>
</html>



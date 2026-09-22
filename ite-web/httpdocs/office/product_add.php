<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'product.php';

if ($_POST['product_Add']) {

	$product_name = function_teeth($_POST['product_name']);
	$catalog_id = function_review($_POST['catalog_id']);
	if (isset($_POST['product_price'])&&trim($_POST['product_price'])!='') {
		$product_price = $_POST['product_price'];
	}
	else{
		$product_price = 0;
	}

	$product_detail = function_teeth($_POST['product_detail']);
	$product_review = function_review($_POST['product_review']);

	$product_page = rand();
	$product_Add = "INSERT INTO `product` (`product_price`,`catalog_id`,`product_page`,`product_name`, `product_detail`,`product_review`,`product_datetime`,`product_date`,`product_time`)
	VALUES('$product_price','$catalog_id','$product_page','$product_name','$product_detail','$product_review',now(),now(),now())";

	$product_Reult = mysqli_query($con,$product_Add);
	$_SESSION[product_id] = mysqli_insert_id($con);

	if (!$product_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด หรือ ลิ้งเพจซ้ำ'); window.history.back(); </script>";
	}
	if ($product_Reult) {

		$product_SL = " SELECT * FROM product WHERE product_id = '$_SESSION[product_id]'";
		$product_QR = mysqli_query($con,$product_SL);
		$product 	= mysqli_fetch_array($product_QR);

		if($_FILES['product_photo']['name']!=''){
			$suffix = strrchr($_FILES["product_photo"]["name"],".");
			$product_photo = rand().$suffix;
			$upload = move_uploaded_file($_FILES["product_photo"]["tmp_name"],"../Files/product_photo/".$product_photo);
			$product_photo_Update = "UPDATE `product` SET `product_photo` = '$product_photo' WHERE `product_id` = '$_SESSION[product_id]'";
			$product_photo_Reult = mysqli_query($con,$product_photo_Update);
			$table =  'product';
			min_resize($product_photo,$table);
		}
		if(isset($_FILES['product_picture_photo']['name'])&&$_FILES['product_picture_photo']['name']!=''){
			$Count = count($_FILES['product_picture_photo']['name']);
			for ($i=0; $i < $Count; $i++) { 
				$suffix = strrchr($_FILES["product_picture_photo"]["name"][$i],".");
				$product_picture_photo = rand().rand().$suffix;
				if(move_uploaded_file($_FILES["product_picture_photo"]["tmp_name"][$i],"../Files/product_picture_photo/".$product_picture_photo)){
					$product_picture_Add = "INSERT INTO `product_picture` (`product_id`,`product_picture_photo`) VALUES ('$_SESSION[product_id]','$product_picture_photo')";
					$product_picture_Reult = mysqli_query($con,$product_picture_Add);
					if (!$product_picture_Reult) {
						echo"<script>alert('Error product_picture'); window.history.back(); </script>";
					}
				}
			}
		}
		echo"<script>  window.location='product_one.php?INSERT'; </script>";
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
						<h3>  เพิ่ม  สินค้า    </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="product.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " สินค้า " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-2" > รูป  สินค้า  <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="product_photo"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ชื่อ สินค้า   <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="product_name" type="text" class="form-control"  name="product_name"  required  placeholder="ชื่อ สินค้า">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ประเภทสินค้า   </label>
										<div class="col-md-6">
											<select class="form-control"  name="catalog_id" >
												<option value="0"> -- </option>
												<?
												$catalog_SL = " SELECT * FROM catalog  ORDER BY catalog_id ASC";
												$catalog_QR 	= mysqli_query($con,$catalog_SL);
												while ($catalog 	= mysqli_fetch_array($catalog_QR)) {
													?>
													<option value="<?php echo $catalog[catalog_id]; ?>"><?php echo $catalog[catalog_name]; ?>  </option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ราคา  </label>
										<div class="col-md-6">
											<input type="number"  class="form-control"  name="product_price" placeholder="เฉพาะตัวเลข">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > รายละเอียดเบื้องต้น  </label>
										<div class="col-md-6">
											<textarea id="product_detail" class="form-control" rows="4" name="product_detail" placeholder="รายละเอียดเบื้องต้น" ></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > รูปภาพเพิ่มเติม  </label>
										<div class="col-md-6">
											<input type="file"  class="form-control" multiple="multiple" name="product_picture_photo[]">
										</div>
										<label class="control-label col-md-2 text-left" >
											สามารถเพิ่มได้ภายหลัง
										</label>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="product_Add" value="x">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหา
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="product_review"></textarea>
								</div>
							</div>
							<button Type="submit"  class="btn btn-success br-margin2">
								<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
							</button>
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



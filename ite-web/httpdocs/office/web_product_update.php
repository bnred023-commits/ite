<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'web_product.php';

if (isset($_GET[web_product_id])){
	$_SESSION[web_product_id] =  $_GET[web_product_id];
}
$web_product_id =   $_SESSION[web_product_id] ;

$web_product_SL = " SELECT * FROM web_product WHERE web_product_id = '$web_product_id'";
$web_product_QR = mysqli_query($con,$web_product_SL);
$web_product 	= mysqli_fetch_array($web_product_QR);

if ($_POST['web_productUpdate']) {

	$catalog_id = trim($_POST['catalog_id']);
	$web_product_price = trim($_POST['web_product_price']);

	$web_product_name = function_teeth($_POST['web_product_name']);
	$web_product_eng_name = function_teeth($_POST['web_product_eng_name']);
	$web_product_detail = function_teeth($_POST['web_product_detail']);
	$web_product_eng_detail = function_teeth($_POST['web_product_eng_detail']);
	$web_product_review = function_review($_POST['web_product_review']);
	$web_product_eng_review = function_review($_POST['web_product_eng_review']);
	$web_product_guide = function_review($_POST['web_product_guide']);

	$web_product_Update = "UPDATE `web_product` SET `web_product_datetime` = NOW(),
	`highlight_name` = '$highlight_name',
	`web_product_name` = '$web_product_name',`web_product_price` = '$web_product_price',`catalog_id` = '$catalog_id',
	`web_product_eng_name` = '$web_product_eng_name',
	`web_product_detail` = '$web_product_detail',
	`web_product_eng_detail` = '$web_product_eng_detail',
	`web_product_eng_review` = '$web_product_eng_review',
	`web_product_guide` = '$web_product_guide',
	`web_product_review` = '$web_product_review' WHERE `web_product_id` = '$web_product_id'";
	$web_product_Reult = mysqli_query($con,$web_product_Update);

	if (!$web_product_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['web_product_photo']['name']!=''){
		$suffix = strrchr($_FILES["web_product_photo"]["name"],".");
		suffix($suffix);
		@unlink("../Files/web_product_photo/".$web_product['web_product_photo']);
		@unlink("../Files/web_product_min/".$web_product['web_product_photo']);
		$suffix = strrchr($_FILES["web_product_photo"]["name"],".");
		$web_product_photo = rand().$suffix;
		$upload = move_uploaded_file($_FILES["web_product_photo"]["tmp_name"],"../Files/web_product_photo/".$web_product_photo);
		$web_product_photo_Update = "UPDATE `web_product` SET `web_product_photo` = '$web_product_photo' WHERE `web_product_id` = '$_SESSION[web_product_id]'";
		$web_product_photo_Reult = mysqli_query($con,$web_product_photo_Update);
		$table =  'web_product';
		min_resize($web_product_photo,$table);
	}
	if($_FILES['web_product_cover']['name']!=''){
		$suffix = strrchr($_FILES["web_product_cover"]["name"],".");
		suffix($suffix);
		@unlink("../Files/web_product_cover/".$web_product['web_product_cover']);
		@unlink("../Files/web_product_min/".$web_product['web_product_cover']);
		$suffix = strrchr($_FILES["web_product_cover"]["name"],".");
		$web_product_cover = rand().$suffix;
		$upload = move_uploaded_file($_FILES["web_product_cover"]["tmp_name"],"../Files/web_product_cover/".$web_product_cover);
		$web_product_cover_Update = "UPDATE `web_product` SET `web_product_cover` = '$web_product_cover' WHERE `web_product_id` = '$_SESSION[web_product_id]'";
		$web_product_cover_Reult = mysqli_query($con,$web_product_cover_Update);
	}

	if ($web_product_Reult) {
		echo"<script>   window.location='web_product_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไขผลิตภัณฑ์   : <span class="text-primary bold"> <?php echo $web_product[web_product_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="web_product_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " ผลิตภัณฑ์ " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > เมนูหลัก  </label>
										<div class="col-md-6">
											<select class="form-control"   name="mainmenu_id" >
												<?
												$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$web_product[mainmenu_id]'  ORDER BY mainmenu_sort ASC";
												$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
												$mainmenu 	= mysqli_fetch_array($mainmenu_QR);

												if (!isset($mainmenu[mainmenu_id])||$mainmenu[mainmenu_id]=='') {
													?>
													<option value=""> -- </option>
													<?
												}
												else{
													?>
													<option value="<?php echo $mainmenu[mainmenu_id]; ?>"><? echo $mainmenu[mainmenu_name]; ?></option>
													<?
												}
												$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id != '$web_product[mainmenu_id]' ORDER BY mainmenu_sort ASC ";
												$mainmenu_QR 	= mysqli_query($con,$mainmenu_SL);
												while ($mainmenu 	= mysqli_fetch_array($mainmenu_QR)) {
													?>
													<option value="<?php echo $mainmenu[mainmenu_id]; ?>"><?php echo $mainmenu[mainmenu_name]; ?></option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อผลิตภัณฑ์ <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="web_product_name" type="text" class="form-control" value="<? echo $web_product[web_product_name]; ?>" name="web_product_name"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > หมวดหมู่  </label>
										<div class="col-md-6">
											<select class="form-control"   name="catalog_id" >
												<?
												$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$web_product[catalog_id]'  ORDER BY catalog_sort ASC";
												$catalog_QR = mysqli_query($con,$catalog_SL);
												$catalog 	= mysqli_fetch_array($catalog_QR);

												if (!isset($catalog[catalog_id])||$catalog[catalog_id]=='') {
													?>
													<option value=""> -- </option>
													<?
												}
												else{
													?>
													<option value="<?php echo $catalog[catalog_id]; ?>"><? echo $catalog[catalog_name]; ?></option>
													<?
												}
												$catalog_SL = " SELECT * FROM catalog WHERE catalog_id != '$web_product[catalog_id]' ORDER BY catalog_sort ASC ";
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
										<label class="control-label col-md-3" > ราคา </label>
										<div class="col-md-6">
											<input id="web_product_price" type="number" class="form-control"  name="web_product_price"  value="<? echo $web_product[web_product_price]; ?>"  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูป cover แนวยาว </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="web_product_cover"  >
										</div>
										<label class="control-label col-md-3 text-left" >
											รูปที่จะนำมาแทนรูปเดิม
										</label>
									</div>
									<div class="form-group"> 
										<label class="control-label col-md-3" > รูปเนื้อหา   </label>
										<div class="col-md-6">
											<input type="file"  class="form-control"  name="web_product_photo">
										</div>
										<label class="control-label col-md-3 text-left" >
											รูปที่จะนำมาแทนรูปเดิม
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="web_product_detail" class="form-control" rows="4" name="web_product_detail"><? echo $web_product[web_product_detail]; ?></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหาทั้งหมด 
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="web_product_review">
										<? echo $web_product[web_product_review]; ?>
									</textarea>
								</div>
							</div>	
							<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info" style="margin: 15px 0px;">
								<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
							</button>
							<input type="hidden" name="web_productUpdate" value="x">
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



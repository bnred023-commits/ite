<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'web_product.php';

if ($_POST['web_product_Add']) {



	$mainmenu_id = function_review($_POST['mainmenu_id']);
	$web_product_guide = function_review($_POST['web_product_guide']);
	$web_product_name = function_teeth($_POST['web_product_name']);
	$web_product_eng_name = function_teeth($_POST['web_product_eng_name']);
	$web_product_detail = function_teeth($_POST['web_product_detail']);
	$web_product_eng_detail = function_teeth($_POST['web_product_eng_detail']);
	$web_product_review = function_review($_POST['web_product_review']);
	$web_product_eng_review = function_review($_POST['web_product_eng_review']);

	if (empty($_POST['web_product_price'])) {
		$web_product_price = 0;
	} else {
		$web_product_price = trim($_POST['web_product_price']);
	}

	if (empty($_POST['catalog_id'])) {
		$catalog_id = 0;
	} else {
		$catalog_id = trim($_POST['catalog_id']);
	}

	$highlight_name = " ";
	for($i=0;$i<count($_POST["highlight_name"]);$i++){
		if(trim($_POST["highlight_name"][$i]) != ""){
			$highlight_name .= $_POST["highlight_name"][$i];
			if ($i<count($_POST["highlight_name"])-1) {
				$highlight_name .= " , ";
			}
			
		}
	}

	$web_product_photo = '';
	$web_product_page = uniqid();

	$web_product_Add = "INSERT INTO `web_product` (`web_product_price`,`catalog_id`,`mainmenu_id`,`highlight_name`,`web_product_page`,`web_product_name`,`web_product_guide`,`web_product_eng_name`, `web_product_detail`,`web_product_eng_detail`, `web_product_photo`,`web_product_review`,`web_product_eng_review`,`web_product_datetime`,`web_product_date`,`web_product_time`)
	VALUES('$web_product_price','$catalog_id','$mainmenu_id','$highlight_name','$web_product_page','$web_product_name','$web_product_guide','$web_product_eng_name','$web_product_detail','$web_product_eng_detail','$web_product_photo','$web_product_review','$web_product_eng_review',now(),now(),now())";
	$web_product_Reult = mysqli_query($con,$web_product_Add);
	$_SESSION[web_product_id] = mysqli_insert_id($con);
	if (!$web_product_Reult) {
		

		echo"<script> alert('เกิดข้อผิดพลาด หรือ ลิ้งเพจซ้ำ');  </script>";

		echo $web_product_Add;
		die("<br>Error: " . mysqli_error($con));
	}
	if ($web_product_Reult) {

		$web_product_SL = " SELECT * FROM web_product WHERE web_product_id = '$_SESSION[web_product_id]'";
		$web_product_QR = mysqli_query($con,$web_product_SL);
		$web_product 	= mysqli_fetch_array($web_product_QR);

		if($_FILES['web_product_photo']['name']!=''){
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
			$web_product_cover = rand().$suffix;
			$upload = move_uploaded_file($_FILES["web_product_cover"]["tmp_name"],"../Files/web_product_cover/".$web_product_cover);
			$web_product_cover_Update = "UPDATE `web_product` SET `web_product_cover` = '$web_product_cover' WHERE `web_product_id` = '$_SESSION[web_product_id]'";
			$web_product_cover_Reult = mysqli_query($con,$web_product_cover_Update);
		}
		
		if(isset($_FILES['web_product_picture_photo']['name'])&&$_FILES['web_product_picture_photo']['name']!=''){
			$Count = count($_FILES['web_product_picture_photo']['name']);
			for ($i=0; $i < $Count; $i++) { 
				$suffix = strrchr($_FILES["web_product_picture_photo"]["name"][$i],".");
				$web_product_picture_photo = rand().rand().$suffix;
				if(move_uploaded_file($_FILES["web_product_picture_photo"]["tmp_name"][$i],"../Files/web_product_picture_photo/".$web_product_picture_photo)){
					$web_product_picture_Add = "INSERT INTO `web_product_picture` (`web_product_id`,`web_product_picture_photo`) VALUES ('$_SESSION[web_product_id]','$web_product_picture_photo')";
					$web_product_picture_Reult = mysqli_query($con,$web_product_picture_Add);
					if (!$web_product_picture_Reult) {
						echo"<script>alert('Error web_product_picture'); window.history.back(); </script>";
					}
				}
			}
		}
		

		echo"<script>  window.location='web_product_one.php?INSERT'; </script>";
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
						<h3>  เพิ่ม    ผลิตภัณฑ์      </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="web_product.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "   ผลิตภัณฑ์   " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > เมนูหลัก </label>
										<div class="col-md-6">
											<select class="form-control"  name="mainmenu_id" >
												<?
												if ($_GET['mainmenu_id']) {
													$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
													$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
													$mainmenu 	= mysqli_fetch_array($mainmenu_QR);
													?>
													<option value="<?php echo $_GET[mainmenu_id]; ?>">  <?php echo $mainmenu[mainmenu_name]; ?>   </option>
													<?
												}
												?>
												<option> --- </option>
												<?
												$mainmenu_SL = " SELECT * FROM mainmenu  ORDER BY mainmenu_sort ASC";
												$mainmenu_QR 	= mysqli_query($con,$mainmenu_SL);
												while ($mainmenu 	= mysqli_fetch_array($mainmenu_QR)) {
													?>
													<option value="<?php echo $mainmenu[mainmenu_id]; ?>"><?php echo $mainmenu[mainmenu_name]; ?>  </option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อผลิตภัณฑ์     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="web_product_name" type="text" class="form-control"  name="web_product_name"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > หมวดหมู่ </label>
										<div class="col-md-6">
											<select class="form-control"  name="catalog_id" >
												<option value=""> -- </option>
												<?
												$catalog_SL = " SELECT * FROM catalog  ORDER BY catalog_sort ASC";
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
										<label class="control-label col-md-3" > ราคา </label>
										<div class="col-md-6">
											<input id="web_product_price" type="number" class="form-control"  name="web_product_price"    >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูป cover แนวยาว </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="web_product_cover"  >
										</div>
										<label class="control-label col-md-3 text-left" >
											ภาพด้านบนสุดแนวยาว
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูปเนื้อหา  </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="web_product_photo"  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูปภาพเพิ่มเติม  </label>
										<div class="col-md-6">
											<input type="file"  class="form-control" multiple="multiple" name="web_product_picture_photo[]">
										</div>
										<label class="control-label col-md-3 text-left" >
											สามารถเพิ่มได้ภายหลัง
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="web_product_detail" class="form-control" rows="4" name="web_product_detail"  placeholder="ผลิตภัณฑ์แนะนำ ผลิตภัณฑ์" ></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหาทั้งหมด 
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="web_product_review"></textarea>
								</div>
							</div>
							<div class="row" >
								<div class="col-md-12">
									<button Type="submit"  class="btn btn-success">
										<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
									</button>
									<input Type="hidden" name="web_product_Add" value="x">
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



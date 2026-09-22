<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'product.php';

if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
$page =   $_SESSION[numpage];

if (isset($_GET[product_id])){
	$_SESSION[product_id] =  $_GET[product_id];
}
$product_id =   $_SESSION[product_id] ;

$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
$product_QR = mysqli_query($con,$product_SL);
$product 	= mysqli_fetch_array($product_QR);

if ($_POST['productUpdate']) {
	if($_FILES['product_photo']['name']!=''){
		@unlink("../Files/product_photo/".$product['product_photo']);
		@unlink("../Files/product_min/".$product['product_photo']);
		$suffix = strrchr($_FILES["product_photo"]["name"],".");
		$product_photo = $product[product_page].rand().$suffix;
		$upload = move_uploaded_file($_FILES["product_photo"]["tmp_name"],"../Files/product_photo/".$product_photo);
		$product_photo_Update = "UPDATE `product` SET `product_photo` = '$product_photo' WHERE `product_id` = '$_SESSION[product_id]'";
		$product_photo_Reult = mysqli_query($con,$product_photo_Update);
		$table =  'product';
		min_resize($product_photo,$table);
		if (!$product_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($product_photo_Reult) {
			echo"<script>   window.location='product_one.php?UPDATE'; </script>";
		}
	}
}
if ($_POST['product_pictureAdd']) {
	if(isset($_FILES['product_picture_photo']['name'])&&$_FILES['product_picture_photo']['name']!=''){
		$Count = count($_FILES['product_picture_photo']['name']);
		for ($i=0; $i < $Count; $i++) { 
			$product_picture_photo = rand().$_FILES["product_picture_photo"]["name"][$i];
			if(move_uploaded_file($_FILES["product_picture_photo"]["tmp_name"][$i],"../Files/product_picture_photo/".$product_picture_photo)){
				$product_picture_Add = "INSERT INTO `product_picture` (`product_id`,`product_picture_photo`) VALUES ('$product_id','$product_picture_photo')";
				$product_picture_Reult = mysqli_query($con,$product_picture_Add);
				if (!$product_picture_Reult) {
					echo"<script>alert('Error product_picture'); window.history.back(); </script>";
				}
			}
			else{
				echo"<script>alert('Error move_uploaded_file'); window.history.back(); </script>";
			}
		}
		echo"<script>  window.location='product_one.php?INSERT'; </script>";
	}
}
if ($_GET['product_pictureDel']) {
	$product_picture_id =   $_GET[product_picture_id];
	$product_picture_SL = " SELECT * FROM product_picture WHERE product_picture_id = '$product_picture_id'";
	$product_picture_QR = mysqli_query($con,$product_picture_SL);
	$product_picture 	= mysqli_fetch_array($product_picture_QR);
	@unlink("../Files/product_picture_photo/".$product_picture['product_picture_photo']);
	$product_picture_Del ="DELETE FROM `product_picture` WHERE product_picture_id = '$product_picture_id' ";
	$product_picture_Qurey  = mysqli_query($con,$product_picture_Del);

	if($product_picture_Qurey) {
		echo"<script>  window.location='product_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}



if ($_POST['add_gallery']) {
	$gallery_photo = $_FILES['gallery_photo']['name'];
	$gallery_video = $_FILES['gallery_video']['name'];
	$gallery_youtube = function_youtube($_POST['gallery_youtube']);
	$gallery_facebook = $_POST['gallery_facebook'];
	$gallery_review = function_review($_POST['gallery_review']);
	$gallery_link = function_link($_POST['gallery_link']);
	$gallery_download = $_FILES['gallery_download']['name'];
	if (  trim($gallery_photo)==''   &&  trim($gallery_video)==''   && trim($gallery_review)==''  &&  trim($gallery_youtube)==''  &&  trim($gallery_facebook)==''   &&  trim($gallery_link)==''   &&  trim($gallery_download)==''  ) {
		echo"  <script>alert('กรุณากรอกอย่างใดอย่างหนึ่ง '); window.location='product_one.php?#gallery';  </script>";
	}
	else{
		$gallery_Add = "INSERT INTO `gallery` (`gallery_link`,`gallery_review`,`gallery_youtube`,`gallery_facebook`,`gallery_code`) 
		VALUES ('$gallery_link','$gallery_review','$gallery_youtube','$gallery_facebook','product_id$product_id')";
		$gallery_Reult = mysqli_query($con,$gallery_Add);
		$_SESSION[gallery_id] = mysqli_insert_id($con);
		if (!$gallery_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด');  </script>";
		}

		if($_FILES['gallery_photo']['name']!=''){
			$Jpg = strrchr($_FILES["gallery_photo"]["name"],".");
			$gallery_photo = rand().rand().$Jpg;;
			$upload = move_uploaded_file($_FILES["gallery_photo"]["tmp_name"],"../Files/gallery_photo/".$gallery_photo);
			$gallery_photo_Update = "UPDATE `gallery` SET `gallery_photo` = '$gallery_photo' WHERE `gallery_id` = '$_SESSION[gallery_id]'";
			$gallery_photo_Reult = mysqli_query($con,$gallery_photo_Update);
		}
		if($_FILES['gallery_video']['name']!=''){
			$Jpg = strrchr($_FILES["gallery_video"]["name"],".");
			$gallery_video = rand().rand().$Jpg;;
			$upload = move_uploaded_file($_FILES["gallery_video"]["tmp_name"],"../Files/gallery_video/".$gallery_video);
			$gallery_video_Update = "UPDATE `gallery` SET `gallery_video` = '$gallery_video' WHERE `gallery_id` = '$_SESSION[gallery_id]'";
			$gallery_video_Reult = mysqli_query($con,$gallery_video_Update);
		}
		if($_FILES['gallery_download']['name']!=''){
			$Jpg = strrchr($_FILES["gallery_download"]["name"],".");
			$gallery_download = $_FILES["gallery_download"]["name"];
			$upload = move_uploaded_file($_FILES["gallery_download"]["tmp_name"],"../Files/gallery_download/".$gallery_download);
			$gallery_download_Update = "UPDATE `gallery` SET `gallery_download` = '$gallery_download' WHERE `gallery_id` = '$_SESSION[gallery_id]'";
			$gallery_download_Reult = mysqli_query($con,$gallery_download_Update);
		}

		echo"<script>  window.location='product_one.php#gallery".$_SESSION[gallery_id]."'; </script>";
	}
}

if ($_POST['update_gallery']) {
	$gallery_id = $_POST['gallery_id'];
	$gallery_photo = $_FILES['gallery_photo']['name'];
	$gallery_video = $_FILES['gallery_video']['name'];
	$gallery_youtube = function_youtube($_POST['gallery_youtube']);
	$gallery_facebook = $_POST['gallery_facebook'];
	$gallery_review = function_review($_POST['gallery_review']);
	$gallery_link = function_link($_POST['gallery_link']);
	$gallery_download = $_FILES['gallery_download']['name'];
	$gallery_Update = "UPDATE gallery SET gallery_link = '$gallery_link',
	gallery_review = '$gallery_review',
	gallery_youtube = '$gallery_youtube',
	gallery_facebook = '$gallery_facebook' WHERE `gallery_id` = '$gallery_id'";
	$gallery_Reult = mysqli_query($con,$gallery_Update);
	if (!$gallery_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($gallery_Reult) {
		if($_FILES['gallery_photo']['name']!=''){
			$gallery_SL = " SELECT * FROM gallery WHERE gallery_id = '$gallery_id'";
			$gallery_QR = mysqli_query($con,$gallery_SL);
			$gallery 	= mysqli_fetch_array($gallery_QR);
			@unlink("../Files/gallery_photo/".$gallery['gallery_photo']);
			$Jpg = strrchr($_FILES["gallery_photo"]["name"],".");
			$gallery_photo = rand().rand().$Jpg;;
			$upload = move_uploaded_file($_FILES["gallery_photo"]["tmp_name"],"../Files/gallery_photo/".$gallery_photo);
			$gallery_photo_Update = "UPDATE `gallery` SET `gallery_photo` = '$gallery_photo' WHERE `gallery_id` = '$gallery_id'";
			$gallery_photo_Reult = mysqli_query($con,$gallery_photo_Update);
		}
		if($_FILES['gallery_download']['name']!=''){
			$gallery_SL = " SELECT * FROM gallery WHERE gallery_id = '$gallery_id'";
			$gallery_QR = mysqli_query($con,$gallery_SL);
			$gallery 	= mysqli_fetch_array($gallery_QR);
			@unlink("../Files/gallery_download/".$gallery['gallery_download']);
			$Jpg = strrchr($_FILES["gallery_download"]["name"],".");
			$gallery_download = $_FILES["gallery_download"]["name"];
			$upload = move_uploaded_file($_FILES["gallery_download"]["tmp_name"],"../Files/gallery_download/".$gallery_download);
			$gallery_download_Update = "UPDATE `gallery` SET `gallery_download` = '$gallery_download' WHERE `gallery_id` = '$gallery_id'";
			$gallery_download_Reult = mysqli_query($con,$gallery_download_Update);
		}
		if($_FILES['gallery_video']['name']!=''){
			$gallery_SL = " SELECT * FROM gallery WHERE gallery_id = '$gallery_id'";
			$gallery_QR = mysqli_query($con,$gallery_SL);
			$gallery 	= mysqli_fetch_array($gallery_QR);
			@unlink("../Files/gallery_video/".$gallery['gallery_video']);
			$Jpg = strrchr($_FILES["gallery_video"]["name"],".");
			$gallery_video = rand().rand().$Jpg;;
			$upload = move_uploaded_file($_FILES["gallery_video"]["tmp_name"],"../Files/gallery_video/".$gallery_video);
			$gallery_video_Update = "UPDATE `gallery` SET `gallery_video` = '$gallery_video' WHERE `gallery_id` = '$gallery_id'";
			$gallery_video_Reult = mysqli_query($con,$gallery_video_Update);
		}
		echo"<script>  window.location='product_one.php?UPDATE#gallery".$gallery_id."'; </script>";
	}
}
if ($_GET['gallery_del']) {
	$gallery_id =   $_GET[gallery_id];
	$gallery_SL = " SELECT * FROM gallery WHERE gallery_id = '$gallery_id'";
	$gallery_QR = mysqli_query($con,$gallery_SL);
	$gallery 	= mysqli_fetch_array($gallery_QR);
	@unlink("../Files/gallery_photo/".$gallery['gallery_photo']);
	@unlink("../Files/gallery_download/".$gallery['gallery_download']);
	@unlink("../Files/gallery_video/".$gallery['gallery_video']);
	$gallery_Del ="DELETE FROM `gallery` WHERE gallery_id = '$gallery_id' ";
	$gallery_Qurey  = mysqli_query($con,$gallery_Del);
	if($gallery_Qurey) {
		echo"<script>  window.location='product_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
						<h3>   สินค้า  : <span class="text-primary bold"> <?php echo $product[product_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="product.php?page=<? echo $page; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="product_update.php?product_id=<?php echo $product[product_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> แก้ไข</a>
						<a href="product_del.php?product_id=<?php echo $product[product_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดสินค้า :  <span class="text-primary bold"> <?php echo $product[product_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin2">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อ  สินค้า </label>
												<label class="control-label col-md-9 text-left">
													<? echo $product[product_name]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > ประเภทสินค้า  </label>
												<label class="control-label col-md-9 text-left">
													<? 
													$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$product[catalog_id]'";
													$catalog_QR = mysqli_query($con,$catalog_SL);
													$catalog 	= mysqli_fetch_array($catalog_QR);
													if (isset($catalog[catalog_id])&&trim($catalog[catalog_id])!='0') {
														echo $catalog[catalog_name];  
													}
													else{
														echo "-";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >ราคา</label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($product[product_price])&&trim($product[product_price])!=''&&trim($product[product_price])!='0') {
														echo number_format($product[product_price]); 
													}
													else{
														echo "-";
													}
													
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >รายละเอียดเบื้องต้น</label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($product[product_detail])&&trim($product[product_detail])!='') {
														echo $product[product_detail];
													}
													else{
														echo "-";
													}
													
													?>
												</label>
											</div>
										</form>
									</div>
								</div>
								<!-- row -->
							</div>
							<!-- panel body -->
						</div>
						<!-- panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
								เนื้อหา
							</div>
							<div class="panel-body">
								<?php echo $product[product_review]; ?>
							</div>
						</div>
					</div>
					<!-- 12 -->
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> 
								<div class="row">
									<div class="col-md-4">
										จัดการรูปภาพ
									</div>
									<div class="col-md-8 text-right" style="margin: -5px;">
										<button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#productUpdate"> 
											<span class="glyphicon glyphicon-picture"></span>
											แก้ไขรูป 
										</button>
										<button type="button" class="btn btn-sm btn-success " data-toggle="modal" data-target="#product_pictureAdd"> 
											<span class="glyphicon glyphicon-picture"></span>
											เพิ่มรูป
										</button>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<p class="text-muted">
											รูปภาพหลักของ สินค้า
										</p>
									</div>
									<div class="col-md-12 br-margin2">
										<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $product[product_id]; ?>" src="../Files/product_photo/<?php echo $product[product_photo]; ?>"  />
										<div id="myModal" class="w3-modal">
											<span class="zoom-close w3-close">&times;</span>
											<img class="w3-modal-content w3-close" id="img01">
										</div>
										<script>
											var w3modal = document.getElementById("myModal");
											var img = document.getElementById("myImgmain<?php echo $product[product_id]; ?>");
											var modalImg = document.getElementById("img01");
											img.onclick = function(){
												w3modal.style.display = "block";
												modalImg.src = this.src;
											}
											var span = document.getElementsByClassName("w3-close")[0];
											span.onclick = function() { 
												w3modal.style.display = "none";
											}

											window.onclick = function(event) {
												if (event.target == w3modal) {
													w3modal.style.display = "none";
												}
											}
										</script>
									</div>
								</div>
								<div class="row">
									<?
									$product_picture_SL 		= " SELECT * FROM product_picture WHERE product_id = '$product[product_id]'";
									$product_picture_QR 		= mysqli_query($con,$product_picture_SL);
									$product_picture_Row 	= mysqli_num_rows($product_picture_QR);
									if ($product_picture_Row == '0') {
										?>
										<div class="col-md-12">
											<p class="text-muted">
												ยังไม่มีรูปภาพเพิ่มเติม
											</p>
										</div>
										<?
									}
									else{
										?>
										<div class="col-md-12">
											<p class="text-muted">
												รูปภาพเพิ่มเติมของ สินค้า
											</p>
										</div>
										<?
									}
									while ($product_picture 	= mysqli_fetch_array($product_picture_QR)) {
										?>
										<div class="col-md-6">
											<div class="thumbnail">
												<div class="img80">
													<img style="cursor: zoom-in;" id="myImg<?php echo $product_picture[product_picture_id]; ?>" src="../Files/product_picture_photo/<?php echo $product_picture[product_picture_photo]; ?>"  />
													<div id="myModal" class="w3-modal">
														<span class="zoom-close w3-close">&times;</span>
														<img class="w3-modal-content w3-close" id="img01">
													</div>
													<script>
														var w3modal = document.getElementById("myModal");
														var img = document.getElementById("myImg<?php echo $product_picture[product_picture_id]; ?>");
														var modalImg = document.getElementById("img01");
														img.onclick = function(){
															w3modal.style.display = "block";
															modalImg.src = this.src;
														}
														var span = document.getElementsByClassName("w3-close")[0];
														span.onclick = function() { 
															w3modal.style.display = "none";
														}


														window.onclick = function(event) {
															if (event.target == w3modal) {
																w3modal.style.display = "none";
															}
														}
													</script>
												</div>
												<div class="caption">
													<a href="product_one.php?product_picture_id=<?php echo $product_picture[product_picture_id]; ?>&product_pictureDel=x" onclick="return confirm('ยืนยันการลบข้อมูล  ? ')" ><span class="glyphicon glyphicon-remove-sign"></span> ลบรูปนี้</a>
												</div>
											</div>
										</div>
										<?
									}
									?>
								</div>
							</div>
						</div>
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
	<div id="product_pictureAdd" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพเพิ่มเติม</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะแสดงต่อจาก รูปหลักของ สินค้า</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="product_picture_photo[]">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit"  class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
						</button>
						<input type="hidden" name="product_pictureAdd" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="productUpdate" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไขรูปภาพหลักของ สินค้า</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="product_photo">
						</div>
					</div>
					<div class="modal-footer">
						<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input type="hidden" name="productUpdate" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'catalog.php';
if (isset($_GET[catalog_id])){
	$_SESSION[catalog_id] =  $_GET[catalog_id];
}
$catalog_id =   $_SESSION[catalog_id] ;

if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
$page =   $_SESSION[numpage];

$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$catalog_id'";
$catalog_QR = mysqli_query($con,$catalog_SL);
$catalog 	= mysqli_fetch_array($catalog_QR);

if ($_POST['catalog_pictureAdd']) {
	if(isset($_FILES['catalog_picture_photo']['name'])&&$_FILES['catalog_picture_photo']['name']!=''){
		$Count = count($_FILES['catalog_picture_photo']['name']);
		for ($i=0; $i < $Count; $i++) { 
			$catalog_picture_photo = rand().$_FILES["catalog_picture_photo"]["name"][$i];
			if(move_uploaded_file($_FILES["catalog_picture_photo"]["tmp_name"][$i],"../Files/catalog_picture_photo/".$catalog_picture_photo)){
				$catalog_picture_Add = "INSERT INTO `catalog_picture` (`catalog_id`,`catalog_picture_photo`) VALUES ('$catalog_id','$catalog_picture_photo')";
				$catalog_picture_Reult = mysqli_query($con,$catalog_picture_Add);
				if (!$catalog_picture_Reult) {
					echo"<script>alert('Error catalog_picture'); window.history.back(); </script>";
				}
			}
			else{
				echo"<script>alert('Error move_uploaded_file'); window.history.back(); </script>";
			}
		}
		echo"<script>  window.location='catalog_one.php?INSERT'; </script>";
	}
}
if ($_GET['catalog_pictureDel']) {

	$catalog_picture_id =   $_GET[catalog_picture_id];
	$catalog_picture_SL = " SELECT * FROM catalog_picture WHERE catalog_picture_id = '$catalog_picture_id'";
	$catalog_picture_QR = mysqli_query($con,$catalog_picture_SL);
	$catalog_picture 	= mysqli_fetch_array($catalog_picture_QR);

	@unlink("../Files/catalog_picture_photo/".$catalog_picture['catalog_picture_photo']);

	$catalog_picture_Del ="DELETE FROM `catalog_picture` WHERE catalog_picture_id = '$catalog_picture_id' ";
	$catalog_picture_Qurey  = mysqli_query($con,$catalog_picture_Del);

	if($catalog_picture_Qurey) {
		echo"<script>  window.location='catalog_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

}
if ($_POST['catalogUpdate']) {
	if($_FILES['catalog_photo']['name']!=''){
		@unlink("../Files/catalog_photo/".$catalog['catalog_photo']);
		@unlink("../Files/catalog_min/".$catalog['catalog_photo']);
		$suffix = strrchr($_FILES["catalog_photo"]["name"],".");
		$catalog_photo = $catalog[catalog_page]."-".rand().$suffix;
		$upload = move_uploaded_file($_FILES["catalog_photo"]["tmp_name"],"../Files/catalog_photo/".$catalog_photo);
		$catalog_photo_Update = "UPDATE `catalog` SET `catalog_photo` = '$catalog_photo' WHERE `catalog_id` = '$_SESSION[catalog_id]'";
		$catalog_photo_Reult = mysqli_query($con,$catalog_photo_Update);
		$table =  'catalog';
		min_resize($catalog_photo,$table);
		if (!$catalog_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($catalog_photo_Reult) {
			echo"<script>   window.location='catalog_one.php?UPDATE'; </script>";
		}
	}
}


// gallery ------------------------------------------------>
if ($_POST['add_gallery']) {
	$gallery_photo = $_FILES['gallery_photo']['name'];
	$gallery_video = $_FILES['gallery_video']['name'];
	$gallery_youtube = function_youtube($_POST['gallery_youtube']);
	$gallery_facebook = $_POST['gallery_facebook'];
	$gallery_review = function_review($_POST['gallery_review']);
	$gallery_link = function_link($_POST['gallery_link']);
	$gallery_download = $_FILES['gallery_download']['name'];
	if (  trim($gallery_photo)==''   &&  trim($gallery_video)==''   && trim($gallery_review)==''  &&  trim($gallery_youtube)==''  &&  trim($gallery_facebook)==''   &&  trim($gallery_link)==''   &&  trim($gallery_download)==''  ) {
		echo"  <script>alert('กรุณากรอกอย่างใดอย่างหนึ่ง '); window.location='catalog_one.php?#gallery';  </script>";
	}
	else{
		$gallery_Add = "INSERT INTO `gallery` (`gallery_link`,`gallery_review`,`gallery_youtube`,`gallery_facebook`,`gallery_code`) 
		VALUES ('$gallery_link','$gallery_review','$gallery_youtube','$gallery_facebook','catalog_id$catalog_id')";
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

		echo"<script>  window.location='catalog_one.php#gallery".$_SESSION[gallery_id]."'; </script>";
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
		echo"<script>  window.location='catalog_one.php?UPDATE#gallery".$gallery_id."'; </script>";
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
		echo"<script>  window.location='catalog_one.php?DELETE'; </script>";
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
						<h3>       หมวดหมู่      : <span class="text-primary bold"> <?php echo $catalog[catalog_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="catalog.php?page=<? echo $page; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="catalog_update.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> แก้ไข</a>
						<a href="catalog_del.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดหมวดหมู่     :  <span class="text-primary bold"> <?php echo $catalog[catalog_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin2">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" >   หมวดหมู่     </label>
												<label class="control-label col-md-9 text-left">
													<? echo $catalog[catalog_name]; ?>
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
						<div id="collection_add" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content ">
									<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel">เพิ่ม ชนิด ใหม่</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อ   ชนิด     <span class="text-red"> * </span> </label>
												<div class="col-md-6">
													<input id="collection_name" type="text" class="form-control"  name="collection_name"  required  >
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > cover  </label>
												<div class="col-md-6">
													<input type="file" required class="form-control"  name="collection_cover">
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input type="hidden" name="collection_add" value="x">
											<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
										</div>
									</form>
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
	<div id="catalog_pictureAdd" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพเพิ่มเติม</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะแสดงต่อจาก รูปหลักของ     หมวดหมู่    </span></label>
							<input type="file" required class="form-control" multiple="multiple" name="catalog_picture_photo[]">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit"  class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
						</button>
						<input type="hidden" name="catalog_pictureAdd" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="catalogUpdate" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไข     หมวดหมู่    </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="catalog_photo">
						</div>
					</div>
					<div class="modal-footer">
						<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input type="hidden" name="catalogUpdate" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

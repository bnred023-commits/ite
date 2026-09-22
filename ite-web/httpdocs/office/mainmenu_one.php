<? 
include 'index_IncludeAdmin.php'; 


if (isset($_GET[mainmenu_id])){
	$_SESSION[mainmenu_id] =  $_GET[mainmenu_id];
}
$mainmenu_id =   $_SESSION[mainmenu_id];
$_SESSION['page'] = 'mainmenu_id='.$mainmenu_id;


if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
$page =   $_SESSION[numpage];

$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$mainmenu_id'";
$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
$mainmenu 	= mysqli_fetch_array($mainmenu_QR);


if ($_GET[mainmenu_cover]=='delete') {
	@unlink("../Files/mainmenu_cover/".$mainmenu['mainmenu_cover']);
	$mainmenu_cover_Update = "UPDATE `mainmenu` SET `mainmenu_cover` = '' WHERE mainmenu_id = '$mainmenu_id' ";
	$mainmenu_cover_Reult = mysqli_query($con,$mainmenu_cover_Update);
	echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='mainmenu_one.php?update';</script>";
}
if ($_POST['mainmenuUpdate']) {
	if($_FILES['mainmenu_cover']['name']!=''){
		@unlink("../Files/mainmenu_cover/".$mainmenu['mainmenu_cover']);
		$suffix = strrchr($_FILES["mainmenu_cover"]["name"],".");
		$mainmenu_cover = $mainmenu[mainmenu_page]."-".rand().$suffix;
		$upload = move_uploaded_file($_FILES["mainmenu_cover"]["tmp_name"],"../Files/mainmenu_cover/".$mainmenu_cover);
		$mainmenu_cover_Update = "UPDATE `mainmenu` SET `mainmenu_cover` = '$mainmenu_cover' WHERE `mainmenu_id` = '$_SESSION[mainmenu_id]'";
		$mainmenu_cover_Reult = mysqli_query($con,$mainmenu_cover_Update);
		if (!$mainmenu_cover_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($mainmenu_cover_Reult) {
			echo"<script>   window.location='mainmenu_one.php?UPDATE'; </script>";
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
		echo"  <script>alert('กรุณากรอกอย่างใดอย่างหนึ่ง '); window.location='web_content_one.php?#gallery';  </script>";
	}
	else{
		$gallery_Add = "INSERT INTO `gallery` (`gallery_link`,`gallery_review`,`gallery_youtube`,`gallery_facebook`,`gallery_code`) 
		VALUES ('$gallery_link','$gallery_review','$gallery_youtube','$gallery_facebook','mainmenu_id$mainmenu_id')";
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

		echo"<script>  window.location='mainmenu_one.php#gallery".$_SESSION[gallery_id]."'; </script>";
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
		echo"<script>  window.location='mainmenu_one.php?UPDATE#gallery".$gallery_id."'; </script>";
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
		echo"<script>  window.location='mainmenu_one.php?DELETE'; </script>";
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
						<h3>       เมนูหลัก      : <span class="text-primary bold"> <?php echo $mainmenu[mainmenu_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="mainmenu.php?page=<? echo $page; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="mainmenu_update.php?mainmenu_id=<?php echo $mainmenu[mainmenu_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> แก้ไข</a>
						<a href="mainmenu_del.php?mainmenu_id=<?php echo $mainmenu[mainmenu_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>

					<div class="col-md-8">

						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดเมนูหลัก     :  <span class="text-primary bold"> <?php echo $mainmenu[mainmenu_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin2">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อ      เมนูหลัก     </label>
												<label class="control-label col-md-9 text-left">
													<? echo $mainmenu[mainmenu_name]; ?>
												</label>
											</div>
										</form>
									</div>
								</div>
								<!-- row -->
							</div>
							<!-- panel body -->
						</div>

						<div class="panel panel-default" id="gallery">
							<div class="panel-heading">

								<div class="row">
									<div class="col-md-12"  style="margin: -5px;">
										เนื้อหา
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_photo">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มรูปภาพ
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_video">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มวิดีโอ
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_review">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มข้อความ
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_youtube">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่ม Youtube  
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_facebook">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่ม Facebook   
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_link">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มลิ้ง
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_download">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มไฟล์ 
										</button>
									</div>
								</div>

								<div id="add_gallery_download" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> ไฟล์ สำหรับให้ดาวโหลด  </h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-md-12">
															<label class="control-label" for="email">ไฟล์ สำหรับให้ดาวโหลด  </label>
															<input Type="file" class="form-control"  name="gallery_download" >
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
													</button>
													<input Type="hidden" name="add_gallery" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="add_gallery_link" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> ลิ้งเว็บไซต์ต่างๆ  </h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-md-12">
															<label class="control-label" for="email">ลิ้งเว็บไซต์ต่างๆ  </label>
															<input Type="text" class="form-control"  name="gallery_link"    placeholder="เช่น https://www.website.com/">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
													</button>
													<input Type="hidden" name="add_gallery" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="add_gallery_facebook" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> วิดีโอ Facebook  </h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-md-12">
															<label class="control-label" for="email">วิดีโอ Facebook  </label>
															<input Type="text" class="form-control"  name="gallery_facebook"    placeholder="เช่น https://www.facebook.com/efmstation/videos/336277683664652/">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
													</button>
													<input Type="hidden" name="add_gallery" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="add_gallery_youtube" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> เพิ่มวิดีโอ Youtube  </h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-md-12">
															<label class="control-label" for="email"> วิดีโอ Youtube  </label>
															<input Type="text" class="form-control"  name="gallery_youtube"    placeholder="เช่น https://www.youtube.com/watch?v=ABrjdyavqkI">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
													</button>
													<input Type="hidden" name="add_gallery" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="add_gallery_photo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog " role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> เพิ่มรูปภาพ <span class="text-primary"></span> </h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-md-12">
															<label class="control-label" for="email"> รูปภาพ </label>
															<input required Type="file" class="form-control"  multiple="multiple" name="gallery_photo">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
													</button>
													<input Type="hidden" name="add_gallery" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="add_gallery_video" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> เพิ่มวิดีโอไฟล์อัพโหลด  </h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-md-12">
															<label class="control-label" for="email"> วิดีโอไฟล์อัพโหลด </label>
															<input required Type="file" class="form-control"   name="gallery_video">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
													</button>
													<input Type="hidden" name="add_gallery" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div id="add_gallery_review" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> เพิ่มข้อความ </h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<textarea class="ckeditor" name="gallery_review"></textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
													</button>
													<input Type="hidden" name="add_gallery" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>

							</div>
							<div class="panel-body">
								<?
								$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'mainmenu_id$mainmenu[mainmenu_id]' ORDER BY gallery_sort IS NULL ASC, gallery_id ASC";
								$gallery_QR 	= mysqli_query($con,$gallery_SL);
								$gallery_Row 	= mysqli_num_rows($gallery_QR);
								if ($gallery_Row==0) {
									?>
									<p class="text-muted"> 
										ยังไม่มีข้อมูลนี้
									</p>
									<?
								}
								?>
								<div class="table-responsive">
									<table class="table table-bordered ">
										<tbody class="">
											<?
											while ($gallery 	= mysqli_fetch_array($gallery_QR)) {
												?>
												<tr id="<?php echo $gallery['gallery_id'] ?>">
													<td id="gallery<?php echo $gallery[gallery_id]; ?>">	

														<?
														if (isset($gallery[gallery_photo])&&trim($gallery[gallery_photo])!='') {
															?>
															<div class="margintop15">
																<img src="../Files/gallery_photo/<?php echo   $gallery[gallery_photo]; ?>" class="img-responsive" />
															</div>
															<div class="caption" style="margin: 10px;">
																<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_gallery_photo<?php echo $gallery[gallery_id]; ?>">
																	<span class="glyphicon glyphicon-edit"></span>
																	แก้ไข
																</button> 
																<a href="mainmenu_one.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
															</div>
															<div id="update_gallery_photo<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																<div class="modal-dialog " role="document">
																	<div class="modal-content">
																		<form action="" method="post" enctype="multipart/form-data">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="exampleModalLabel"> แก้ไขรูปภาพ <span class="text-primary"></span> </h4>
																			</div>
																			<div class="modal-body">
																				<div class="row">
																					<div class="form-group col-md-12">
																						<label class="control-label" for="email"> รูปภาพ </label>
																						<input required Type="file" class="form-control"  name="gallery_photo">
																					</div>
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="submit" class="btn btn-info">
																					<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
																				</button>
																				<input Type="hidden" name="update_gallery" value="x">
																				<input Type="hidden" name="gallery_id" value="<?php echo $gallery[gallery_id]; ?>">
																				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>

															<?
														}
														?>	

														<?
														if (isset($gallery[gallery_video])&&trim($gallery[gallery_video])!='') {
															?>
															<div class="margintop15">
																<video width="100%" height="auto" controls><source src="../Files/gallery_video/<? echo $gallery[gallery_video]; ?>" type="video/mp4">
																	Your browser does not support HTML5 video.
																</video>
																<div class="caption" style="margin: 10px;">
																	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_gallery_video<?php echo $gallery[gallery_id]; ?>">
																		<span class="glyphicon glyphicon-edit"></span>
																		แก้ไข
																	</button> 
																	<a href="mainmenu_one.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_video<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไข  </h4>
																				</div>
																				<div class="modal-body">
																					<div class="row">
																						<div class="form-group col-md-12">
																							<label class="control-label" for="email"> วิดีโอไฟล์อัพโหลด </label>
																							<input required Type="file" class="form-control"   name="gallery_video">
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info">
																						<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
																					</button>
																					<input Type="hidden" name="update_gallery" value="x">
																					<input Type="hidden" name="gallery_id" value="<?php echo $gallery[gallery_id]; ?>">
																					<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<?
														}
														?>
														<?
														if (isset($gallery[gallery_review])&&trim($gallery[gallery_review])!='') {
															?>
															<div class="margintop15">
																<?php echo $gallery[gallery_review]; ?>
																<div class="caption" style="margin: 10px;">
																	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_gallery_review<?php echo $gallery[gallery_id]; ?>">
																		<span class="glyphicon glyphicon-edit"></span>
																		แก้ไข
																	</button> 
																	<a href="mainmenu_one.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_review<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog modal-lg" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไข  </h4>
																				</div>
																				<div class="modal-body">
																					<div class="row">
																						<div class="form-group col-md-12">
																							<textarea class="ckeditor" name="gallery_review"><?php echo $gallery[gallery_review]; ?></textarea>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info">
																						<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
																					</button>
																					<input Type="hidden" name="update_gallery" value="x">
																					<input Type="hidden" name="gallery_id" value="<?php echo $gallery[gallery_id]; ?>">
																					<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<?
														}
														?>
														<?
														if (isset($gallery[gallery_youtube])&&trim($gallery[gallery_youtube])!='') {
															?>
															<div class="margintop15">
																<div class="embed-responsive embed-responsive-16by9">
																	<iframe  src="<?php echo $gallery['gallery_youtube']; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
																</div>
																<div class="caption" style="margin: 10px;">
																	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_gallery_youtube<?php echo $gallery[gallery_id]; ?>">
																		<span class="glyphicon glyphicon-edit"></span>
																		แก้ไข Youtube  
																	</button> 
																	<a href="mainmenu_one.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_youtube<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไข Youtube    </h4>
																				</div>
																				<div class="modal-body">
																					<div class="row">
																						<div class="form-group col-md-12">
																							<input Type="text" class="form-control"  name="gallery_youtube"  value="<?php echo $gallery[gallery_youtube]; ?>"  placeholder="เช่น https://www.youtube.com/watch?v=ABrjdyavqkI">
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info">
																						<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
																					</button>
																					<input Type="hidden" name="update_gallery" value="x">
																					<input Type="hidden" name="gallery_id" value="<?php echo $gallery[gallery_id]; ?>">
																					<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<?
														}
														?>
														<?
														if (isset($gallery[gallery_facebook])&&trim($gallery[gallery_facebook])!='') {
															?>
															<div class="margintop15">
																<div class="embed-responsive embed-responsive-16by9">
																	<iframe src="https://www.facebook.com/plugins/video.php?href=<?php echo $gallery['gallery_facebook']; ?>&show_text=0&width=269"  style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
																</div>
																<div class="caption" style="margin: 10px;">
																	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_gallery_facebook<?php echo $gallery[gallery_id]; ?>">
																		<span class="glyphicon glyphicon-edit"></span>
																		แก้ไข facebook  
																	</button> 
																	<a href="mainmenu_one.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_facebook<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไข facebook    </h4>
																				</div>
																				<div class="modal-body">
																					<div class="row">
																						<div class="form-group col-md-12">
																							<label class="control-label" for="email">วิดีโอ Facebook  </label>
																							<input Type="text" class="form-control"  name="gallery_facebook" value="<?php echo $gallery[gallery_facebook]; ?>"   placeholder="เช่น https://www.facebook.com/efmstation/videos/336277683664652/">
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info">
																						<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
																					</button>
																					<input Type="hidden" name="update_gallery" value="x">
																					<input Type="hidden" name="gallery_id" value="<?php echo $gallery[gallery_id]; ?>">
																					<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<?
														}
														?>
														<?
														if (isset($gallery[gallery_link])&&trim($gallery[gallery_link])!='') {
															?>
															<div class="margintop15">
																<a target="_blank" class="btn btn-default" href="https://<?php echo $gallery[gallery_link]; ?>">
																	<span class="glyphicon glyphicon-link"></span>
																	<?php echo $gallery[gallery_link]; ?>
																</a>
																<div class="caption" style="margin: 10px;">
																	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_gallery_link<?php echo $gallery[gallery_id]; ?>">
																		<span class="glyphicon glyphicon-edit"></span>
																		แก้ไขลิ้งเว็บไซต์ต่างๆ  
																	</button> 
																	<a href="mainmenu_one.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_link<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไขลิ้งเว็บไซต์ต่างๆ    </h4>
																				</div>
																				<div class="modal-body">
																					<div class="row">
																						<div class="form-group col-md-12">
																							<label class="control-label" for="email">ลิ้งเว็บไซต์ต่างๆ  </label>
																							<input Type="text" class="form-control"  name="gallery_link"  value="<?php echo $gallery[gallery_link]; ?>"  placeholder="เช่น https://www.website.com/">
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info">
																						<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
																					</button>
																					<input Type="hidden" name="update_gallery" value="x">
																					<input Type="hidden" name="gallery_id" value="<?php echo $gallery[gallery_id]; ?>">
																					<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<?
														}
														?>
														<?
														if (isset($gallery[gallery_download])&&trim($gallery[gallery_download])!='') {
															?>
															<div class="margintop15">
																<a target="_blank" class="btn btn-default" href="../Files/gallery_download/<?php echo $gallery[gallery_download]; ?>">
																	<span class="glyphicon glyphicon-download"></span>
																	<?php echo $gallery[gallery_download]; ?>
																</a>
																<div class="caption" style="margin: 10px;">
																	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_gallery_download<?php echo $gallery[gallery_id]; ?>">
																		<span class="glyphicon glyphicon-edit"></span>
																		แก้ไขไฟล์ สำหรับให้ดาวโหลด  
																	</button> 
																	<a href="mainmenu_one.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_download<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไขไฟล์ สำหรับให้ดาวโหลด    </h4>
																				</div>
																				<div class="modal-body">
																					<div class="row">
																						<div class="form-group col-md-12">
																							<label class="control-label" for="email">ลิ้งเว็บไซต์ต่างๆ  </label>
																							<input required Type="file" class="form-control"  name="gallery_download"  >
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info">
																						<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
																					</button>
																					<input Type="hidden" name="update_gallery" value="x">
																					<input Type="hidden" name="gallery_id" value="<?php echo $gallery[gallery_id]; ?>">
																					<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<?
														}
														?>
													</td>
												</tr>
												<?
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel-footer">
							</div>
						</div>	

						<div style="margin-bottom: 15px;">
							<a target="_blank" href="web_content_add.php?mainmenu_id=<?php echo $mainmenu[mainmenu_id]; ?>" class="btn btn-success">
								<span class="glyphicon glyphicon-plus-sign"></span>
								เพิ่ม   หน้าเพจหรือเมนูย่อย   
							</a>

							<a target="_blank" href="web_product_add.php?mainmenu_id=<?php echo $mainmenu[mainmenu_id]; ?>" class="btn btn-success">
								<span class="glyphicon glyphicon-plus-sign"></span>
								เพิ่ม   ผลิตภัณฑ์หรือบริการ   
							</a>
						</div>

						<div>
							<?
							$web_content_SL = " SELECT * FROM web_content WHERE mainmenu_id = '$mainmenu_id' order by web_content_sort asc ";
							$web_content_QR 	= mysqli_query($con,$web_content_SL);
							$web_content_row    = mysqli_num_rows($web_content_QR);
							if ($web_content_row > 0) {
								?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<div class="row">
											<div class="col-md-6">
												<?
												if (isset($_GET[keyword])&&$_GET[keyword]!='') {
													?>
													ค้นหา : <? echo $keyword; echo " "; ?>
													<?
												}
												if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
													$mainmenutopic_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
													$mainmenutopic_QR = mysqli_query($con,$mainmenutopic_SL);
													$mainmenutopic 	= mysqli_fetch_array($mainmenutopic_QR);
													?>
													หน้าเพจหรือเมนูย่อย : <? echo $mainmenutopic[mainmenu_name]; echo " "; ?>
													<?
												}
												if ($Q==1) {
													?>
													หน้าเพจหรือเมนูย่อย 
													<?
												}
												?>
												<?
												if ($web_content_row=='0') { echo "( ไม่มีหน้าเพจหรือเมนูย่อยนี้ )"; }
												else{ 
													?>
													<span class="badge"> <? echo "$web_content_row"; ?></span> 
													<?
												} 
												?>

											</div>
											<div class="col-md-6 text-right" style="margin: -5px;">
												<a class="btn btn-default" onclick="location.reload()">
													รีเฟรชหน้า
												</a>
												<a class="btn btn-default" onclick="goBack()">
													<span class="glyphicon glyphicon-backward"></span>
													กลับ
												</a>
											</div>
										</div>
									</div>
									<div class="panel-body">

										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th> # </th>
														<th> รูป  </th>
														<th> หน้าเพจหรือเมนูย่อย </th>
														<th> เมนูหลัก </th>
														<th> รายละเอียด , แก้ไข , ลบ </th>
													</tr>
												</thead>
												<tbody class="row_position">
													<?
													$i = 1;
													while ($web_content 	= mysqli_fetch_array($web_content_QR)) {
														?>
														<tr id="<?php echo $web_content['web_content_id'] ?>">
															<td style="width: 30px;"><? echo $i; ?></td>
															<td style="width: 140px;">
																<?
																if (!empty($web_content['web_content_photo'])) {
																	?>
																	<a href="web_content_one.php?web_content_id=<?php echo $web_content[web_content_id]; ?>" >
																		<img class="full"  src="../Files/web_content_photo/<?php echo $web_content[web_content_photo]; ?>"  />
																	</a>
																	<?
																} else {
																	echo " ไม่มีข้อมูลนี้ ";
																}
																?>
															</td>
															<td>
																<? echo $web_content[web_content_name]; ?>
															</td>
															<td>
																<?
																if (isset($web_content[mainmenu_id])&&trim($web_content[mainmenu_id])!='0') {
																	$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$web_content[mainmenu_id]'";
																	$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
																	$mainmenu 	= mysqli_fetch_array($mainmenu_QR);
																	?>
																	<? echo $mainmenu[mainmenu_name]; ?>
																	<?
																}
																?>
															</td>
															<td style="width: 300px;">
																<a target="_blank" href="web_content_one.php?web_content_id=<?php echo $web_content[web_content_id]; ?>" class="btn btn-sm btn-primary">
																	<span class="glyphicon glyphicon-zoom-in"></span>
																	รายละเอียด  
																</a>
																<a target="_blank" href="web_content_update.php?web_content_id=<?php echo $web_content[web_content_id]; ?>" class="btn btn-sm btn-info">
																	<span class="glyphicon glyphicon-edit"></span>
																	แก้ไข
																</a>
																<a target="_blank" href="web_content_del.php?web_content_id=<?php echo $web_content[web_content_id]; ?>" onclick="return confirm('  ยืนยันการลบหน้าเพจหรือเมนูย่อย  ? ')"  class="btn btn-sm btn-danger">
																	<span class="glyphicon glyphicon-trash"></span> ลบ
																</a>
															</td>

														</tr>
														<?
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<?
							}
							?>

							<?
							$web_product_SL = " SELECT * FROM web_product WHERE mainmenu_id = '$mainmenu_id' order by web_product_sort asc ";
							$web_product_QR 	= mysqli_query($con,$web_product_SL);
							$web_product_row    = mysqli_num_rows($web_product_QR);
							if ($web_product_row > 0) {
								?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<div class="row">
											<div class="col-md-6">
												<?
												if (isset($_GET[keyword])&&$_GET[keyword]!='') {
													?>
													ค้นหา : <? echo $keyword; echo " "; ?>
													<?
												}
												if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
													$mainmenutopic_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
													$mainmenutopic_QR = mysqli_query($con,$mainmenutopic_SL);
													$mainmenutopic 	= mysqli_fetch_array($mainmenutopic_QR);
													?>
													ผลิตภัณฑ์หรือบริการ : <? echo $mainmenutopic[mainmenu_name]; echo " "; ?>
													<?
												}
												if ($Q==1) {
													?>
													ผลิตภัณฑ์หรือบริการ 
													<?
												}
												?>
												<?
												if ($web_product_row=='0') { echo "( ไม่มีผลิตภัณฑ์หรือบริการนี้ )"; }
												else{ 
													?>
													<span class="badge"> <? echo "$web_product_row"; ?></span> 
													<?
												} 
												?>

											</div>
											<div class="col-md-6 text-right" style="margin: -5px;">
												<a class="btn btn-default" onclick="location.reload()">
													รีเฟรชหน้า
												</a>
												<a class="btn btn-default" onclick="goBack()">
													<span class="glyphicon glyphicon-backward"></span>
													กลับ
												</a>
											</div>
										</div>
									</div>
									<div class="panel-body">

										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th> # </th>
														<th> รูป  </th>
														<th> ผลิตภัณฑ์หรือบริการ </th>
														<th> หมวดหมู่ </th>
														<th> รายละเอียด , แก้ไข , ลบ </th>
													</tr>
												</thead>
												<tbody class="row_position">
													<?
													$i = 1;
													while ($web_product 	= mysqli_fetch_array($web_product_QR)) {
														?>
														<tr id="<?php echo $web_product['web_product_id'] ?>">
															<td style="width: 30px;"><? echo $i; ?></td>
															<td style="width: 140px;">
																<?
																if (!empty($web_product['web_product_photo'])) {
																	?>
																	<a href="web_product_one.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" >
																		<img class="full"  src="../Files/web_product_photo/<?php echo $web_product[web_product_photo]; ?>"  />
																	</a>
																	<?
																} else {
																	echo " ไม่มีข้อมูลนี้ ";
																}
																?>
															</td>
															<td>
																<? echo $web_product[web_product_name]; ?>
															</td>
															<td>
																<?
																if (isset($web_product[catalog_id])&&trim($web_product[catalog_id])!='0') {
																	$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$web_product[catalog_id]'";
																	$catalog_QR = mysqli_query($con,$catalog_SL);
																	$catalog 	= mysqli_fetch_array($catalog_QR);
																	?>
																	<? echo $catalog[catalog_name]; ?>
																	<?
																}
																else{
																	echo " - ";
																}
																?>
															</td>
															<td style="width: 300px;">
																<a target="_blank" href="web_product_one.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" class="btn btn-sm btn-primary">
																	<span class="glyphicon glyphicon-zoom-in"></span>
																	รายละเอียด  
																</a>
																<a target="_blank" href="web_product_update.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" class="btn btn-sm btn-info">
																	<span class="glyphicon glyphicon-edit"></span>
																	แก้ไข
																</a>
																<a target="_blank" href="web_product_del.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" onclick="return confirm('  ยืนยันการลบผลิตภัณฑ์หรือบริการ  ? ')"  class="btn btn-sm btn-danger">
																	<span class="glyphicon glyphicon-trash"></span> ลบ
																</a>
															</td>

														</tr>
														<?
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<?
							}
							?>
						</div> 

					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> 
								<div class="row">
									<div class="col-md-4">
										รูป cover
									</div>
									<div class="col-md-8 text-right" style="margin: -5px;">
										<button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#mainmenuUpdate"> 
											<span class="glyphicon glyphicon-picture"></span>
											แก้ไขรูป
										</button>
										<a onclick="return confirm(' ยืนยันการลบ ? ')"  href="mainmenu_one.php?mainmenu_cover=delete"  type="button" class="btn btn-sm btn-danger" > 
											ลบ
										</a>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 br-margin2">
										<?
										if (!empty($mainmenu['mainmenu_cover'])) {
											?>
											<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $mainmenu[mainmenu_id]; ?>" src="../Files/mainmenu_cover/<?php echo $mainmenu[mainmenu_cover]; ?>"  />
											<div id="myModal" class="w3-modal">
												<span class="zoom-close w3-close">&times;</span>
												<img class="w3-modal-content w3-close" id="img01">
											</div>
											<script>
												var w3modal = document.getElementById("myModal");
												var img = document.getElementById("myImgmain<?php echo $mainmenu[mainmenu_id]; ?>");
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
											<?
										} else {
											echo " ไม่มีข้อมูลนี้ ";
										}
										?>
										
									</div>
								</div>
							</div>
						</div>
						<div id="mainmenuUpdate" class="modal fade" role="dialog"> 
							<div class="modal-dialog">
								<div class="modal-content">
									<form class="form" enctype="multipart/form-data" method="post">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel">แก้ไขรูปเนื้อหา    </h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
												<input type="file" required class="form-control" multiple="multiple" name="mainmenu_cover">
											</div>
										</div>
										<div class="modal-footer">
											<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="mainmenuUpdate" value="x">
											<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- 12 -->
					
					<!-- 12 -->
				</div>
				<!-- row -->
			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
	
	<?php
	$sortable_position = $_POST['position'];
	$sortable_sort_index = 1;
	foreach($sortable_position as $k => $v){
		$sql = "UPDATE web_content SET web_content_sort = ".$sortable_sort_index." WHERE web_content_id = ".$v;
		$mysqli->query($sql);
		$sortable_sort_index++;
	}
	?>

	<script type="text/javascript">
		$(".row_position").sortable({
			delay: 150,
			stop: function() {
				var sortableSelectedData = [];
				$('.row_position>tr').each(function() {
					sortableSelectedData.push($(this).attr("id"));
				});
				updateSortableOrder(sortableSelectedData);
			}
		});
		function updateSortableOrder(data) {
			$.ajax({
				url: "mainmenu_one.php",
				type: 'post',
				data: { position: data },
				success: function() {
				// อาจแสดงข้อความแจ้งเตือน หรือรีเฟรชหน้า ถ้าต้องการ
				}
			});
		}
	</script>
	
	<?php
	$web_product_position = $_POST['position'];
	$web_product_sort_index = 1;
	foreach($web_product_position as $k => $v){
		$sql = "UPDATE web_product SET web_product_sort = ".$web_product_sort_index." WHERE web_product_id = ".$v;
		$mysqli->query($sql);
		$web_product_sort_index++;
	}
	?>
	<script type="text/javascript">
		$(".row_position").web_product({
			delay: 150,
			stop: function() {
				var web_productSelectedData = [];
				$('.row_position>tr').each(function() {
					web_productSelectedData.push($(this).attr("id"));
				});
				updateweb_productOrder(web_productSelectedData);
			}
		});
		function updateweb_productOrder(data) {
			$.ajax({
				url: "mainmenu_one.php",
				type: 'post',
				data: { position: data },
				success: function() {
				// อาจแสดงข้อความแจ้งเตือน หรือรีเฟรชหน้า ถ้าต้องการ
				}
			});
		}
	</script>

</body>
</html>

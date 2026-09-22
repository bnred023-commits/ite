<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'suggestion.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'suggestion_content' ";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

$pagecontent_id = $pagecontent[pagecontent_id];


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
		echo"  <script>alert('กรุณากรอกอย่างใดอย่างหนึ่ง '); window.location='suggestion_content.php?#gallery';  </script>";
	}
	else{
		$gallery_Add = "INSERT INTO `gallery` (`gallery_link`,`gallery_review`,`gallery_youtube`,`gallery_facebook`,`gallery_code`) 
		VALUES ('$gallery_link','$gallery_review','$gallery_youtube','$gallery_facebook','pagecontent_id$pagecontent_id')";
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

		echo"<script>  window.location='suggestion_content.php#gallery".$_SESSION[gallery_id]."'; </script>";
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
		echo"<script>  window.location='suggestion_content.php?UPDATE#gallery".$gallery_id."'; </script>";
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
		echo"<script>  window.location='suggestion_content.php?DELETE'; </script>";
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
						<h3>    ข้อความที่แสดงหน้าแรก ส่วนของหัวข้อแนะนำเว็บ  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="suggestion.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="suggestion_content_update.php" class="btn btn-info">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไข
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียด  ข้อความที่แสดงหน้าแรก ส่วนของหัวข้อแนะนำเว็บ 
							</div>
							<div class="panel-body">
								<? echo $pagecontent[pagecontent_review]; ?>
							</div>
						</div>
						<div class="panel panel-default" id="gallery">
							<div class="panel-heading">

								<div class="row">
									<div class="col-md-9"  style="margin: -5px;">
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
											เพิ่มวิดีโอ Youtube  
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_facebook">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มวิดีโอ Facebook   
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_link">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มลิ้งเว็บไซต์ต่างๆ   
										</button>
										<button  type="button" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#add_gallery_download">
											<span class="glyphicon glyphicon-plus-sign"></span>
											เพิ่มไฟล์ สำหรับให้ดาวโหลด   
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
								$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'pagecontent_id$pagecontent[pagecontent_id]' ORDER BY gallery_sort IS NULL ASC, gallery_id ASC";
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
										<tbody class="row_position">
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
																	แก้ไขรูปภาพ
																</button> 
																<a href="suggestion_content.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
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
																		แก้ไขวิดีโอ
																	</button> 
																	<a href="suggestion_content.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_video<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไขวิดีโอ  </h4>
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
																		แก้ไขวิดีโอ
																	</button> 
																	<a href="suggestion_content.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_review<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog modal-lg" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไขวิดีโอ  </h4>
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
																		แก้ไขวิดีโอ Youtube  
																	</button> 
																	<a href="suggestion_content.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_youtube<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไขวิดีโอ Youtube    </h4>
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
																		แก้ไขวิดีโอ facebook  
																	</button> 
																	<a href="suggestion_content.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
																</div>
																<div id="update_gallery_facebook<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="exampleModalLabel"> แก้ไขวิดีโอ facebook    </h4>
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
																	<a href="suggestion_content.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
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
																	<a href="suggestion_content.php?gallery_id=<?php echo $gallery[gallery_id]; ?>&gallery_del=x" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ </a>
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
														<div class="caption" style="margin: 10px;">
															<div id="update_gallery<?php echo $gallery[gallery_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
																<div class="modal-dialog modal-lg" role="document">
																	<div class="modal-content">
																		<form action="" method="post" enctype="multipart/form-data">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="exampleModalLabel"> แก้ไข เนื้อหา </h4>
																			</div>
																			<div class="modal-body">
																				<div class="row">
																					<div class="form-group col-md-6">
																						<label class="control-label" for="email">รูปภาพ <small>(รูปใหม่ที่จะนำมาแทน)</small>:</label>
																						<input Type="file" class="form-control"  name="gallery_photo" >
																					</div>
																					<div class="form-group col-md-6">
																						<label class="control-label" for="email">วิดีโอ <small>(วิดีโอใหม่ที่จะนำมาแทน)</small>:</label>
																						<input Type="file" class="form-control"  name="gallery_video" >
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="control-label" for="email">ข้อความ เนื้อหา  </label>
																					<textarea class="ckeditor" name="gallery_review"><?php echo $gallery[gallery_review]; ?></textarea>
																				</div>
																				<div class="row">
																					<div class="form-group col-md-6">
																						<label class="control-label" for="email">วิดีโอ Youtube    </label>
																						<input Type="text" class="form-control"  name="gallery_youtube" value="<?php echo $gallery[gallery_youtube]; ?>"   >
																					</div>
																					<div class="form-group col-md-6">
																						<label class="control-label" for="email">วิดีโอ Facebook  </label>
																						<input Type="text" class="form-control"  name="gallery_facebook"  value="<?php echo $gallery[gallery_facebook]; ?>"   >
																					</div>
																				</div>
																				<div class="row">
																					<div class="form-group col-md-6">
																						<label class="control-label" for="email">ลิ้งเว็บไซต์ต่างๆ  </label>
																						<input Type="text" class="form-control"  name="gallery_link"  value="<?php echo $gallery[gallery_link]; ?>"  placeholder="เช่น https://www.website.com/">
																					</div>
																					<div class="form-group col-md-6">
																						<label class="control-label" for="email">ไฟล์ สำหรับให้ดาวโหลด <small>(ไฟล์ใหม่ที่จะนำมาแทน)</small>:</label>
																						<input Type="file" class="form-control"  name="gallery_download" >
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



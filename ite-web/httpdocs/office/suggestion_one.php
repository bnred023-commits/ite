<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'suggestion.php';
if (isset($_GET[suggestion_id])){
	$_SESSION[suggestion_id] =  $_GET[suggestion_id];
}
$suggestion_id =   $_SESSION[suggestion_id] ;

if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
$page =   $_SESSION[numpage];

$suggestion_SL = " SELECT * FROM suggestion WHERE suggestion_id = '$suggestion_id'";
$suggestion_QR = mysqli_query($con,$suggestion_SL);
$suggestion 	= mysqli_fetch_array($suggestion_QR);

if ($_POST['suggestion_pictureAdd']) {
	if(isset($_FILES['suggestion_picture_photo']['name'])&&$_FILES['suggestion_picture_photo']['name']!=''){
		$Count = count($_FILES['suggestion_picture_photo']['name']);
		for ($i=0; $i < $Count; $i++) { 
			$suggestion_picture_photo = rand().$_FILES["suggestion_picture_photo"]["name"][$i];
			if(move_uploaded_file($_FILES["suggestion_picture_photo"]["tmp_name"][$i],"../Files/suggestion_picture_photo/".$suggestion_picture_photo)){
				$suggestion_picture_Add = "INSERT INTO `suggestion_picture` (`suggestion_id`,`suggestion_picture_photo`) VALUES ('$suggestion_id','$suggestion_picture_photo')";
				$suggestion_picture_Reult = mysqli_query($con,$suggestion_picture_Add);
				if (!$suggestion_picture_Reult) {
					echo"<script>alert('Error suggestion_picture'); window.history.back(); </script>";
				}
			}
			else{
				echo"<script>alert('Error move_uploaded_file'); window.history.back(); </script>";
			}
		}
		echo"<script>  window.location='suggestion_one.php?INSERT'; </script>";
	}
}
if ($_GET['suggestion_pictureDel']) {

	$suggestion_picture_id =   $_GET[suggestion_picture_id];
	$suggestion_picture_SL = " SELECT * FROM suggestion_picture WHERE suggestion_picture_id = '$suggestion_picture_id'";
	$suggestion_picture_QR = mysqli_query($con,$suggestion_picture_SL);
	$suggestion_picture 	= mysqli_fetch_array($suggestion_picture_QR);

	@unlink("../Files/suggestion_picture_photo/".$suggestion_picture['suggestion_picture_photo']);

	$suggestion_picture_Del ="DELETE FROM `suggestion_picture` WHERE suggestion_picture_id = '$suggestion_picture_id' ";
	$suggestion_picture_Qurey  = mysqli_query($con,$suggestion_picture_Del);

	if($suggestion_picture_Qurey) {
		echo"<script>  window.location='suggestion_one.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

}
if ($_POST['suggestionUpdate']) {
	if($_FILES['suggestion_photo']['name']!=''){
		@unlink("../Files/suggestion_photo/".$suggestion['suggestion_photo']);
		@unlink("../Files/suggestion_min/".$suggestion['suggestion_photo']);
		$suffix = strrchr($_FILES["suggestion_photo"]["name"],".");
		$suggestion_photo = rand().$suffix;
		$upload = move_uploaded_file($_FILES["suggestion_photo"]["tmp_name"],"../Files/suggestion_photo/".$suggestion_photo);
		$suggestion_photo_Update = "UPDATE `suggestion` SET `suggestion_photo` = '$suggestion_photo' WHERE `suggestion_id` = '$_SESSION[suggestion_id]'";
		$suggestion_photo_Reult = mysqli_query($con,$suggestion_photo_Update);
		$table =  'suggestion';
		min_resize($suggestion_photo,$table);
		if (!$suggestion_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($suggestion_photo_Reult) {
			echo"<script>   window.location='suggestion_one.php?UPDATE'; </script>";
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
		echo"  <script>alert('กรุณากรอกอย่างใดอย่างหนึ่ง '); window.location='suggestion_one.php?#gallery';  </script>";
	}
	else{
		$gallery_Add = "INSERT INTO `gallery` (`gallery_link`,`gallery_review`,`gallery_youtube`,`gallery_facebook`,`gallery_code`) 
		VALUES ('$gallery_link','$gallery_review','$gallery_youtube','$gallery_facebook','suggestion_id$suggestion_id')";
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

		echo"<script>  window.location='suggestion_one.php#gallery".$_SESSION[gallery_id]."'; </script>";
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
		echo"<script>  window.location='suggestion_one.php?UPDATE#gallery".$gallery_id."'; </script>";
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
		echo"<script>  window.location='suggestion_one.php?DELETE'; </script>";
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
						<h3>       หัวข้อแนะนำเว็บ      : <span class="text-primary bold"> <?php echo $suggestion[suggestion_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="suggestion.php?page=<? echo $page; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="suggestion_update.php?suggestion_id=<?php echo $suggestion[suggestion_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> แก้ไข</a>
						<a href="suggestion_del.php?suggestion_id=<?php echo $suggestion[suggestion_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดหัวข้อแนะนำเว็บ     :  <span class="text-primary bold"> <?php echo $suggestion[suggestion_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin2">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อหัวข้อแนะนำเว็บ     </label>
												<label class="control-label col-md-9 text-left">
													<? echo $suggestion[suggestion_name]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >รายละเอียดเบื้องต้น</label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($suggestion[suggestion_detail])&&trim($suggestion[suggestion_detail])!='') {
														echo $suggestion[suggestion_detail];
													}
													else{
														echo " - ";
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
										<button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#suggestionUpdate"> 
											<span class="glyphicon glyphicon-picture"></span>
											แก้ไขรูป 
										</button>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<p class="text-muted">
											รูปภาพหลักของ  หัวข้อแนะนำเว็บ    
										</p>
									</div>
									<div class="col-md-12 br-margin2">
										<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $suggestion[suggestion_id]; ?>" src="../Files/suggestion_photo/<?php echo $suggestion[suggestion_photo]; ?>"  />
										<div id="myModal" class="w3-modal">
											<span class="zoom-close w3-close">&times;</span>
											<img class="w3-modal-content w3-close" id="img01">
										</div>
										<script>
											var w3modal = document.getElementById("myModal");
											var img = document.getElementById("myImgmain<?php echo $suggestion[suggestion_id]; ?>");
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
	<div id="suggestion_pictureAdd" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพเพิ่มเติม</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะแสดงต่อจาก รูปหลักของ     หัวข้อแนะนำเว็บ    </span></label>
							<input type="file" required class="form-control" multiple="multiple" name="suggestion_picture_photo[]">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit"  class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
						</button>
						<input type="hidden" name="suggestion_pictureAdd" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="suggestionUpdate" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" enctype="multipart/form-data" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไขรูปภาพหลักของ     หัวข้อแนะนำเว็บ    </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
							<input type="file" required class="form-control" multiple="multiple" name="suggestion_photo">
						</div>
					</div>
					<div class="modal-footer">
						<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input type="hidden" name="suggestionUpdate" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

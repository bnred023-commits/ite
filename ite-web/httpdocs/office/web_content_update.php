<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'web_content.php';

if (isset($_GET[web_content_id])){
	$_SESSION[web_content_id] =  $_GET[web_content_id];
}
$web_content_id =   $_SESSION[web_content_id] ;

$web_content_SL = " SELECT * FROM web_content WHERE web_content_id = '$web_content_id'";
$web_content_QR = mysqli_query($con,$web_content_SL);
$web_content 	= mysqli_fetch_array($web_content_QR);

if ($_POST['web_contentUpdate']) {

	$web_content_name = trim($_POST['web_content_name']);
	$web_content_eng_name = trim($_POST['web_content_eng_name']);
	$web_content_detail = trim($_POST['web_content_detail']);
	$web_content_eng_detail = trim($_POST['web_content_eng_detail']);
	$web_content_review = trim($_POST['web_content_review']);
	$web_content_eng_review = trim($_POST['web_content_eng_review']);
	$web_content_guide = trim($_POST['web_content_guide']);

	$web_content_Update = "UPDATE `web_content` SET `web_content_datetime` = NOW(),
	`highlight_name` = '$highlight_name',
	`web_content_name` = '$web_content_name',
	`web_content_eng_name` = '$web_content_eng_name',
	`web_content_detail` = '$web_content_detail',
	`web_content_eng_detail` = '$web_content_eng_detail',
	`web_content_eng_review` = '$web_content_eng_review',
	`web_content_guide` = '$web_content_guide',
	`web_content_review` = '$web_content_review' WHERE `web_content_id` = '$web_content_id'";
	$web_content_Reult = mysqli_query($con,$web_content_Update);

	if (!$web_content_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['web_content_photo']['name']!=''){
		$suffix = strrchr($_FILES["web_content_photo"]["name"],".");
		suffix($suffix);
		@unlink("../Files/web_content_photo/".$web_content['web_content_photo']);
		@unlink("../Files/web_content_min/".$web_content['web_content_photo']);
		$suffix = strrchr($_FILES["web_content_photo"]["name"],".");
		$web_content_photo = rand().$suffix;
		$upload = move_uploaded_file($_FILES["web_content_photo"]["tmp_name"],"../Files/web_content_photo/".$web_content_photo);
		$web_content_photo_Update = "UPDATE `web_content` SET `web_content_photo` = '$web_content_photo' WHERE `web_content_id` = '$_SESSION[web_content_id]'";
		$web_content_photo_Reult = mysqli_query($con,$web_content_photo_Update);
		$table =  'web_content';
		min_resize($web_content_photo,$table);
	}
	if($_FILES['web_content_cover']['name']!=''){
		$suffix = strrchr($_FILES["web_content_cover"]["name"],".");
		suffix($suffix);
		@unlink("../Files/web_content_cover/".$web_content['web_content_cover']);
		@unlink("../Files/web_content_min/".$web_content['web_content_cover']);
		$suffix = strrchr($_FILES["web_content_cover"]["name"],".");
		$web_content_cover = rand().$suffix;
		$upload = move_uploaded_file($_FILES["web_content_cover"]["tmp_name"],"../Files/web_content_cover/".$web_content_cover);
		$web_content_cover_Update = "UPDATE `web_content` SET `web_content_cover` = '$web_content_cover' WHERE `web_content_id` = '$_SESSION[web_content_id]'";
		$web_content_cover_Reult = mysqli_query($con,$web_content_cover_Update);
	}

	if ($web_content_Reult) {
		echo"<script>   window.location='web_content_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไขหน้าเพจ   : <span class="text-primary bold"> <?php echo $web_content[web_content_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="web_content_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " หน้าเพจ " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > เมนูหลัก  </label>
										<div class="col-md-6">
											<select class="form-control"   name="mainmenu_id" >
												<?
												$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$web_content[mainmenu_id]'  ORDER BY mainmenu_sort ASC";
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
												$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id != '$web_content[mainmenu_id]' ORDER BY mainmenu_sort ASC ";
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
										<label class="control-label col-md-3" > ชื่อหน้าเพจ <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="web_content_name" type="text" class="form-control" value="<? echo $web_content[web_content_name]; ?>" name="web_content_name"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูป cover แนวยาว </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="web_content_cover"  >
										</div>
										<label class="control-label col-md-3 text-left" >
											รูปที่จะนำมาแทนรูปเดิม
										</label>
									</div>
									<div class="form-group"> 
										<label class="control-label col-md-3" > รูปเนื้อหา   </label>
										<div class="col-md-6">
											<input type="file"  class="form-control"  name="web_content_photo">
										</div>
										<label class="control-label col-md-3 text-left" >
											รูปที่จะนำมาแทนรูปเดิม
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="web_content_detail" class="form-control" rows="4" name="web_content_detail"><? echo $web_content[web_content_detail]; ?></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหาทั้งหมด 
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="web_content_review">
										<? echo $web_content[web_content_review]; ?>
									</textarea>
								</div>
							</div>	
							<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info" style="margin: 15px 0px;">
								<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
							</button>
							<input type="hidden" name="web_contentUpdate" value="x">
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



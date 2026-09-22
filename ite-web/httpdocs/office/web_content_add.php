<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'web_content.php';

if ($_POST['web_content_Add']) {

	$mainmenu_id = function_review($_POST['mainmenu_id']);
	$web_content_guide = function_review($_POST['web_content_guide']);
	$web_content_name = function_teeth($_POST['web_content_name']);
	$web_content_eng_name = function_teeth($_POST['web_content_eng_name']);
	$web_content_detail = function_teeth($_POST['web_content_detail']);
	$web_content_eng_detail = function_teeth($_POST['web_content_eng_detail']);
	$web_content_review = function_review($_POST['web_content_review']);
	$web_content_eng_review = function_review($_POST['web_content_eng_review']);

	

	$highlight_name = " ";
	for($i=0;$i<count($_POST["highlight_name"]);$i++){
		if(trim($_POST["highlight_name"][$i]) != ""){
			$highlight_name .= $_POST["highlight_name"][$i];
			if ($i<count($_POST["highlight_name"])-1) {
				$highlight_name .= " , ";
			}
			
		}
	}

	$web_content_page = rand();
	$web_content_Add = "INSERT INTO `web_content` (`mainmenu_id`,`highlight_name`,`web_content_page`,`web_content_name`,`web_content_guide`,`web_content_eng_name`, `web_content_detail`,`web_content_eng_detail`, `web_content_photo`,`web_content_review`,`web_content_eng_review`,`web_content_datetime`,`web_content_date`,`web_content_time`)
	VALUES('$mainmenu_id','$highlight_name','$web_content_page','$web_content_name','$web_content_guide','$web_content_eng_name','$web_content_detail','$web_content_eng_detail','$web_content_photo','$web_content_review','$web_content_eng_review',now(),now(),now())";
	$web_content_Reult = mysqli_query($con,$web_content_Add);
	$_SESSION[web_content_id] = mysqli_insert_id($con);
	if (!$web_content_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด หรือ ลิ้งเพจซ้ำ'); window.history.back(); </script>";
	}
	if ($web_content_Reult) {

		$web_content_SL = " SELECT * FROM web_content WHERE web_content_id = '$_SESSION[web_content_id]'";
		$web_content_QR = mysqli_query($con,$web_content_SL);
		$web_content 	= mysqli_fetch_array($web_content_QR);

		if($_FILES['web_content_photo']['name']!=''){
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
			$web_content_cover = rand().$suffix;
			$upload = move_uploaded_file($_FILES["web_content_cover"]["tmp_name"],"../Files/web_content_cover/".$web_content_cover);
			$web_content_cover_Update = "UPDATE `web_content` SET `web_content_cover` = '$web_content_cover' WHERE `web_content_id` = '$_SESSION[web_content_id]'";
			$web_content_cover_Reult = mysqli_query($con,$web_content_cover_Update);
		}
		
		if(isset($_FILES['web_content_picture_photo']['name'])&&$_FILES['web_content_picture_photo']['name']!=''){
			$Count = count($_FILES['web_content_picture_photo']['name']);
			for ($i=0; $i < $Count; $i++) { 
				$suffix = strrchr($_FILES["web_content_picture_photo"]["name"][$i],".");
				$web_content_picture_photo = rand().rand().$suffix;
				if(move_uploaded_file($_FILES["web_content_picture_photo"]["tmp_name"][$i],"../Files/web_content_picture_photo/".$web_content_picture_photo)){
					$web_content_picture_Add = "INSERT INTO `web_content_picture` (`web_content_id`,`web_content_picture_photo`) VALUES ('$_SESSION[web_content_id]','$web_content_picture_photo')";
					$web_content_picture_Reult = mysqli_query($con,$web_content_picture_Add);
					if (!$web_content_picture_Reult) {
						echo"<script>alert('Error web_content_picture'); window.history.back(); </script>";
					}
				}
			}
		}
		

		echo"<script>  window.location='web_content_one.php?INSERT'; </script>";
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
						<h3>  เพิ่ม    หน้าเพจ      </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="web_content.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "   หน้าเพจ   " ที่ต้องการเพิ่ม
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
										<label class="control-label col-md-3" > ชื่อหน้าเพจ     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="web_content_name" type="text" class="form-control"  name="web_content_name"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูป cover แนวยาว </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="web_content_cover"  >
										</div>
										<label class="control-label col-md-3 text-left" >
											ภาพด้านบนสุดแนวยาว
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูปเนื้อหา  </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="web_content_photo"  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูปภาพเพิ่มเติม  </label>
										<div class="col-md-6">
											<input type="file"  class="form-control" multiple="multiple" name="web_content_picture_photo[]">
										</div>
										<label class="control-label col-md-3 text-left" >
											สามารถเพิ่มได้ภายหลัง
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="web_content_detail" class="form-control" rows="4" name="web_content_detail"  placeholder="หน้าเพจแนะนำ หน้าเพจ" ></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหาทั้งหมด 
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="web_content_review"></textarea>
								</div>
							</div>
							<div class="row" >
								<div class="col-md-12">
									<button Type="submit"  class="btn btn-success">
										<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
									</button>
									<input Type="hidden" name="web_content_Add" value="x">
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



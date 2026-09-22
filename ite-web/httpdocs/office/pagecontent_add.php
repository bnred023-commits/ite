<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'pagecontent.php';

if ($_POST['pagecontent_Add']) {

	$pagecontent_topic = function_teeth($_POST['pagecontent_topic']);
	$pagecontent_name = function_page($_POST['pagecontent_topic']);
	$pagecontent_review = function_review($_POST['pagecontent_review']);
	$pagecontent_detail = function_teeth($_POST['pagecontent_detail']);

	$pagecontent_Add = "INSERT INTO `pagecontent` (`pagecontent_detail`,`pagecontent_topic`,`pagecontent_review`,`pagecontent_name`,`pagecontent_update`)
	VALUES ('$pagecontent_detail','$pagecontent_topic','$pagecontent_review','$pagecontent_name',now())";

	$pagecontent_Reult = mysqli_query($con,$pagecontent_Add);
	$_SESSION[pagecontent_id] = mysqli_insert_id($con);
	if (!$pagecontent_Reult) {
		echo"<script>alert('ลิ้งเพจ ซ้ำกับที่มีอยู่ในเว็บไซต์'); window.history.back(); </script>";
	}
	if ($pagecontent_Reult) {
		if($_FILES['pagecontent_photo']['name']!=''){
			$suffix = strrchr($_FILES["pagecontent_photo"]["name"],".");
			$pagecontent_photo = rand().$suffix;
			$upload = move_uploaded_file($_FILES["pagecontent_photo"]["tmp_name"],"../Files/pagecontent_photo/".$pagecontent_photo);
			$pagecontent_photo_Update = "UPDATE `pagecontent` SET `pagecontent_photo` = '$pagecontent_photo' WHERE `pagecontent_id` = '$_SESSION[pagecontent_id]'";
			$pagecontent_photo_Reult = mysqli_query($con,$pagecontent_photo_Update);
			$table =  'pagecontent';
			min_resize($pagecontent_photo,$table);
		}
		echo"<script>  window.location='pagecontent_one.php?INSERT'; </script>";
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
						<h3>  เพิ่ม  หน้าเพจเพิ่มเติม   </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="pagecontent.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " หน้าเพจเพิ่มเติม " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > หน้าเพจเพิ่มเติม   <span class="text-red"> * </span>   </label>
										<div class="col-md-6">
											<input type="text" class="form-control"  name="pagecontent_topic"   required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<h4 class="bold">
												รายละเอียด, เนื้อหา
											</h4>
										</div>
										<div class="col-md-12">
											<textarea class="ckeditor" name="pagecontent_review"></textarea>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" ></label>
										<div class="col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="pagecontent_Add" value="x">
										</div>
									</div>
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

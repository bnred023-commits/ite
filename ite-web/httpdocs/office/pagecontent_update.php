<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'pagecontent.php';

if (isset($_GET[pagecontent_id])){
	$_SESSION[pagecontent_id] =  $_GET[pagecontent_id];
}
$pagecontent_id =   $_SESSION[pagecontent_id];
$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_id = '$pagecontent_id'";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

if ($_POST['pagecontent_update']) {

	$pagecontent_topic = function_teeth($_POST['pagecontent_topic']);
	$pagecontent_review = function_review($_POST['pagecontent_review']);
	$pagecontent_detail = function_teeth($_POST['pagecontent_detail']);

	$pagecontent_update = "UPDATE `pagecontent` SET `pagecontent_topic` = '$pagecontent_topic' ,
	`pagecontent_review` = '$pagecontent_review',
	`pagecontent_detail` = '$pagecontent_detail'
	WHERE `pagecontent_id` = '$pagecontent_id'";

	$pagecontent_Reult = mysqli_query($con,$pagecontent_update);

	if (!$pagecontent_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($pagecontent_Reult) {
		if($_FILES['pagecontent_photo']['name']!=''){
			$suffix = strrchr($_FILES["pagecontent_photo"]["name"],".");
		suffix($suffix);
		
			@unlink("../Files/pagecontent_photo/".$pagecontent['pagecontent_photo']);
			$suffix = strrchr($_FILES["pagecontent_photo"]["name"],".");
			$pagecontent_photo = $pagecontent[pagecontent_page]."-".rand().$suffix;
			$upload = move_uploaded_file($_FILES["pagecontent_photo"]["tmp_name"],"../Files/pagecontent_photo/".$pagecontent_photo);
			$pagecontent_photo_Update = "UPDATE `pagecontent` SET `pagecontent_photo` = '$pagecontent_photo' WHERE `pagecontent_id` = '$_SESSION[pagecontent_id]'";
			$pagecontent_photo_Reult = mysqli_query($con,$pagecontent_photo_Update);
			$table =  'pagecontent';
			min_resize($pagecontent_photo,$table);
		}
		echo"<script>   window.location='pagecontent_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไข  หน้าเพจเพิ่มเติม  : <span class="text-primary bold"> <?php echo $pagecontent[pagecontent_topic]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a  onclick="goBack()" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด " หน้าเพจเพิ่มเติม " ที่ต้องการแก้ไข 
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-3" >ชื่อ หน้าเพจเพิ่มเติม  <span class="text-red"> * </span>  </label>
										<div class="col-md-6">
											<input type="text" class="form-control"   value="<? echo $pagecontent[pagecontent_topic]; ?>" name="pagecontent_topic"  placeholder="ชื่อ หน้าเพจเพิ่มเติม " required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > เนื้อหา  </label>
										<div class="col-md-9">
											<textarea class="ckeditor" name="pagecontent_review"><? echo $pagecontent[pagecontent_review]; ?></textarea>	
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-5">
											<input type="hidden" name="pagecontent_update" value="x">
											<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
										</div>
									</div>
								</form>
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



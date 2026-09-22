<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'mainmenu.php';

if (isset($_GET[mainmenu_id])){
	$_SESSION[mainmenu_id] =  $_GET[mainmenu_id];
}
$mainmenu_id =   $_SESSION[mainmenu_id];
$_SESSION['page'] = 'mainmenu_id='.$mainmenu_id;

$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$mainmenu_id'";
$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
$mainmenu 	= mysqli_fetch_array($mainmenu_QR);

if ($_POST['mainmenuUpdate']) {

	$mainmenu_name = function_teeth($_POST['mainmenu_name']);
	$mainmenu_detail = function_teeth($_POST['mainmenu_detail']);



	$mainmenu_Update = "UPDATE `mainmenu` SET `mainmenu_name` = '$mainmenu_name',`mainmenu_detail` = '$mainmenu_detail' WHERE `mainmenu_id` = '$mainmenu_id'";
	$mainmenu_Reult = mysqli_query($con,$mainmenu_Update);

	if (!$mainmenu_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['mainmenu_cover']['name']!=''){
		$suffix = strrchr($_FILES["mainmenu_cover"]["name"],".");
		suffix($suffix);
		@unlink("../Files/mainmenu_cover/".$mainmenu['mainmenu_cover']);
		$suffix = strrchr($_FILES["mainmenu_cover"]["name"],".");
		$mainmenu_cover = rand().$suffix;
		$upload = move_uploaded_file($_FILES["mainmenu_cover"]["tmp_name"],"../Files/mainmenu_cover/".$mainmenu_cover);
		$mainmenu_cover_Update = "UPDATE `mainmenu` SET `mainmenu_cover` = '$mainmenu_cover' WHERE `mainmenu_id` = '$_SESSION[mainmenu_id]'";
		$mainmenu_cover_Reult = mysqli_query($con,$mainmenu_cover_Update);
	}

	if ($mainmenu_Reult) {
		echo"<script>   window.location='mainmenu_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไข     เมนูหลัก   : <span class="text-primary bold"> <?php echo $mainmenu[mainmenu_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="mainmenu_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " เมนูหลัก " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อ เมนูหลัก <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="mainmenu_name" type="text" class="form-control" value="<? echo $mainmenu[mainmenu_name]; ?>" name="mainmenu_name"  required  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รูป cover </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="mainmenu_cover"  >
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="mainmenuUpdate" value="x">
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



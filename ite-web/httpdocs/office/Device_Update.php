<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'Device.php';

if (isset($_GET[DeviceID])){
	$_SESSION[DeviceID] =  $_GET[DeviceID];
}
$DeviceID =   $_SESSION[DeviceID] ;

$Device_SL = " SELECT * FROM Device WHERE DeviceID = '$DeviceID'";
$Device_QR = mysqli_query($con,$Device_SL);
$Device 	= mysqli_fetch_array($Device_QR);

if ($_POST['Device_Update']) {

	$DeviceName = trim($_POST['DeviceName']);
	$DeviceName= str_replace("'","&#39;",$DeviceName);
	$DeviceName= str_replace("\"","&quot;",$DeviceName);


	$DeviceText1 = trim($_POST['DeviceText1']);
	$DeviceText1= str_replace("'","&#39;",$DeviceText1);
	$DeviceText1= str_replace("\"","&quot;",$DeviceText1);

	$DeviceText2 = trim($_POST['DeviceText2']);
	$DeviceText2= str_replace("'","&#39;",$DeviceText2);
	$DeviceText2= str_replace("\"","&quot;",$DeviceText2);

	$DeviceText3 = trim($_POST['DeviceText3']);
	$DeviceText3= str_replace("'","&#39;",$DeviceText3);
	$DeviceText3= str_replace("\"","&quot;",$DeviceText3);



	$Device_Update = "UPDATE `Device` SET `DeviceName` = '$DeviceName' ,

	`DeviceText1` = '$DeviceText1' ,
	`DeviceText2` = '$DeviceText2' ,
	`DeviceText3` = '$DeviceText3'  
	
	WHERE `DeviceID` = '$DeviceID'";
	$Device_Reult = mysqli_query($con,$Device_Update);

	if (!$Device_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['DevicePhoto']['name']!=''){
		$suffix = strrchr($_FILES["DevicePhoto"]["name"],".");
		suffix($suffix);
		
		@unlink("../Files/DevicePhoto/".$Device['DevicePhoto']);
		$DevicePhoto = rand().$_FILES["DevicePhoto"]["name"];
		$upload = move_uploaded_file($_FILES["DevicePhoto"]["tmp_name"],"../Files/DevicePhoto/".$DevicePhoto);
		$DevicePhoto_Update = "UPDATE `Device` SET `DevicePhoto` = '$DevicePhoto' WHERE `DeviceID` = '$DeviceID'";
		$DevicePhoto_Reult = mysqli_query($con,$DevicePhoto_Update);
	}

	if ($Device_Reult) {
		echo"<script>   window.location='Device.php?UPDATE'; </script>";
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
						<h3>  แก้ไข อุปกรณ์ : <span class="text-primary bold"> <?php echo $Device[DeviceName]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="Device.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด "อุปกรณ์" ที่ต้องการแก้ไข 
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-2" >ชื่ออุปกรณ์ <span class="text-red"> * </span>  </label>
										<div class="col-md-5">
											<input type="text" class="form-control"   value="<? echo $Device[DeviceName]; ?>" name="DeviceName"  placeholder="ชื่ออุปกรณ์" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > คำค้นหา  </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="DeviceText1"  value="<? echo $Device[DeviceText1] ?>" placeholder="คำค้นหา" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > คำค้นหา  </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="DeviceText2"  value="<? echo $Device[DeviceText2] ?>" placeholder="คำค้นหา" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > คำค้นหา  </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="DeviceText3"  value="<? echo $Device[DeviceText3] ?>" placeholder="คำค้นหา" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รูปอุปกรณ์  </label>
										<div class="col-md-5">
											<input type="file" class="form-control br2" name="DevicePhoto"  placeholder="" >
										</div>
										<label class="control-label col-md-2 text-left" > รูปใหม่ที่ต้องการเปลี่ยน </label>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-5">
											<input type="hidden" name="Device_Update" value="x">
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



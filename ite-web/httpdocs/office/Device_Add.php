<? 

include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'Device.php';

if ($_POST['Device_Add']) {

	$DevicePhoto = rand().$_FILES["DevicePhoto"]["name"];

	if(move_uploaded_file($_FILES["DevicePhoto"]["tmp_name"],"../Files/DevicePhoto/".$DevicePhoto)){

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

		$Device_Add = "INSERT INTO `Device` (`DeviceText1`,`DeviceText2`,`DeviceText3`,`DeviceName`,`DevicePhoto`) VALUES ('$DeviceText1','$DeviceText2','$DeviceText3','$DeviceName','$DevicePhoto')";
		$Device_Reult = mysqli_query($con,$Device_Add);

		if (!$Device_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($Device_Reult) {
			echo"<script>  window.location='Device.php?INSERT'; </script>";
		}
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
						<h3>  เพิ่ม อุปกรณ์  </h3>
						<hr>
					</div>
				</div>

				<div class="row">

					<div class="col-md-12 br-margin2">
						<a href="Device.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>

					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">

							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "อุปกรณ์" ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-2" > ชื่ออุปกรณ์  <span class="text-red"> * </span>   </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="DeviceName"  placeholder="ชื่ออุปกรณ์" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > คำค้นหา  </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="DeviceText1"  placeholder="คำค้นหา" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > คำค้นหา  </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="DeviceText2"  placeholder="คำค้นหา" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > คำค้นหา  </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="DeviceText3"  placeholder="คำค้นหา" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > รูปอุปกรณ์  <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="file" class="form-control"  name="DevicePhoto" required >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" ></label>
										<div class="col-md-5">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="Device_Add" value="x">
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



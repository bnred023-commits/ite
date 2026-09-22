<? 

include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'qrcode.php';

if ($_POST['qrcode_Add']) {

	$qrcode_type	= $_POST['qrcode_type'];
	$qrcode_link	= $_POST['qrcode_link'];
	$qrcode_link	= str_replace("'","&#39;",$qrcode_link);
	$qrcode_link	= str_replace("\"","&quot;",$qrcode_link);
	$qrcode_link	= str_replace("http://","",$qrcode_link);
	$qrcode_link	= str_replace("https://","",$qrcode_link);

	$qrcode_Add 	= "INSERT INTO `qrcode` (`qrcode_id`, `qrcode_type`, `qrcode_link`, `qrcode_sort`) VALUES (NULL, '$qrcode_type', '$qrcode_link', NULL);";
	$qrcode_Reult 	= mysqli_query($con,$qrcode_Add);
	$qrcode_id 		= mysqli_insert_id($con);
	if (!$qrcode_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if($_FILES['qrcode_photo']['name']!=''){
		$Jpg = strrchr($_FILES["qrcode_photo"]["name"],".");
		$qrcode_photo = rand()." ".rand().$Jpg;
		$upload = move_uploaded_file($_FILES["qrcode_photo"]["tmp_name"],"../Files/qrcode_photo/".$qrcode_photo);
		$qrcode_photo_Update = "UPDATE `qrcode` SET `qrcode_photo` = '$qrcode_photo' WHERE `qrcode_id` = '$qrcode_id'";
		$qrcode_photo_Reult = mysqli_query($con,$qrcode_photo_Update);
	}
	if ($qrcode_Reult) {
		echo"<script>  window.location='qrcode.php?INSERT'; </script>";
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
						<h3>  เพิ่ม คิวอาร์โค้ด  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="qrcode.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "คิวอาร์โค้ด"  ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-2" >รูป  </label>
										<div class="col-md-5">
											<input type="file" class="form-control br2" name="qrcode_photo"  placeholder="" title="อัพเดทรูป">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ประเภท <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="text" title="หากเป็นเบอร์โทรศัพท์  ให้กรอกคำว่า Tel จะสามารถกดโทรได้"  class="form-control"  name="qrcode_type"  placeholder=" Tel , Line , Facebook " required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ลิ้ง </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="qrcode_link" placeholder=" www.facebook.com  , 0899999999 "  title="หากเป็น Tel ให้ใส่เบอร์ห้ามเว้นวรรค">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" ></label>
										<div class="col-md-5">
											<button type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input type="hidden" name="qrcode_Add" value="x">
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



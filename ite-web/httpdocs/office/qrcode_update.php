<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'qrcode.php';

if (isset($_GET[qrcode_id])){
	$_SESSION[qrcode_id] =  $_GET[qrcode_id];
}
$qrcode_id =   $_SESSION[qrcode_id] ;

$qrcode_SL = " SELECT * FROM qrcode WHERE qrcode_id = '$qrcode_id'";
$qrcode_QR = mysqli_query($con,$qrcode_SL);
$qrcode 	= mysqli_fetch_array($qrcode_QR);

if ($_POST['qrcode_Update']) {
	
	$qrcode_type = $_POST['qrcode_type'];
	$qrcode_link = $_POST['qrcode_link'];
	$qrcode_link= str_replace("'","&#39;",$qrcode_link);
	$qrcode_link= str_replace("\"","&quot;",$qrcode_link);
	$qrcode_link= str_replace("http://","",$qrcode_link);
	$qrcode_link= str_replace("https://","",$qrcode_link);

	$qrcode_Update = "UPDATE `qrcode` SET `qrcode_link` = '$qrcode_link',`qrcode_type` = '$qrcode_type' WHERE `qrcode_id` = '$qrcode_id'";
	$qrcode_Reult = mysqli_query($con,$qrcode_Update);
	if (!$qrcode_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if($_FILES['qrcode_photo']['name']!=''){
		$suffix = strrchr($_FILES["qrcode_photo"]["name"],".");
		suffix($suffix);
		
		@unlink("../Files/qrcode_photo/".$qrcode['qrcode_photo']);
		$Jpg = strrchr($_FILES["qrcode_photo"]["name"],".");
		$qrcode_photo = rand()." ".rand().$Jpg;
		$upload = move_uploaded_file($_FILES["qrcode_photo"]["tmp_name"],"../Files/qrcode_photo/".$qrcode_photo);
		$qrcode_photo_Update = "UPDATE `qrcode` SET `qrcode_photo` = '$qrcode_photo' WHERE `qrcode_id` = '$qrcode_id'";
		$qrcode_photo_Reult = mysqli_query($con,$qrcode_photo_Update);
	}
	if ($qrcode_Reult) {
		echo"<script>   window.location='qrcode.php?UPDATE'; </script>";
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
						<h3>  แก้ไข คิวอาร์โค้ด : <span class="text-primary bold"> <?php echo $qrcode[qrcode_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="qrcode.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด "คิวอาร์โค้ด"  ที่ต้องการแก้ไข
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-2" >รูป  </label>
										<div class="col-md-5">
											<input type="file" class="form-control br2" name="qrcode_photo"  placeholder="" title="แก้ไขรูป">
										</div>
										<label class="control-label col-md-2 text-left text-red" >  รูปใหม่ที่ต้องการนำมาแทน  </label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ประเภท <span class="text-red"> * </span></label>
										<div class="col-md-5">
											<input  value="<? echo $qrcode[qrcode_type]; ?>"   type="text" class="form-control" title="กรอกคำว่า Tel จะสามารถกดโทรได้" required name="qrcode_type"  placeholder=" Tel , Line , Facebook ">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ลิ้ง </label>
										<div class="col-md-5">
											<input value="<? echo $qrcode[qrcode_link]; ?>" type="text" class="form-control"  name="qrcode_link"  placeholder="www.facebook.com  , 0899999999 " title="ไม่ต้องกรอกก็ได้">
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-5">
											<button onclick="return confirm('ยืนยันการแก้ไขข้อมูล ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="qrcode_Update" value="x">
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



<? 

include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'slides.php';

if ($_POST['slides_add']) {

	$slides_topic = function_teeth($_POST['slides_topic']);
	$slides_detail = function_teeth($_POST['slides_detail']);
	$slides_link = function_link($_POST['slides_link']);
	$slides_youtube = function_youtube($_POST['slides_youtube']);
	$slides_facebook = $_POST['slides_facebook'];

	$slides_add = "INSERT INTO `slides` (`slides_topic`,`slides_detail`,`slides_link`,`slides_youtube`,`slides_facebook`) VALUES ('$slides_topic','$slides_detail','$slides_link','$slides_youtube','$slides_facebook')";
	$slides_Reult = mysqli_query($con,$slides_add);
	$_SESSION[slides_id] = mysqli_insert_id($con);
	if (!$slides_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($slides_Reult) {

		if($_FILES['slides_photo']['name']!=''){

			$suffix = strrchr($_FILES["slides_photo"]["name"],".");
			suffix($suffix);


			$slides_SL = " SELECT * FROM slides WHERE slides_id = '$_SESSION[slides_id]'";
			$slides_QR = mysqli_query($con,$slides_SL);
			$slides 	= mysqli_fetch_array($slides_QR);
			@unlink("../Files/slides_photo/".$slides['slides_photo']);
			$Jpg = strrchr($_FILES["slides_photo"]["name"],".");
			$slides_photo =rand().$Jpg;;
			$upload = move_uploaded_file($_FILES["slides_photo"]["tmp_name"],"../Files/slides_photo/".$slides_photo);
			$slides_photo_Update = "UPDATE `slides` SET `slides_photo` = '$slides_photo' WHERE `slides_id` = '$_SESSION[slides_id]'";
			$slides_photo_Reult = mysqli_query($con,$slides_photo_Update);
		}
		if($_FILES['slides_video']['name']!=''){

			$suffix = strrchr($_FILES["slides_video"]["name"],".");
			suffix($suffix);
			
			$slides_SL = " SELECT * FROM slides WHERE slides_id = '$_SESSION[slides_id]'";
			$slides_QR = mysqli_query($con,$slides_SL);
			$slides 	= mysqli_fetch_array($slides_QR);
			@unlink("../Files/slides_video/".$slides['slides_video']);
			$Jpg = strrchr($_FILES["slides_video"]["name"],".");
			$slides_video = rand().rand().$Jpg;;
			$upload = move_uploaded_file($_FILES["slides_video"]["tmp_name"],"../Files/slides_video/".$slides_video);
			$slides_video_Update = "UPDATE `slides` SET `slides_video` = '$slides_video' WHERE `slides_id` = '$_SESSION[slides_id]'";
			$slides_video_Reult = mysqli_query($con,$slides_video_Update);
		}

		echo"<script>  window.location='slides.php?INSERT'; </script>";
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
						<h3>  เพิ่ม สไลด์ </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="slides.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "สไลด์"  ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > รูปสไลด์  </label>
										<div class="col-md-6">
											<input type="file" class="form-control"  name="slides_photo">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > หัวข้อสไลด์ </label>
										<div class="col-md-6">
											<input id="slides_topic" type="text" class="form-control"  name="slides_topic"  maxlength="30" placeholder="ความยาวไม่เกิน 30  ตัวอักษร" >
										</div>
										<label class="control-label col-md-2 text-left" > <span id="slides_topic_chars" class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var slides_topic = 30;
											$('#slides_topic').keyup(function() {
												var length = $(this).val().length;
												var length = slides_topic-length;
												$('#slides_topic_chars').text(length);
											});
										</script>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ข้อความขนาดเล็ก </label>
										<div class="col-md-6">
											<input id="slides_detail" type="text" class="form-control"  name="slides_detail"  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
										</div>
										<label class="control-label col-md-2 text-left" > <span id="slides_detail_chars" class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var slides_detail = 80;
											$('#slides_detail').keyup(function() {
												var length = $(this).val().length;
												var length = slides_detail-length;
												$('#slides_detail_chars').text(length);
											});
										</script>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ลิ้ง  </label>
										<div class="col-md-6">
											<input name="slides_link" Type="text" class="form-control" placeholder="ไม่จำเป็น">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" ></label>
										<div class="col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="slides_add" value="x">
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



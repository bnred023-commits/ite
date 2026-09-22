<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'suggestion.php';

if (isset($_GET[suggestion_id])){
	$_SESSION[suggestion_id] =  $_GET[suggestion_id];
}
$suggestion_id =   $_SESSION[suggestion_id] ;

$suggestion_SL = " SELECT * FROM suggestion WHERE suggestion_id = '$suggestion_id'";
$suggestion_QR = mysqli_query($con,$suggestion_SL);
$suggestion 	= mysqli_fetch_array($suggestion_QR);

if ($_POST['suggestionUpdate']) {

	$suggestion_name = function_teeth($_POST['suggestion_name']);
	$suggestion_eng_name = function_teeth($_POST['suggestion_eng_name']);
	$suggestion_detail = function_teeth($_POST['suggestion_detail']);
	$suggestion_eng_detail = function_teeth($_POST['suggestion_eng_detail']);
	$suggestion_review = function_review($_POST['suggestion_review']);
	$suggestion_eng_review = function_review($_POST['suggestion_eng_review']);

		$suggestion_guide = function_review($_POST['suggestion_guide']);


	$suggestion_Update = "UPDATE `suggestion` SET `suggestion_datetime` = NOW(),
	`highlight_name` = '$highlight_name',
	`suggestion_name` = '$suggestion_name',
	`suggestion_eng_name` = '$suggestion_eng_name',
	`suggestion_detail` = '$suggestion_detail',
	`suggestion_eng_detail` = '$suggestion_eng_detail',
	`suggestion_eng_review` = '$suggestion_eng_review',
	`suggestion_guide` = '$suggestion_guide',
	`suggestion_review` = '$suggestion_review' WHERE `suggestion_id` = '$suggestion_id'";
	$suggestion_Reult = mysqli_query($con,$suggestion_Update);

	if (!$suggestion_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['suggestion_photo']['name']!=''){
		$suffix = strrchr($_FILES["suggestion_photo"]["name"],".");
		suffix($suffix);
		@unlink("../Files/suggestion_photo/".$suggestion['suggestion_photo']);
		@unlink("../Files/suggestion_min/".$suggestion['suggestion_photo']);
		$suffix = strrchr($_FILES["suggestion_photo"]["name"],".");
		$suggestion_photo = rand().$suffix;
		$upload = move_uploaded_file($_FILES["suggestion_photo"]["tmp_name"],"../Files/suggestion_photo/".$suggestion_photo);
		$suggestion_photo_Update = "UPDATE `suggestion` SET `suggestion_photo` = '$suggestion_photo' WHERE `suggestion_id` = '$_SESSION[suggestion_id]'";
		$suggestion_photo_Reult = mysqli_query($con,$suggestion_photo_Update);
		$table =  'suggestion';
		min_resize($suggestion_photo,$table);
	}

	if ($suggestion_Reult) {
		echo"<script>   window.location='suggestion_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไขจุดเด่นของเรา   : <span class="text-primary bold"> <?php echo $suggestion[suggestion_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="suggestion_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " จุดเด่นของเรา " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group"> 
										<label class="control-label col-md-3" > รูปจุดเด่นของเรา   </label>
										<div class="col-md-6">
											<input type="file"  class="form-control"  name="suggestion_photo">
										</div>
										<label class="control-label col-md-3 text-left" >
											รูปที่จะนำมาแทนรูปเดิม
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อจุดเด่นของเรา <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="suggestion_name" type="text" class="form-control" value="<? echo $suggestion[suggestion_name]; ?>" name="suggestion_name"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="suggestion_detail" class="form-control" rows="4" name="suggestion_detail"><? echo $suggestion[suggestion_detail]; ?></textarea>
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="suggestionUpdate" value="x">
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



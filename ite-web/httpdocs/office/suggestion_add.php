<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'suggestion.php';

if ($_POST['suggestion_Add']) {

	$suggestion_guide = function_review($_POST['suggestion_guide']);

	$suggestion_name = function_teeth($_POST['suggestion_name']);
	$suggestion_eng_name = function_teeth($_POST['suggestion_eng_name']);
	$suggestion_detail = function_teeth($_POST['suggestion_detail']);
	$suggestion_eng_detail = function_teeth($_POST['suggestion_eng_detail']);
	$suggestion_review = function_review($_POST['suggestion_review']);
	$suggestion_eng_review = function_review($_POST['suggestion_eng_review']);

	

	$highlight_name = " ";
	for($i=0;$i<count($_POST["highlight_name"]);$i++){
		if(trim($_POST["highlight_name"][$i]) != ""){
			$highlight_name .= $_POST["highlight_name"][$i];
			if ($i<count($_POST["highlight_name"])-1) {
				$highlight_name .= " , ";
			}
			
		}
	}

	$suggestion_page = rand();
	$suggestion_Add = "INSERT INTO `suggestion` (`highlight_name`,`suggestion_page`,`suggestion_name`,`suggestion_guide`,`suggestion_eng_name`, `suggestion_detail`,`suggestion_eng_detail`, `suggestion_photo`,`suggestion_review`,`suggestion_eng_review`,`suggestion_datetime`,`suggestion_date`,`suggestion_time`)
	VALUES('$highlight_name','$suggestion_page','$suggestion_name','$suggestion_guide','$suggestion_eng_name','$suggestion_detail','$suggestion_eng_detail','$suggestion_photo','$suggestion_review','$suggestion_eng_review',now(),now(),now())";
	$suggestion_Reult = mysqli_query($con,$suggestion_Add);
	$_SESSION[suggestion_id] = mysqli_insert_id($con);
	if (!$suggestion_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด หรือ ลิ้งเพจซ้ำ'); window.history.back(); </script>";
	}
	if ($suggestion_Reult) {

		$suggestion_SL = " SELECT * FROM suggestion WHERE suggestion_id = '$_SESSION[suggestion_id]'";
		$suggestion_QR = mysqli_query($con,$suggestion_SL);
		$suggestion 	= mysqli_fetch_array($suggestion_QR);

		if($_FILES['suggestion_photo']['name']!=''){
			$suffix = strrchr($_FILES["suggestion_photo"]["name"],".");
			$suggestion_photo = rand().$suffix;
			$upload = move_uploaded_file($_FILES["suggestion_photo"]["tmp_name"],"../Files/suggestion_photo/".$suggestion_photo);
			$suggestion_photo_Update = "UPDATE `suggestion` SET `suggestion_photo` = '$suggestion_photo' WHERE `suggestion_id` = '$_SESSION[suggestion_id]'";
			$suggestion_photo_Reult = mysqli_query($con,$suggestion_photo_Update);
			$table =  'suggestion';
			min_resize($suggestion_photo,$table);
		}
		
		if(isset($_FILES['suggestion_picture_photo']['name'])&&$_FILES['suggestion_picture_photo']['name']!=''){
			$Count = count($_FILES['suggestion_picture_photo']['name']);
			for ($i=0; $i < $Count; $i++) { 
				$suffix = strrchr($_FILES["suggestion_picture_photo"]["name"][$i],".");
				$suggestion_picture_photo = rand().rand().$suffix;
				if(move_uploaded_file($_FILES["suggestion_picture_photo"]["tmp_name"][$i],"../Files/suggestion_picture_photo/".$suggestion_picture_photo)){
					$suggestion_picture_Add = "INSERT INTO `suggestion_picture` (`suggestion_id`,`suggestion_picture_photo`) VALUES ('$_SESSION[suggestion_id]','$suggestion_picture_photo')";
					$suggestion_picture_Reult = mysqli_query($con,$suggestion_picture_Add);
					if (!$suggestion_picture_Reult) {
						echo"<script>alert('Error suggestion_picture'); window.history.back(); </script>";
					}
				}
			}
		}
		

		echo"<script>  window.location='suggestion_one.php?INSERT'; </script>";
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
						<h3>  เพิ่ม    หัวข้อแนะนำเว็บ      </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="suggestion.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "   หัวข้อแนะนำเว็บ   " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > รูปหัวข้อแนะนำเว็บ    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="suggestion_photo"  required>
										</div>
										<label class="control-label col-md-3 text-left" >
											แสดงเป็นภาพปก
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อหัวข้อแนะนำเว็บ     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="suggestion_name" type="text" class="form-control"  name="suggestion_name"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="suggestion_detail" class="form-control" rows="4" name="suggestion_detail"  placeholder="ข้อมูลแนะนำ หัวข้อแนะนำเว็บ" ></textarea>
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="suggestion_Add" value="x">
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



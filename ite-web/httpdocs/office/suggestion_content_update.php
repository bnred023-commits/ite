<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'suggestion.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'suggestion_content'";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);


if ($_POST['pagecontent_update']) {
	
	$pagecontent_review = $_POST['pagecontent_review'];
	$pagecontent_eng_review = $_POST['pagecontent_eng_review'];

	$pagecontent_Update = "UPDATE `pagecontent` SET `pagecontent_review` = '$pagecontent_review' ,`pagecontent_eng_review` = '$pagecontent_eng_review' ,`pagecontent_update` = NOW()  WHERE pagecontent_name = 'suggestion_content'";
	$pagecontent_Reult = mysqli_query($con,$pagecontent_Update);

	if (!$pagecontent_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($pagecontent_Reult) {
		echo"<script>  window.location='suggestion_content.php?UPDATE'; </script>";
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
						<h3>  แก้ไข   ข้อความที่แสดงหน้าแรก ส่วนของหัวข้อแนะนำเว็บ  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="suggestion_content.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form method="post" action="">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "  ข้อความที่แสดงหน้าแรก ส่วนของหัวข้อแนะนำเว็บ " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<textarea required class="ckeditor" name="pagecontent_review">
											<? echo $pagecontent[pagecontent_review]; ?>
										</textarea>
									</div>
									<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
										<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
									</button>
									<input type="hidden" name="pagecontent_update" value="x">
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



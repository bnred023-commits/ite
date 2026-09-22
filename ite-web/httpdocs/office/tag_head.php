<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'tag_head.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'tag_head' ";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

$pagecontent_id = $pagecontent[pagecontent_id];

if ($_POST['pagecontent_update']) {

	$pagecontent_review = htmlentities(htmlspecialchars($_POST['pagecontent_review']));
	$pagecontent_review	= str_replace("'","&#39;",$pagecontent_review);


	$pagecontent_id = $_POST['pagecontent_id'];

	$pagecontent_Update = "UPDATE `pagecontent` SET  `pagecontent_review` = '$pagecontent_review'  WHERE `pagecontent_id` = '$pagecontent_id'";
	$pagecontent_Reult = mysqli_query($con,$pagecontent_Update);
	if($pagecontent_Reult) {
		echo"<script>  window.location='$pagecontent[pagecontent_name].php?UPDATE'; </script>";
	}
	else{
		echo"<script>alert(' เกิดข้อผิดพลาดแจ้งผู้ดูแล '); window.history.back(); </script>";
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
					<div class="col-md-6">
						<h3>     แท็ก head   </h3>
					</div>
					<div class="col-md-6 text-right">

					</div>
					<div class="col-md-12">
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row" >
									<div class="col-md-12">
										รายละเอียด : <span class="text-primary"> แท็ก head </span>  
										<button  type="button" class="btn btn-info"  style="margin-top: -5px; margin-bottom: -5px;"	data-toggle="modal" data-target="#pagecontent_update<?php echo $pagecontent[pagecontent_id]; ?>">
											<span class="glyphicon glyphicon-edit"></span>
											แก้ไข
										</button>   	
									</div>
								</div>
							</div>
							<div class="panel-body">
								<?  
								$pagecontent[pagecontent_review]   = html_entity_decode(htmlspecialchars_decode($pagecontent[pagecontent_review]));
								$pagecontent[pagecontent_review]   = str_replace("&#39;","'",$pagecontent[pagecontent_review]);
								?>
								<textarea name="pagecontent_review" class="form-control" rows="10"><? echo $pagecontent[pagecontent_review]; ?></textarea>
							</div>
							<div id="pagecontent_update<?php echo $pagecontent[pagecontent_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<form action="" method="post" encType="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="exampleModalLabel"> แก้ไข :   
													<span class="text-primary">
														แท็ก head  
													</span>
												</h4>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<textarea name="pagecontent_review" class="form-control" rows="10"><? echo $pagecontent[pagecontent_review]; ?></textarea>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-info">
													<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
												</button>
												<input Type="hidden" name="pagecontent_update" value="x">
												<input Type="hidden" name="pagecontent_id" value="<?php echo $pagecontent[pagecontent_id]; ?>">
												<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
											</div>
										</form>
									</div>
								</div>
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



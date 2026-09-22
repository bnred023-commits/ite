<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'tagfooter.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'tagfooter' ";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

$pagecontent_id = $pagecontent[pagecontent_id];

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
						<h3>    ข้อความล่างสุด  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="tagfooter_update.php" class="btn btn-info">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไข
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียด  ข้อความล่างสุด 
							</div>
							<div class="panel-body">
								<? echo $pagecontent[pagecontent_review]; ?>
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



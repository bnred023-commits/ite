<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'qrcode.php';

$qrcode_SL = "SELECT * FROM qrcode ORDER BY qrcode_sort ASC ";
$qrcode_QR 	= mysqli_query($con,$qrcode_SL);
$Num_Rows = mysqli_num_rows($qrcode_QR);
$i=1;

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
						<h3>  จัดการ  คิวอาร์โค้ด  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="qrcode_add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่ม คิวอาร์โค้ด
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										คิวอาโค้ดทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
									</div>
									<div class="col-md-6 text-right" style="margin: -5px;">
										<a class="btn btn-default" onclick="location.reload()">
											รีเฟรชหน้า
										</a>
										<a class="btn btn-default" onclick="goBack()">
											<span class="glyphicon glyphicon-backward"></span>
											กลับ
										</a>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>รูป</th>
												<th>ประเภท</th>
												<th>ลิ้ง</th>
												<th>แก้ไข , ลบ</th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($qrcode 	= mysqli_fetch_array($qrcode_QR)) {
												?>
												<tr id="<?php echo $qrcode['qrcode_id'] ?>">
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<?
														if (isset($qrcode[qrcode_photo])) {
															?>
															<img style="width: 200px;" src="../Files/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>" />
															<?
														}
														else{
															?>
															-
															<?
														}
														?>
													</td>
													<td>
														<p><?php echo $qrcode[qrcode_type]; ?></p>
													</td>
													<td>
														<?
														if (isset($qrcode[qrcode_link])&&$qrcode[qrcode_link]!='') {
															?>
															<a href="http://<?php echo $qrcode[qrcode_link]; ?>" target="_blank"><?php echo $qrcode[qrcode_link]; ?></a>
															<?
														}
														else{
															?>
															-
															<?
														}
														?>
													</td>
													<td>
														<a href="qrcode_update.php?qrcode_id=<?php echo $qrcode[qrcode_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข  
														</a>
														<?
														if ($login_admin[admin_degree_id]=='1') {
															?>
															<a href="qrcode_del.php?qrcode_id=<?php echo $qrcode[qrcode_id]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')">
																<span class="glyphicon glyphicon-trash"></span>
																ลบ 
															</a>
															<?
														}
														?>
														
													</td>
												</tr>
												<?php
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>	
							</div>
						</div>
						<!-- panel -->
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
<script type="text/javascript">
	$( ".row_position" ).sortable({
		delay: 150,
		stop: function() {
			var selectedData = new Array();
			$('.row_position>tr').each(function() {
				selectedData.push($(this).attr("id"));
			});
			updateOrder(selectedData);
		}
	});
	function updateOrder(data) {
		$.ajax({
			url:"qrcode_ajax_pro.php",
			type:'post',
			data:{position:data},
			success:function(){

			}
		})
	}
</script>
</html>



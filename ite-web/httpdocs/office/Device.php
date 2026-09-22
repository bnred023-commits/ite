<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'Device.php';

$Row = "SELECT * FROM Device";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 20;   // Per Page
$Page = $_GET["Page"];
if(!$_GET["Page"]){
	$Page=1;
}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page){
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0){
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
$i=$Page_Start+1;

$Device_SL = $Row." ORDER BY DeviceID ASC LIMIT $Page_Start , $Per_Page ";
$Device_QR 	= mysqli_query($con,$Device_SL);


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
						<h3>  จัดการ อุปกรณ์  </h3>
						<hr>
					</div>
				</div>

				<? include 'index_Alerts.php'; ?>


				<div class="row">

					<div class="col-md-12 br-margin2">
						<a href="Device_Add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่มอุปกรณ์
						</a>
					</div>

					<div class="col-md-12">

						<div class="panel panel-default">
							<div class="panel-heading">
								อุปกรณ์ทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
								<?
								if ($Num_Rows=='0') {
									?>
									<span class="text-red">
										คุณยังไม่มีข้อมูลนี้กรุณาเพิ่ม
									</span>
									<?
								}
								?>
							</div>
							<div class="panel-body">
								
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>รูปอุปกรณ์</th>
												<th>อุปกรณ์</th>
												<th>รายละเอียด , แก้ไข , ลบ</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($Device 	= mysqli_fetch_array($Device_QR)) {
												?>
												<tr>
													<td><? echo $i; ?></td>
													<td >
														<img style="width: 300px;"  src="../Files/DevicePhoto/<?php echo $Device[DevicePhoto]; ?>" class="boxsha"  />
													</td>
													<td>
														<? echo $Device[DeviceName]; ?>
													</td>
													<td>
														<a href="Device_Update.php?DeviceID=<?php echo $Device[DeviceID]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="Device_Del.php?DeviceID=<?php echo $Device[DeviceID]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ?  ')"  class="btn btn-danger">
															<span class="glyphicon glyphicon-trash"></span> ลบ
														</a>
													</td>
												</tr>
												<?
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>

							</div>
							<div class="panel-footer">
								<? include 'index_Pagenum.php'; ?>
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



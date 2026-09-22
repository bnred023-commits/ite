<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'statistics_admin.php';


$Q = 1;
$Row = "SELECT * FROM statistics_admin WHERE ";

if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = trim( $_GET['keyword']);
	$keyword = str_replace("'","&#39;",$keyword);
	$keyword = str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " (  statistics_admin_detail LIKE '%$keyword%' OR   statistics_admin_save LIKE '%$keyword%' OR   statistics_admin_ip LIKE '%$keyword%' OR  statistics_admin_browser LIKE '%$keyword%'  OR  statistics_admin_language LIKE '%$keyword%'  )";
		$Q++;
	}
	else{
		$Row .= " AND (  statistics_admin_detail LIKE '%$keyword%' OR   statistics_admin_save LIKE '%$keyword%' OR   statistics_admin_ip LIKE '%$keyword%' OR  statistics_admin_browser LIKE '%$keyword%'  OR  statistics_admin_language LIKE '%$keyword%'  ) ";
		$Q++;
	}
}

if ($Q==1) {


	$Device_SL 	= " SELECT * FROM Device ";
	$Device_QR 	= mysqli_query($con,$Device_SL);
	$Device_Row 	= mysqli_num_rows($Device_QR);
	$Loop = 1;
	$StatisticLoop_SL = " (  ";
	while ($Device 	= mysqli_fetch_array($Device_QR)) {
		if ($Loop>1) {
			$StatisticLoop_SL.= " OR ";
		}
		$StatisticLoop_SL .= "  statistics_admin_browser  LIKE  '%$Device[DeviceText1]%'   " ;

		$Loop++;
	}
	$StatisticLoop_SL .= " ) ";

	$Row = "SELECT * FROM statistics_admin WHERE";
	$Row .= $StatisticLoop_SL;

}
else{

	$Device_SL 	= " SELECT * FROM Device ";
	$Device_QR 	= mysqli_query($con,$Device_SL);
	$Device_Row 	= mysqli_num_rows($Device_QR);
	$Loop = 1;
	$StatisticLoop_SL = "AND (  ";
	while ($Device 	= mysqli_fetch_array($Device_QR)) {
		if ($Loop>1) {
			$StatisticLoop_SL.= " OR ";
		}
		$StatisticLoop_SL .= "  statistics_admin_browser  LIKE  '%$Device[DeviceText1]%'   " ;

		$Loop++;
	}
	$StatisticLoop_SL .= " ) ";

	$Row .= $StatisticLoop_SL;

}





$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 100;   // Per page
$page = $_GET["page"];
if(!$_GET["page"]){
	$page=1;
}
$Prev_page = $page-1;
$Next_page = $page+1;
$page_Start = (($Per_page*$page)-$Per_page);
if($Num_Rows<=$Per_page){
	$Num_pages =1;
}
else if(($Num_Rows % $Per_page)==0){
	$Num_pages =($Num_Rows/$Per_page) ;
}
else{
	$Num_pages =($Num_Rows/$Per_page)+1;
	$Num_pages = (int)$Num_pages;
}
$i=$page_Start+1;

$statistics_admin_SL = $Row." ORDER BY statistics_admin_id DESC LIMIT $page_Start , $Per_page ";
$statistics_admin_QR 	= mysqli_query($con,$statistics_admin_SL);

$YYYY = date('Y-m-d');

$statistics_admin_time = time();
$statistics_admin_online = time() - 300;

$sql = "select * from statistics_online where statistics_online_time > '$statistics_admin_online'";
$result = mysqli_query($con,$sql);
$statistics_online = mysqli_num_rows($result);

$DaySl = $Row." AND ( statistics_admin_date = '$YYYY' ) ";
$DayQuery = mysqli_query($con,$DaySl);
$DayNum = mysqli_num_rows($DayQuery);

$AllSl = $Row;
$AllQuery = mysqli_query($con,$AllSl);
$Num_Rows = mysqli_num_rows($AllQuery);


if ($_GET[Statistic_Del]=='Delete') {
	if (isset($_GET[statistics_admin_id])){
		$_SESSION[statistics_admin_id] =  $_GET[statistics_admin_id];
	}

	$statistics_admin_id 			=   $_SESSION[statistics_admin_id] ;
	$statistics_admin_Del 		=	"DELETE FROM `statistics_admin` WHERE statistics_admin_id = '$statistics_admin_id' ";
	$statistics_admin_Qurey  		= 	mysqli_query($con,$statistics_admin_Del);

	if($statistics_admin_Qurey) {
		echo"<script>  window.location='statistics_admin.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
						<h3>  กิจกรรมผู้ดูแล        </h3>
						<hr>
					</div>
					<div class="col-md-12">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<input type="text"  class="form-control" placeholder="ค้นหา" name="keyword">
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search">
									</span>
									ค้นหา
								</button>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="statistics_admin.php" class="btn btn-default">
									<span class="glyphicon glyphicon-repeat size12"></span>
								</a>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?
								if (isset($_GET[keyword])&&$_GET[keyword]!='') {
									?>
									ค้นหา : <? echo $keyword; echo " "; ?>
									<?
								}
								if ($Q==1) {
									?>
									กิจกรรมผู้ดูแลล่าสุด
									<?
								}
								?>
								<?
								if ($Num_Rows=='0') { echo " (ไม่พบข้อมูล)"; }
								else{ 
									?>
									<span class="badge"> <? echo "$Num_Rows"; ?></span> 
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
												<th>แอดมิน</th>
												<th>กิจกรรมผู้ดูแล</th>
												<th>วัน</th>
												<th>เวลา</th>
												<th>ไอพี</th>
												<th>โปรแกรม</th>
												<th>อุปกรณ์</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?
											$i=1;
											while ($statistics_admin 	= mysqli_fetch_array($statistics_admin_QR)) {

												$admin_while_SL = " SELECT * FROM admin WHERE admin_id = '$statistics_admin[admin_id]'";
												$admin_while_QR = mysqli_query($con,$admin_while_SL);
												$admin_while 	= mysqli_fetch_array($admin_while_QR);

												?>
												<tr>
													<td >
														<p style="font-size: 14px;"><?php echo $i; ?></p>
													</td>
													<td>
														<p style="font-size: 14px;">
															<a target="_blank" href="admin_one.php?admin_id=<?php echo $admin_while[admin_id]; ?>">
																<?php echo $admin_while[admin_name]; ?>
															</a>
														</p>
													</td>
													<td>
														<p style="font-size: 14px;"><?php echo $statistics_admin[statistics_admin_detail]; ?></p>
													</td>
													<td >
														<p style="font-size: 14px;"><?php echo displaydate($statistics_admin[statistics_admin_date]); ?></p>
													</td>
													<td >
														<p style="font-size: 14px;"><?php echo $statistics_admin[statistics_admin_time]; ?></p>
													</td>
													<td >
														<p style="font-size: 14px;"><?php echo $statistics_admin[statistics_admin_ip]; ?></p>
													</td>
													<td title="<?php echo $statistics_admin[statistics_admin_browser]; ?>">
														<p style="width: 300px;font-size: 10px;" class="hide2"><?php echo $statistics_admin[statistics_admin_browser]; ?></p>
													</td>
													<td title="<?php echo  substr($statistics_admin[statistics_admin_browser],11); ?>">
														<div style="padding: 5px;">
															<?
															$Device_SL 	= " SELECT * FROM Device ";
															$Device_QR 	= mysqli_query($con,$Device_SL);
															$Device_Row 	= mysqli_num_rows($Device_QR);
															while ($Device 	= mysqli_fetch_array($Device_QR)) {
																$StatisticLoop_SL 		= " SELECT * FROM statistics_admin WHERE (
																statistics_admin_browser  		LIKE  '%$Device[DeviceText1]%'  OR
																statistics_admin_browser  		LIKE  '%$Device[DeviceText2]%' 	OR 
																statistics_admin_browser  		LIKE  '%$Device[DeviceText3]%'     )
																AND  (statistics_admin_id = '$statistics_admin[statistics_admin_id]' )";
																$StatisticLoop_QR 		= mysqli_query($con,$StatisticLoop_SL);
																$StatisticLoop_Row 	= mysqli_num_rows($StatisticLoop_QR);
																if ($StatisticLoop_Row>0) {
																	?>
																	<img style="width: 30px;height: 30px;"  src="../Files/DevicePhoto/<?php echo $Device[DevicePhoto]; ?>"   />
																	<?
																}
															}
															?>
														</div>
													</td>
													<td>
														<a href="statistics_admin.php?statistics_admin_id=<?php echo $statistics_admin[statistics_admin_id]; ?>&Statistic_Del=Delete" onclick="return confirm(' ยืนยันการลบข้อมูล ?  ')"  class="btn btn-danger btn-sm">
															<span class="glyphicon glyphicon-trash"></span> 
														</a>
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
							<div class="panel-footer">
								<? include 'index_pagenum.php'; ?>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								กิจกรรมผู้ดูแลวันนี้
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($DayNum); ?> 
								</h4>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								กิจกรรมผู้ดูแลทั้งหมด
							</div>
							<div class="panel-body">
								<h4>
									<? echo number_format($Num_Rows); ?> 
								</h4>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								สถิติกิจกรรมผู้ดูแล ต่อวัน
							</div>
							<div class="panel-body">
								<?
								$All_DayNum = 0;
								for ($i=0; $i<=14; $i++) { 

									$date = date('Y-m-d', strtotime("-".$i." days"));


									$DaySl = $Row." AND  statistics_admin_date = '$date'  ";
									$DayQuery = mysqli_query($con,$DaySl);
									$DayNum = mysqli_num_rows($DayQuery);


									$DayNow[$i] = $DayNum;
									$All_DayNum += $DayNum;
									$y=$i;

									$D[$i] = date('Y-m-d', strtotime("-$y days"));
								} 
								$All_DayNum = $All_DayNum / 14;
								?>
								<div id="StatisticDay" ></div>		
							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading">
								สถิติกิจกรรมผู้ดูแล ต่อเดือน
							</div>
							<div class="panel-body">
								<?
								$All_MonNum = 0;
								for ($i=1; $i<=12; $i++) { 


									if ($i==0) {
										$Mounth = date('m', strtotime("+1 month"));
										$Year   = date('Y', strtotime("-$i month"));
										$x=$i-1;
									}
									else{
										$x=$i-1;
										$Mounth = date('m', strtotime("-$x month"));
										$Year   = date('Y', strtotime("-$x month"));
									}

									$DaySl = $Row." AND   MONTH(statistics_admin_date) = '$Mounth' and YEAR(statistics_admin_date) = '$Year' ";
									$DayQuery = mysqli_query($con,$DaySl);
									$DayNum = mysqli_num_rows($DayQuery);

									$SumIncome[$i] = $DayNum;
									$All_MonNum += $DayNum;
									$y=$i-1;

									$YM[$i] = date('Y-m', strtotime("-$y month"));
								} 
								$All_MonNum = $All_MonNum / 12;
								?>

								<div id="container" ></div>		
							</div>
						</div>

					</div>
				</div>
			</div>
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


<script>



	Highcharts.chart('StatisticDay', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'สถิติกิจกรรมผู้ดูแล ต่อวัน '
		},
		subtitle: {
			text: 'เฉลี่ย <? echo number_format($All_DayNum); ?>  ต่อวัน'
		},
		xAxis: {
			type: 'category',
			labels: {
				rotation: -45,
				style: {
					fontSize: '13px',
					fontFamily: 'Verdana, sans-serif'
				}
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ''
			}
		},
		legend: {
			enabled: false
		},
		tooltip: {
			pointFormat: ''
		},
		series: [{
			name: 'Population',
			data: [
			['<? echo $D[13]; ?>', <? echo $DayNow[13]; ?>],
			['<? echo $D[12]; ?>', <? echo $DayNow[12]; ?>],
			['<? echo $D[11]; ?>', <? echo $DayNow[11]; ?>],
			['<? echo $D[10]; ?>', <? echo $DayNow[10]; ?>],
			['<? echo $D[9]; ?>', <? echo $DayNow[9]; ?>],
			['<? echo $D[8]; ?>', <? echo $DayNow[8]; ?>],
			['<? echo $D[7]; ?>', <? echo $DayNow[7]; ?>],
			['<? echo $D[6]; ?>', <? echo $DayNow[6]; ?>],
			['<? echo $D[5]; ?>', <? echo $DayNow[5]; ?>],
			['<? echo $D[4]; ?>', <? echo $DayNow[4]; ?>],
			['<? echo $D[3]; ?>', <? echo $DayNow[3]; ?>],
			['<? echo $D[2]; ?>', <? echo $DayNow[2]; ?>],
			['<? echo $D[1]; ?>', <? echo $DayNow[1]; ?>],
			['<? echo $D[0]; ?>', <? echo $DayNow[0]; ?>]
			],

			dataLabels: {
				enabled: true,
				rotation: -90,
				color: '#FFFFFF',
				align: 'right',
					format: '{point.y}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});

	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'สถิติกิจกรรมผู้ดูแล ต่อเดือน'
		},
		subtitle: {
			text: 'เฉลี่ย <? echo number_format($All_MonNum); ?>  ต่อเดือน'
		},
		xAxis: {
			type: 'category',
			labels: {
				rotation: -45,
				style: {
					fontSize: '13px',
					fontFamily: 'Verdana, sans-serif'
				}
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: ''
			}
		},
		legend: {
			enabled: false
		},
		tooltip: {
			pointFormat: ''
		},
		series: [{
			name: 'Population',
			data: [
			['<? echo $YM[12]; ?>', <? echo $SumIncome[12]; ?>],
			['<? echo $YM[11]; ?>', <? echo $SumIncome[11]; ?>],
			['<? echo $YM[10]; ?>', <? echo $SumIncome[10]; ?>],
			['<? echo $YM[9]; ?>', <? echo $SumIncome[9]; ?>],
			['<? echo $YM[8]; ?>', <? echo $SumIncome[8]; ?>],
			['<? echo $YM[7]; ?>', <? echo $SumIncome[7]; ?>],
			['<? echo $YM[6]; ?>', <? echo $SumIncome[6]; ?>],
			['<? echo $YM[5]; ?>', <? echo $SumIncome[5]; ?>],
			['<? echo $YM[4]; ?>', <? echo $SumIncome[4]; ?>],
			['<? echo $YM[3]; ?>', <? echo $SumIncome[3]; ?>],
			['<? echo $YM[2]; ?>', <? echo $SumIncome[2]; ?>],
			['<? echo $YM[1]; ?>', <? echo $SumIncome[1]; ?>],
			['<? echo $YM[0]; ?>', <? echo $SumIncome[0]; ?>]
			],

			dataLabels: {
				enabled: true,
				rotation: -90,
				color: '#FFFFFF',
				align: 'right',
					format: '{point.y}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
	</script>
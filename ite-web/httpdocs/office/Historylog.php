<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'Historylog.php';

if ($_GET[Historylog_Del]=='Delete') {
	if (isset($_GET[HistorylogID])){
		$_SESSION[HistorylogID] =  $_GET[HistorylogID];
	}
	$HistorylogID =   $_SESSION[HistorylogID] ;
	$Historylog_Del ="DELETE FROM `Historylog` WHERE HistorylogID = '$HistorylogID' ";
	$Historylog_Qurey  = mysqli_query($con,$Historylog_Del);
	if($Historylog_Qurey) {
		echo"<script>  window.location='Historylog.php?DELETE'; </script>";
	}
	else{
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}

$Row = "SELECT * FROM Historylog ";

$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 50;   // Per Page
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

$Historylog_SL = $Row." ORDER BY HistorylogID DESC LIMIT $Page_Start , $Per_Page ";
$Historylog_QR 	= mysqli_query($con,$Historylog_SL);

$YYYY = date('Y-m-d');

$time = time();
$timeHistorylog = time() - 300;

$sql = "select * from Online where time_online > '$timeHistorylog'";
$result = mysqli_query($con,$sql);
$Online = mysqli_num_rows($result);

$DaySl = $Row." AND ( HistorylogDate = '$YYYY' ) ";
$DayQuery = mysqli_query($con,$DaySl);
$DayNum = mysqli_num_rows($DayQuery);


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
						<div class="panel panel-default">
							<div class="panel-heading">
								กิจกรรมเว็บไซต์ทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>วัน</th>
												<th>เวลา</th>
												<th>IP</th>
												<th>อุปกรณ์</th>
												<th>กิจกรรม</th>
												<th>แอดมิน</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?
											$i=1;
											while ($Historylog 	= mysqli_fetch_array($Historylog_QR)) {

												
												
												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<p><?php echo $Historylog[HistorylogDate]; ?></p>
													</td>
													<td>
														<p><?php echo $Historylog[HistorylogTime]; ?></p>
													</td>
													<td>
														<p><?php echo $Historylog[HistorylogIP]; ?></p>
													</td>
													<td title="<?php echo  substr($Historylog[HistorylogAgent],11); ?>">
														<div style="padding: 5px;">
															<?
															$Device_SL 	= " SELECT * FROM Device ";
															$Device_QR 	= mysqli_query($con,$Device_SL);
															$Device_Row 	= mysqli_num_rows($Device_QR);
															while ($Device 	= mysqli_fetch_array($Device_QR)) {
																$HistorylogLoop_SL 		= " SELECT * FROM Historylog WHERE (
																HistorylogAgent  		LIKE  '%$Device[DeviceText1]%'  OR
																HistorylogAgent  		LIKE  '%$Device[DeviceText2]%' 	OR 
																HistorylogAgent  		LIKE  '%$Device[DeviceText3]%'     )
																AND  (HistorylogID = '$Historylog[HistorylogID]' )";
																$HistorylogLoop_QR 		= mysqli_query($con,$HistorylogLoop_SL);
																$HistorylogLoop_Row 	= mysqli_num_rows($HistorylogLoop_QR);
																if ($HistorylogLoop_Row>0) {
																	?>
																	<img style="width: 41px;height: 41px;"  src="../Files/DevicePhoto/<?php echo $Device[DevicePhoto]; ?>"   />
																	<?
																}
															}
															?>
														</div>
													</td>
													<td width="300">
														<p><?php echo $Historylog[HistorylogActivities]; ?></p>
													</td>
													<td>
														<p>
															<?
															$adminlog_SL = " SELECT * FROM admin WHERE admin_id = '$Historylog[admin_id]'";
															$adminlog_QR = mysqli_query($con,$adminlog_SL);
															$adminlog 	= mysqli_fetch_array($adminlog_QR);
															?>
															<?php echo $adminlog[admin_id]; ?>
															,
															<?php echo $adminlog[admin_name]; ?>
															,
															<?php echo $adminlog[admin_user]; ?>
														</p>
													</td>
													<td>
														<a href="Historylog.php?HistorylogID=<?php echo $Historylog[HistorylogID]; ?>&Historylog_Del=Delete" onclick="return confirm(' ยืนยันการลบข้อมูล ?  ')"  class="btn btn-danger">
															<span class="glyphicon glyphicon-trash"></span> ลบ
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
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								กิจกรรม ต่อวัน
							</div>
							<div class="panel-body">
								<?
								for ($i=0; $i<=14; $i++) { 

									$date = date('Y-m-d', strtotime("-".$i." days"));


									$DaySl = "SELECT * FROM `Historylog` WHERE  HistorylogDate = '$date' ";
									$DayQuery = mysqli_query($con,$DaySl);
									$DayNum = mysqli_num_rows($DayQuery);


									$DayNow[$i] = $DayNum;

									$y=$i;

									$D[$i] = date('Y-m-d', strtotime("-$y days"));
								} 
								?>

								<div id="HistorylogDay" ></div>		
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								กิจกรรม ต่อเดือน
							</div>
							<div class="panel-body">
								<?
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

									$DaySl = "SELECT * FROM `Historylog` WHERE  MONTH(HistorylogDate) = '$Mounth' and YEAR(HistorylogDate) = '$Year' ";
									$DayQuery = mysqli_query($con,$DaySl);
									$DayNum = mysqli_num_rows($DayQuery);

									$SumIncome[$i] = $DayNum;

									$y=$i-1;

									$YM[$i] = date('Y-m', strtotime("-$y month"));
								} 
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



	Highcharts.chart('HistorylogDay', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'กิจกรรม ต่อวัน'
		},
		subtitle: {
			text: ''
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
				text: 'คน'
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
			text: 'กิจกรรม ต่อเดือน'
		},
		subtitle: {
			text: ''
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
				text: 'คน'
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
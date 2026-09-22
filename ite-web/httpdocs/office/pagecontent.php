<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'pagecontent.php';

$Row = "SELECT * FROM pagecontent  WHERE pagecontent_status = 'เปิด'";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 20;  
$page = $_GET["page"];
if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
else{
	$_SESSION[numpage] =  '1';
}
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

$pagecontent_SL = $Row." ORDER BY pagecontent_sort ASC LIMIT $page_Start , $Per_page ";
$pagecontent_QR 	= mysqli_query($con,$pagecontent_SL);
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
						<h3>  จัดการ  หน้าเพจเพิ่มเติม  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="pagecontent_add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่ม หน้าเพจเพิ่มเติม
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										หน้าเพจเพิ่มเติมทั้งหมด 
										<span class="badge"> <? echo "$Num_Rows"; ?></span> 
										<?
										if ($Num_Rows=='0') {
											?>
											
											(ไม่พบข้อมูล)
											
											<?
										}
										?>
									</div>
									<div class="col-md-6 text-right" style="margin: -5px;">
										<a class="btn btn-default" onclick="location.reload()">
											รีเฟรชหน้า
										</a>
										<a class="btn btn-default" onclick="goBack()">
											<span class="glyphicon glyphicon-backward">
												
											</span>
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
												<th>ชื่อ เพจและข้อมูล</th>
												<th>รายละเอียด , แก้ไข , ลบ</th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($pagecontent 	= mysqli_fetch_array($pagecontent_QR)) {
												?>
												<tr id="<?php echo $pagecontent['pagecontent_id'] ?>">
													<td><? echo $i; ?></td>
													<td>
														<? echo $pagecontent[pagecontent_topic]; ?>
													</td>
													<td>
														<a href="pagecontent_one.php?pagecontent_id=<?php echo $pagecontent[pagecontent_id]; ?>" class="btn btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="pagecontent_update.php?pagecontent_id=<?php echo $pagecontent[pagecontent_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														
														<?
														if ($login_admin[admin_degree_id]=='1') {
															?>
															<a href="pagecontent_del.php?pagecontent_id=<?php echo $pagecontent[pagecontent_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ?  ')"  class="btn btn-danger">
																<span class="glyphicon glyphicon-trash"></span>
																ลบ
															</a>
															<?
														}
														?>
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
	<?
	$position = $_POST['position'];
	$pagecontent_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update pagecontent SET pagecontent_sort=".$pagecontent_sort_i." WHERE pagecontent_id =".$v;
		$mysqli->query($sql);

		$pagecontent_sort_i++;
	}
	?>
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
			url:"pagecontent.php",
			type:'post',
			data:{position:data},
			success:function(){
				
			}
		})
	}
</script>
</html>

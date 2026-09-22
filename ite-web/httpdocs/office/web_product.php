<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'web_product.php';

$Q = 1;
$Row = "SELECT * FROM web_product WHERE ";

if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " ( web_product_name LIKE '%$keyword%'  OR  web_product_detail LIKE '%$keyword%'  OR web_product_review LIKE '%$keyword%'  OR web_product_page LIKE '%$keyword%' )";
		$Q++;
	}
	else{
		$Row .= " AND  ( web_product_name LIKE '%$keyword%'  OR  web_product_detail LIKE '%$keyword%'  OR web_product_review LIKE '%$keyword%'  OR web_product_page LIKE '%$keyword%' ) ";
		$Q++;
	}
}

if (isset($_GET[mainmenu_id])&&$_GET[mainmenu_id]!='') {
	$mainmenu_id   = $_GET[mainmenu_id];
	if ($Q==1) {
		$Row .= " (mainmenu_id = '$mainmenu_id')";
		$Q++;
	}
	else{
		$Row .= " AND  ( mainmenu_id = '$mainmenu_id') ";
		$Q++;
	}
}


if ($Q==1) {
	$Row = "SELECT * FROM web_product ";
}
else{
	$Row .= " ";
	$Q++;
}
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 20;   // Per page
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

$web_product_SL = $Row." ORDER BY web_product_sort ASC LIMIT $page_Start , $Per_page ";
$web_product_QR = mysqli_query($con,$web_product_SL);

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
						<h3>  จัดการ  ผลิตภัณฑ์  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-6">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="web_product_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่ม   ผลิตภัณฑ์หรือบริการ   
								</a>
							</div>
						</form>
					</div>
					<div class="col-md-6 text-right">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<select class="form-control"  name="mainmenu_id" >
									<option> เลือกเมนู </option>
									<?
									$mainmenu_SL = " SELECT * FROM mainmenu  ORDER BY mainmenu_id ASC";
									$mainmenu_QR 	= mysqli_query($con,$mainmenu_SL);
									while ($mainmenu 	= mysqli_fetch_array($mainmenu_QR)) {
										?>
										<option value="<?php echo $mainmenu[mainmenu_id]; ?>"><?php echo $mainmenu[mainmenu_name]; ?>  </option>
										<?
									}
									?>
								</select>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<input type="text"  class="form-control" placeholder="คำค้นหา" name="keyword">
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search"></span>
									ค้นหา
								</button>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="web_product.php" class="btn btn-default">
									<span class="glyphicon glyphicon-repeat size12"></span>
								</a>
							</div>
						</form>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										<?
										if (isset($_GET[keyword])&&$_GET[keyword]!='') {
											?>
											ค้นหา : <? echo $keyword; echo " "; ?>
											<?
										}
										if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
											$mainmenutopic_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
											$mainmenutopic_QR = mysqli_query($con,$mainmenutopic_SL);
											$mainmenutopic 	= mysqli_fetch_array($mainmenutopic_QR);
											?>
											<? echo $mainmenutopic[mainmenu_name]; echo " "; ?>
											<?
										}
										if ($Q==1) {
											?>
											ผลิตภัณฑ์ 
											<?
										}
										?>
										<?
										if ($Num_Rows=='0') { echo "( ไม่มีผลิตภัณฑ์นี้ )"; }
										else{ 
											?>
											<span class="badge"> <? echo "$Num_Rows"; ?></span> 
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
										<?
										if ($Q!=1) {
											?>

											<a class="btn btn-default" href="web_product.php">
												ผลิตภัณฑ์
											</a>
											<?
										}
										?>
									</div>
								</div>
							</div>
							<div class="panel-body">

								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th> # </th>
												<th> เมนูหลัก </th>
												<th> รูป  </th>
												<th> ผลิตภัณฑ์ </th>
												<th> ราคา </th>
												<th> หมวดหมู่ </th>
												<th> รายละเอียด , แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($web_product 	= mysqli_fetch_array($web_product_QR)) {
												?>
												<tr id="<?php echo $web_product['web_product_id'] ?>">
													<td style="width: 30px;"><? echo $i; ?></td>
													<td>
														<?
														if (isset($web_product[mainmenu_id])&&trim($web_product[mainmenu_id])!='0') {
															$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$web_product[mainmenu_id]'";
															$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
															$mainmenu 	= mysqli_fetch_array($mainmenu_QR);
															?>
															<? echo $mainmenu[mainmenu_name]; ?>
															<?
														}
														?>
													</td>
													<td style="width: 140px;">
														<?
														if (!empty($web_product['web_product_photo'])) {
															?>
															<a href="web_product_one.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" >
																<img class="full"  src="../Files/web_product_photo/<?php echo $web_product[web_product_photo]; ?>"  />
															</a>
															<?
														} else {
															echo " ไม่มีข้อมูลนี้ ";
														}
														?>
													</td>
													<td>
														<? echo $web_product[web_product_name]; ?>
													</td>
													<td>
														<?
														if (isset($web_product[web_product_price])&&trim($web_product[web_product_price])!=''&&trim($web_product[web_product_price])!='0') {
															echo number_format($web_product[web_product_price]); 
														}
														else{
															echo "-";
														}
														?>
													</td>
													
													<td>
														<?
														if (isset($web_product[catalog_id])&&trim($web_product[catalog_id])!='0') {
															$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$web_product[catalog_id]'";
															$catalog_QR = mysqli_query($con,$catalog_SL);
															$catalog 	= mysqli_fetch_array($catalog_QR);
															?>
															<? echo $catalog[catalog_name]; ?>
															<?
														}
														else{
															echo " - ";
														}
														?>
													</td>
													<td style="width: 300px;">
														<a href="web_product_one.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" class="btn btn-sm btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="web_product_update.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" class="btn btn-sm btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="web_product_del.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" onclick="return confirm('  ยืนยันการลบผลิตภัณฑ์  ? ')"  class="btn btn-sm btn-danger">
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
	<?

	$position = $_POST['position'];

	$web_product_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update web_product SET web_product_sort=".$web_product_sort_i." WHERE web_product_id =".$v;
		$mysqli->query($sql);

		$web_product_sort_i++;
	}

	?>
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
				url:"web_product.php",
				type:'post',
				data:{position:data},
				success:function(){

				}
			})
		}
	</script>
</body>
</html>

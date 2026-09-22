
<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'product.php';

$Q = 1;
$Row = "SELECT * FROM product WHERE ";

if (isset($_GET[catalog_name])&&$_GET[catalog_name]!='') {
	$catalog_name = $_GET['catalog_name'];
	$catalog_name .= " ,";
	$catalog_name2 = ", ".$_GET['catalog_name'];
	$catalog_name3 = " ".$_GET['catalog_name'];

	if ($Q==1) {
		$Row .= " ( product_catalog_name LIKE '%$catalog_name%' OR product_catalog_name LIKE '%$catalog_name2%' OR product_catalog_name = '$catalog_name3')";
		$Q++;
	}
	else{
		$Row .= " AND   ( product_catalog_name LIKE '%$catalog_name%' OR product_catalog_name LIKE '%$catalog_name2%' OR product_catalog_name = '$catalog_name3')";
		$Q++;
	}
}
if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " ( product_page LIKE '%$keyword%'  OR  product_search LIKE '%$keyword%'  OR product_name LIKE '%$keyword%'  OR product_detail LIKE '%$keyword%' )";
		$Q++;
	}
	else{
		$Row .= " AND  ( product_page LIKE '%$keyword%'  OR  product_search LIKE '%$keyword%'  OR product_name LIKE '%$keyword%'  OR product_detail LIKE '%$keyword%' ) ";
		$Q++;
	}
}

if (isset($_GET[plot_name])&&$_GET[plot_name]!='') {
	$plot_name = $_GET['plot_name'];
	$plot_name .= " ,";
	$plot_name2 = ", ".$_GET['plot_name'];
	$plot_name3 = " ".$_GET['plot_name'];

	if ($Q==1) {
		$Row .= " ( product_plot_name LIKE '%$plot_name%' OR product_plot_name LIKE '%$plot_name2%' OR product_plot_name = '$plot_name3')";
		$Q++;
	}
	else{
		$Row .= " AND   ( product_plot_name LIKE '%$plot_name%' OR product_plot_name LIKE '%$plot_name2%' OR product_plot_name = '$plot_name3')";
		$Q++;
	}
}



if ($Q==1) {
	$Row = "SELECT * FROM product ";
}
else{
	$Row .= " ";
	$Q++;
}


$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 200;   // Per page
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

$product_SL = $Row." ORDER BY product_sort asc  LIMIT $page_Start , $Per_page ";
$product_QR = mysqli_query($con,$product_SL);

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
						<h3>    จัดการ สินค้า  </h3>
					</div>
					<div class="col-md-6 text-right">
						<h3>
							<a href="catalog.php" class="btn btn-primary <? if ($_SESSION['page'] =='catalog.php') { echo 'active';} ?>">
								ประเภทสินค้า <span class="badge"><? echo $Rowcatalog; ?></span>
							</a>
						</h3>
					</div>
					<div class="col-md-12">
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-6">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="product_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่มสินค้า
								</a>
							</div>
						</form>
					</div>
					<div class="col-md-6 text-right">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<input type="text"  class="form-control" placeholder="ค้นหาสินค้า" name="keyword">
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search">
									</span>
									ค้นหา
								</button>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="product.php" class="btn btn-default">
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
								<div class="row">
									<div class="col-md-6">
										<?
										if (isset($_GET[keyword])&&$_GET[keyword]!='') {
											?>
											ค้นหา : <? echo $keyword; echo " "; ?>
											<?
										}
										if (isset($_GET[catalog_name])&&$_GET[catalog_name]!='') {
											?>
											หมวดหมู่ : <? echo $catalog_name; echo " "; ?>
											<?
										}
										if (isset($_GET[plot_name])&&$_GET[plot_name]!='') {
											?>
											รายการ : <? echo $plot_name; echo " "; ?>
											<?
										}
										if ($Q==1) {
											?>
											สินค้าทั้งหมด
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
											
											<a class="btn btn-default" href="product.php">
												สินค้าทั้งหมด
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
												<th>#</th>
												<th> รูป  </th>
												<th> สินค้า </th>
												<th> ประเภทสินค้า </th>
												<th> ราคา </th>
												<th> รายละเอียด , แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($product 	= mysqli_fetch_array($product_QR)) {
												?>
												<tr id="<?php echo $product['product_id'] ?>">
													<td><? echo $i; ?></td>
													<td style="width: 70px;">
														<a href="product_one.php?product_id=<?php echo $product[product_id]; ?>" >
															<div class="img100">
																<img  src="../Files/product_photo/<?php echo $product[product_photo]; ?>" c />
															</div>
														</a>
													</td>
													<td>
														<? echo $product[product_name]; ?>
													</td>
													<td>
														<? 
														$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$product[catalog_id]'";
														$catalog_QR = mysqli_query($con,$catalog_SL);
														$catalog 	= mysqli_fetch_array($catalog_QR);
														if (isset($catalog[catalog_id])&&trim($catalog[catalog_id])!='0') {
															echo $catalog[catalog_name];  
														}
														else{
															echo "-";
														}
														?>
													</td>
													<td>
														<? 
														if (isset($product[product_price])&&trim($product[product_price])!=''&&trim($product[product_price])!='0') {
															echo number_format($product[product_price]); 
														}
														else{
															echo "-";
														}
														?>
													</td>
													<td>
														<a href="product_one.php?product_id=<?php echo $product[product_id]; ?>" class="btn btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="product_update.php?product_id=<?php echo $product[product_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="product_del.php?product_id=<?php echo $product[product_id]; ?>" onclick="return confirm('  ยืนยันการลบข้อมูล  ? ')"  class="btn btn-danger">
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
	<?
	$position = $_POST['position'];

	$product_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update product SET product_sort=".$product_sort_i." WHERE product_id =".$v;
		$mysqli->query($sql);

		$product_sort_i++;
	}

	?>
	<!-- container -->
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
				url:"product.php",
				type:'post',
				data:{position:data},
				success:function(){

				}
			})
		}
	</script>
</body>
</html>

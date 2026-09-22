<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'mainmenu.php';

$Q = 1;
$Row = "SELECT * FROM mainmenu WHERE ";

if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " ( mainmenu_name LIKE '%$keyword%'  OR  mainmenu_detail LIKE '%$keyword%'  OR mainmenu_review LIKE '%$keyword%'  OR mainmenu_page LIKE '%$keyword%' )";
		$Q++;
	}
	else{
		$Row .= " AND  ( mainmenu_name LIKE '%$keyword%'  OR  mainmenu_detail LIKE '%$keyword%'  OR mainmenu_review LIKE '%$keyword%'  OR mainmenu_page LIKE '%$keyword%' ) ";
		$Q++;
	}
}

if (isset($_GET[highlight_name])&&$_GET[highlight_name]!='') {
	$highlight_name = $_GET['highlight_name'];
	$highlight_name .= " ,";
	$highlight_name2 = ", ".$_GET['highlight_name'];
	$highlight_name3 = " ".$_GET['highlight_name'];

	if ($Q==1) {
		$Row .= " ( highlight_name LIKE '%$highlight_name%' OR highlight_name LIKE '%$highlight_name2%' OR highlight_name = '$highlight_name3')";
		$Q++;
	}
	else{
		$Row .= " AND   ( highlight_name LIKE '%$highlight_name%' OR highlight_name LIKE '%$highlight_name2%' OR highlight_name = '$highlight_name3')";
		$Q++;
	}
}

if ($Q==1) {
	$Row = "SELECT * FROM mainmenu ";
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

$mainmenu_SL = $Row." ORDER BY mainmenu_sort ASC LIMIT $page_Start , $Per_page ";
$mainmenu_QR = mysqli_query($con,$mainmenu_SL);

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
						<h3>  จัดการ      เมนูหลัก        </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-6">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="mainmenu_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่ม     เมนูหลัก   
								</a>
							</div>
						</form>
					</div>
					<div class="col-md-6 text-right">
						<form class="form-inline" method="get">
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
								<a href="mainmenu.php" class="btn btn-default">
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
											Search : <? echo $keyword; echo " "; ?>
											<?
										}
										if (isset($_GET[highlight_name])&&$_GET[highlight_name]!='') {
											$highlight_name =str_replace(" ,","",$_GET[highlight_name]);
											?>
											Highlight : <? echo $highlight_name; echo " "; ?>
											<?
										}
										if ($Q==1) {
											?>
											เมนูหลัก    ทั้งหมด
											<?
										}
										?>
										<?
										if ($Num_Rows=='0') { echo "(not found)"; }
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

											<a class="btn btn-default" href="mainmenu.php">
												เมนูหลักทั้งหมด
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
												<th> เมนูหลัก </th>
												<th> รายละเอียด , แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($mainmenu 	= mysqli_fetch_array($mainmenu_QR)) {
												?>
												<tr id="<?php echo $mainmenu['mainmenu_id'] ?>">
													<td><? echo $i; ?></td>
													<td>
														<? echo $mainmenu[mainmenu_name]; ?>
													</td>
													<td>
														<a href="mainmenu_one.php?mainmenu_id=<?php echo $mainmenu[mainmenu_id]; ?>" class="btn btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="mainmenu_update.php?mainmenu_id=<?php echo $mainmenu[mainmenu_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="mainmenu_del.php?mainmenu_id=<?php echo $mainmenu[mainmenu_id]; ?>" onclick="return confirm('  ยืนยันการลบข้อมูล  ? ')"  class="btn btn-danger">
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

	$mainmenu_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update mainmenu SET mainmenu_sort=".$mainmenu_sort_i." WHERE mainmenu_id =".$v;
		$mysqli->query($sql);

		$mainmenu_sort_i++;
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
				url:"mainmenu.php",
				type:'post',
				data:{position:data},
				success:function(){

				}
			})
		}
	</script>
</body>
</html>

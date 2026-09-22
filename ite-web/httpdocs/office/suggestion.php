<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'suggestion.php';

$Q = 1;
$Row = "SELECT * FROM suggestion WHERE ";

if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " ( suggestion_name LIKE '%$keyword%'  OR  suggestion_detail LIKE '%$keyword%'  OR suggestion_review LIKE '%$keyword%'  OR suggestion_page LIKE '%$keyword%' )";
		$Q++;
	}
	else{
		$Row .= " AND  ( suggestion_name LIKE '%$keyword%'  OR  suggestion_detail LIKE '%$keyword%'  OR suggestion_review LIKE '%$keyword%'  OR suggestion_page LIKE '%$keyword%' ) ";
		$Q++;
	}
}

if ($Q==1) {
	$Row = "SELECT * FROM suggestion ";
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

$suggestion_SL = $Row." ORDER BY suggestion_sort ASC LIMIT $page_Start , $Per_page ";
$suggestion_QR = mysqli_query($con,$suggestion_SL);

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
						<h3>  จัดการ      หัวข้อแนะนำเว็บ        </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-6">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="suggestion_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่ม     หัวข้อแนะนำเว็บ   
								</a>
								<a href="suggestion_content.php" class="btn btn-primary">
									<span class="glyphicon glyphicon-zoom-in"></span>
									ข้อความที่แสดงหน้าแรก
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
								<a href="suggestion.php" class="btn btn-default">
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
										if ($Q==1) {
											?>
											หัวข้อแนะนำเว็บ 
											<?
										}
										?>
										<?
										if ($Num_Rows=='0') { echo "( ไม่มีข้อมูลนี้ )"; }
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

											<a class="btn btn-default" href="suggestion.php">
												หัวข้อแนะนำเว็บ
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
												<th> รูป  </th>
												<th> หัวข้อแนะนำเว็บ </th>
												<th> รายละเอียด , แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($suggestion 	= mysqli_fetch_array($suggestion_QR)) {
												?>
												<tr id="<?php echo $suggestion['suggestion_id'] ?>">
													<td style="width: 30px;"><? echo $i; ?></td>
													<td style="width: 140px;">
														<a href="suggestion_one.php?suggestion_id=<?php echo $suggestion[suggestion_id]; ?>" >
															<img class="full"  src="../Files/suggestion_photo/<?php echo $suggestion[suggestion_photo]; ?>"  />
														</a>
													</td>
													<td>
														<? echo $suggestion[suggestion_name]; ?>
														<?
														if (isset($suggestion[suggestion_eng_name])&&trim($suggestion[suggestion_eng_name])!='') {
															echo "<br>".$suggestion[suggestion_eng_name]; 
														}
														?>
														<?
														if (isset($suggestion[suggestion_detail])&&trim($suggestion[suggestion_detail])!='') {
															?> <p> <small> <? echo $suggestion[suggestion_detail];  ?>  </small> </p> <?
														}
														?>
													</td>
													<td style="width: 300px;">
														<a href="suggestion_one.php?suggestion_id=<?php echo $suggestion[suggestion_id]; ?>" class="btn btn-sm btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="suggestion_update.php?suggestion_id=<?php echo $suggestion[suggestion_id]; ?>" class="btn btn-sm btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="suggestion_del.php?suggestion_id=<?php echo $suggestion[suggestion_id]; ?>" onclick="return confirm('  ยืนยันการลบข้อมูล  ? ')"  class="btn btn-sm btn-danger">
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

	$suggestion_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update suggestion SET suggestion_sort=".$suggestion_sort_i." WHERE suggestion_id =".$v;
		$mysqli->query($sql);

		$suggestion_sort_i++;
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
				url:"suggestion.php",
				type:'post',
				data:{position:data},
				success:function(){

				}
			})
		}
	</script>
</body>
</html>

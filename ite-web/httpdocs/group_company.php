<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'group_company.php';

$Q = 1;
$Row = "SELECT * FROM group_company  ";
$RowQuery = mysqli_query($con,$Row);
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 12;   
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
$group_company_SL = $Row . " ORDER BY group_company_sort asc LIMIT $page_Start , $Per_page ";
$group_company_QR = mysqli_query($con,$group_company_SL);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title> บริษัทในเครือ | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $fixed[fixed_topic]; ?> - <? echo $fixed[fixed_company]; ?> ">
	<meta name="keywords" content="group_company - <? echo $fixed[fixed_topic]; ?>">
	<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div class="bg2">
		<div class="container between30">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default no-radius no-boxsha no-border bg1 text-white radius20">
						<div class="panel-body text-center">
							<span style="font-size: 24px;" >
								บริษัทในเครือ
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg2">
		<div class="container betwixt20">
			<?
			$Ac_i = 1;
			while ($group_company     = mysqli_fetch_array($group_company_QR)) {
				if ($Ac_i==1) {
					?>
					<div class="row">
						<?php
					}
					?>  
					<div class="col-md-6">
						<? include 'index_panel_group_company.php'; ?>
					</div>
					<?php
					if ($Ac_i==3) {
						$Ac_i=0;
						?>
					</div>
					<?
				}
				$Ac_i++;
			}
			if ($Ac_i!=1) {
				echo "</div>";
			}
			?>
		</div>
	</div>
	<div class="bg2">
		<div class="container betwixt15">
			<div class="row">
				<div class="col-md-12 text-center">
					<? include 'index_pagenum.php'; ?>
				</div>
			</div>
			<div class="row hidden-sm hidden-xs margintop30 uppercase" >
				<div class="col-md-12">
					<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
						<li><a href="index.php">หน้าแรก</a></li>
						<li>
							<a onclick="goBack();" href="#">
								กลับ
							</a>
						</li>        
						<li class="active">บริษัทในเครือ</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<? include 'index_footer.php'; ?>
</body>
</html>
<?

?>



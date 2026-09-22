<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'web_product.php';

$Q = 1;
$Row = "SELECT * FROM web_product WHERE ";

if (isset($_GET[mainmenu_id])&&$_GET[mainmenu_id]!='') {

	$_SESSION['page'] = 'mainmenu' . $_GET['mainmenu_id'];

	
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
if (isset($_GET[catalog_id])&&$_GET[catalog_id]!='') {
	$catalog_id   = $_GET[catalog_id];
	if ($Q==1) {
		$Row .= " (catalog_id = '$catalog_id')";
		$Q++;
	}
	else{
		$Row .= " AND  ( catalog_id = '$catalog_id') ";
		$Q++;
	}
}
if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " ( web_product_search LIKE '%$keyword%' or web_product_code LIKE '%$keyword%'  )";
		$Q++;
	}
	else{
		$Row .= " AND ( web_product_search LIKE '%$keyword%' or web_product_code LIKE '%$keyword%' )  ";
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

$RowQuery = mysqli_query($con,$Row);
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 30;   
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
$web_product_SL = $Row . " ORDER BY web_product_sort asc LIMIT $page_Start , $Per_page ";
$web_product_QR = mysqli_query($con,$web_product_SL);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<?
	if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
		$mainmenu_head_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
		$mainmenu_head_QR = mysqli_query($con,$mainmenu_head_SL);
		$mainmenu_head 	= mysqli_fetch_array($mainmenu_head_QR);
		?>  
		<title> <? echo $mainmenu_head[mainmenu_name];  ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $mainmenu_head[mainmenu_name]; ?><? echo $mainmenu_head[mainmenu_detail]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
		$catalog_head_SL = " SELECT * FROM catalog WHERE catalog_id = '$_GET[catalog_id]'";
		$catalog_head_QR = mysqli_query($con,$catalog_head_SL);
		$catalog_head 	= mysqli_fetch_array($catalog_head_QR);
		?>  
		<title> <? echo $catalog_head[catalog_name];  ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $catalog_head[catalog_name]; ?>">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	if (isset($_GET[keyword])&&$_GET[keyword]!='') {
		?>  
		<title> ค้นหา : <? echo $keyword; ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	if ($Q==1) {
		?>
		<title> ผลิตภัณฑ์ของเรา | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	?>	

	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<?
	if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
		$mainmenutopic_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
		$mainmenutopic_QR = mysqli_query($con,$mainmenutopic_SL);
		$mainmenutopic 	= mysqli_fetch_array($mainmenutopic_QR);
		if (isset($mainmenutopic[mainmenu_cover]) && trim($mainmenutopic[mainmenu_cover])!='') {
			?>
			<div class="mainmenu_cover">
				<img class="full tinted2"  id="<?php echo $mainmenutopic[mainmenu_cover]; ?>" src="Files/mainmenu_cover/<?php echo $mainmenutopic[mainmenu_cover]; ?>"  />
				<div class="centered" >
					<?
					if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
						$mainmenutopic_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
						$mainmenutopic_QR = mysqli_query($con,$mainmenutopic_SL);
						$mainmenutopic 	= mysqli_fetch_array($mainmenutopic_QR);
						?>
						<? echo $mainmenutopic[mainmenu_name]; echo " "; ?>
						<?
					}
					if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
						$catalogtopic_SL = " SELECT * FROM catalog WHERE catalog_id = '$_GET[catalog_id]'";
						$catalogtopic_QR = mysqli_query($con,$catalogtopic_SL);
						$catalogtopic 	= mysqli_fetch_array($catalogtopic_QR);
						?>
						<? echo " ->"; echo $catalogtopic[catalog_name];  ?>
						<?
					}
					if (isset($_GET[keyword])&&$_GET[keyword]!='') {
						?>
						ค้นหา : <? echo $keyword; echo " "; ?>
						<?
					}
					if ($Q==1) {
						?>
						ผลิตภัณฑ์ของเรา
						<?
					}
					?>
				</div>
			</div> 
			<?
		}
		else{
			?>
			<div class="mainmenu_cover bg1">
				<div class="centered" >
					<?
					if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
						$mainmenutopic_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
						$mainmenutopic_QR = mysqli_query($con,$mainmenutopic_SL);
						$mainmenutopic 	= mysqli_fetch_array($mainmenutopic_QR);
						?>
						<? echo $mainmenutopic[mainmenu_name]; echo " "; ?>
						<?
					}
					if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
						$catalogtopic_SL = " SELECT * FROM catalog WHERE catalog_id = '$_GET[catalog_id]'";
						$catalogtopic_QR = mysqli_query($con,$catalogtopic_SL);
						$catalogtopic 	= mysqli_fetch_array($catalogtopic_QR);
						?>
						<? echo " ->"; echo $catalogtopic[catalog_name];  ?>
						<?
					}
					if (isset($_GET[keyword])&&$_GET[keyword]!='') {
						?>
						ค้นหา : <? echo $keyword; echo " "; ?>
						<?
					}
					if ($Q==1) {
						?>
						ผลิตภัณฑ์ของเรา
						<?
					}
					?>
				</div>
			</div>
			<?
		}
	}
	if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
		?>
		<div class="container">
			<div class="row paddingtop15">
				<div class="col-md-12 margintop15">
					<?
					$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'mainmenu_id$_GET[mainmenu_id]' ORDER BY gallery_sort IS NULL ASC, gallery_sort ASC";
					$gallery_QR 	= mysqli_query($con,$gallery_SL);
					$gallery_Row 	= mysqli_num_rows($gallery_QR);
					while ($gallery 	= mysqli_fetch_array($gallery_QR)) {
						if (isset($gallery[gallery_photo])&&trim($gallery[gallery_photo])!='') {
							?>
							<div class="marginbottom15">
								<img src="Files/gallery_photo/<?php echo   $gallery[gallery_photo]; ?>" class="img-responsive" />
							</div>
							<?
						}
						?>															
						<?
						if (isset($gallery[gallery_video])&&trim($gallery[gallery_video])!='') {
							?>
							<div class="marginbottom15">
								<video width="100%" height="auto" controls><source src="Files/gallery_video/<? echo $gallery[gallery_video]; ?>" type="video/mp4">Your browser does not support HTML5 video.
								</video>
							</div>
							<?
						}
						?>
						<?
						if (isset($gallery[gallery_youtube])&&trim($gallery[gallery_youtube])!='') {
							?>
							<div class="marginbottom15">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe  src="<?php echo $gallery['gallery_youtube']; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
							</div>
							<?
						}
						?>
						<?
						if (isset($gallery[gallery_facebook])&&trim($gallery[gallery_facebook])!='') {
							?>
							<div class="marginbottom15">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe src="https://www.facebook.com/plugins/video.php?href=<?php echo $gallery['gallery_facebook']; ?>&show_text=0&width=269"  style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
								</div>
							</div>
							<?
						}
						?>
						<?
						if (isset($gallery[gallery_review])&&trim($gallery[gallery_review])!='') {
							?>
							<div class="marginbottom15 review">
								<?php echo $gallery[gallery_review]; ?>
							</div>
							<?
						}
						?>
						<?
						if (isset($gallery[gallery_link])&&trim($gallery[gallery_link])!='') {
							?>
							<div class="marginbottom15">
								<a target="_blank" class="btn btn-main" href="https://<?php echo $gallery[gallery_link]; ?>">
									<span class="glyphicon glyphicon-link"></span>
									<?php echo $gallery[gallery_link]; ?>
								</a>
							</div>
							<?
						}
						?>
						<?
						if (isset($gallery[gallery_download])&&trim($gallery[gallery_download])!='') {
							?>
							<div class="marginbottom15">
								<a target="_blank" class="btn btn-main" href="Files/gallery_download/<?php echo $gallery[gallery_download]; ?>">
									<span class="glyphicon glyphicon-download"></span>
									<?php echo $gallery[gallery_download]; ?>
								</a>
							</div>
							<?
						}
						?>

						<?
						$i++;
					}
					?>
				</div>
			</div>
		</div>
		<?
	}
	?>

	<div>
		<div class="container betwixt30">

			<div>
				<?
				$catalog_web_SL = "SELECT * FROM catalog WHERE EXISTS (SELECT 1 FROM web_product 
				WHERE web_product.catalog_id = catalog.catalog_id AND web_product.mainmenu_id = ".$_GET['mainmenu_id'].") ORDER BY catalog_sort ASC";
				$catalog_web_QR 	= mysqli_query($con,$catalog_web_SL);
				$catalog_web_row 	= mysqli_num_rows($catalog_web_QR);
				if ($catalog_web_row > 0) {
					?>
					<div class="row">
						<div class="col-md-3">
							<a class="btn btn-main btn-block br" href="web_product.php?mainmenu_id=<?php echo $_GET['mainmenu_id']; ?>">
								ทั้งหมด
							</a>
						</div>
						<?
						while ($catalog_web = mysqli_fetch_array($catalog_web_QR)) {
							?>
							<div class="col-md-3">
								<a class="btn btn-main btn-block br" href="web_product.php?catalog_id=<?php echo $catalog_web['catalog_id']; ?>&mainmenu_id=<?php echo $_GET['mainmenu_id']; ?>">
									<? echo $catalog_web['catalog_name']; ?>
								</a>
							</div>
							<?
						}
						?>
					</div>
					<?
				}
				?>

			</div>

			<div class="row">
				<div class="col-md-12"> 
					<?
					$Ac_i = 1;
					while ($web_product     = mysqli_fetch_array($web_product_QR)) {
						if ($Ac_i==1) {
							?>
							<div class="row">
								<?php
							}
							?>  
							<div class="col-md-4">
								<? include 'index_panel_web_product.php'; ?>
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
								<li class="active"><? echo $mainmenu_head[mainmenu_name];  ?> </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<? include 'index_footer.php'; ?>
</body>
</html>
<?

?>



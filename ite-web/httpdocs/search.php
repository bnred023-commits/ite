<?

include 'index_Include.php'; 
$_SESSION['page'] = 'search.php';

$all_row = 0;
if (isset($_GET[keyword])&&$_GET[keyword]!='') {

	// ---------
	$web_product_sql = "SELECT * FROM web_product WHERE ";
	$keyword = $_GET['keyword'];
	$keyword = str_replace("'","&#39;",$keyword);
	$keyword = str_replace("\"","&quot;",$keyword);
	$Q = 1;
	if ($Q==1) {
		$web_product_sql .= " ( web_product_name LIKE '%$keyword%'  OR  web_product_detail LIKE '%$keyword%'  OR web_product_review LIKE '%$keyword%'   )";
		$Q++;
	}
	else{
		$web_product_sql .= " AND  ( web_product_name LIKE '%$keyword%'  OR  web_product_detail LIKE '%$keyword%'  OR web_product_review LIKE '%$keyword%'   ) ";
		$Q++;
	}
	$web_product_sql 	.= " ORDER BY web_product_id DESC";
	$web_product_qr 	= mysqli_query($con,$web_product_sql);
	$web_product_row   	= mysqli_num_rows($web_product_qr);
	$all_row += $web_product_row;
	// ---------


	// ---------
	$web_content_sql = "SELECT * FROM web_content WHERE ";
	$keyword = $_GET['keyword'];
	$keyword = str_replace("'","&#39;",$keyword);
	$keyword = str_replace("\"","&quot;",$keyword);
	$Q = 1;
	if ($Q==1) {
		$web_content_sql .= " ( web_content_name LIKE '%$keyword%'  OR  web_content_detail LIKE '%$keyword%'  OR web_content_review LIKE '%$keyword%'   )";
		$Q++;
	}
	else{
		$web_content_sql .= " AND  ( web_content_name LIKE '%$keyword%'  OR  web_content_detail LIKE '%$keyword%'  OR web_content_review LIKE '%$keyword%'   ) ";
		$Q++;
	}
	$web_content_sql 	.= " ORDER BY web_content_id DESC";
	$web_content_qr 	= mysqli_query($con,$web_content_sql);
	$web_content_row   	= mysqli_num_rows($web_content_qr);
	$all_row += $web_content_row;
	// ---------



}


?>

<!DOCTYPE html>
<html>
<head>
	<?
	if (isset($_GET[keyword])&&$_GET[keyword]!='') {
		?>  
		<title> ค้นหา : <? echo $keyword; ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content=" <? echo $fixed[fixed_topic]; ?> - <? echo $fixed[fixed_company]; ?> ">
		<meta name="keywords" content="<? echo $fixed[fixed_topic]; ?>">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	?>	
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div>
		<div class="container between30">
			<div class="row br">
				<div class="col-md-12">
					<div class="size25">
						<?
						if (isset($_GET[keyword])&&$_GET[keyword]!='') {
							?>  
							ค้นหา : <? echo $keyword; ?> 
							<?
						}
						?>
						<?
						if ($all_row=='0') { echo " (ไม่พบข้อมูล)"; }
						else{ 
							?>
							<span class="btn btn-main no-radius">
								<? echo number_format($all_row); ?> รายการ	
							</span>
							<?
						} 
						?>
					</div>
					<hr style="margin-top: 10px;margin-bottom: 10px;">
				</div>
			</div>

			<!-- row -->
			<?
			if ($web_product_row>0) {
				?>
				<div>

				</div>
				<?
				$x = 1;
				while ($web_product     = mysqli_fetch_array($web_product_qr)) {
					if ($x==1) {
						?>
						<div class="row">
							<?php
						}
						?>  
						<div class="col-md-12">
							<div class="size22 text-black bold" >
								<? echo $web_product[web_product_name]; ?>
							</div>
							<div class="size16 text-black" >
								<? echo $web_product[web_product_detail]; ?>
							</div>
							<?
							if (isset($web_product[web_product_price])&&trim($web_product[web_product_price])!=''&&trim($web_product[web_product_price])!='0') {
								?>
								<div class="size16 text-black" >
									<?
									echo "฿ ";  echo number_format($web_product[web_product_price]); 
									?>
								</div>
								<?
							}
							?>
							<div class="size15">
								<a class="btn btn-default"  href="web_product_detail.php?web_product_id=<? echo $web_product[web_product_id]; ?>"  >
									ดูเพิ่มเติม
								</a>
							</div>
							<hr>
						</div>
						<?php
						if ($x==1) {
							$x=0;
							?>
						</div>
						<?
					}
					$x++;
				}
				if ($x!=1) {
					echo "</div>";
				}
			}
			?>
			<!-- row -->
			<!-- row -->
			<?
			if ($web_content_row>0) {
				?>
				<div>

				</div>
				<?
				$x = 1;
				while ($web_content     = mysqli_fetch_array($web_content_qr)) {
					if ($x==1) {
						?>
						<div class="row">
							<?php
						}
						?>  
						<div class="col-md-12">
							
							<p class="size22 text-black bold" style="margin-top: 7px;">
								<? echo $web_content[web_content_name]; ?>
							</p>
							<p class="size16 text-black" style="margin-top: 15px;">
								<? echo $web_content[web_content_detail]; ?>
							</p>

							<?
							if (isset($web_content[web_content_price])&&trim($web_content[web_content_price])!=''&&trim($web_content[web_content_price])!='0') {
								?>
								<p class="size16 text-black" >
									<?
									echo "฿ ";  echo number_format($web_content[web_content_price]); 
									?>
								</p>
								<?
							}
							?>
							<div  style="margin-top: 20px;">
								<a class="size15 text-black btn btn-default" href="web_content_detail.php?web_content_id=<? echo $web_content[web_content_id]; ?>"  >
									อ่านเพิ่มเติม
								</a>
							</div>
							<hr>
						</div>
						<?php
						if ($x==3) {
							$x=0;
							?>
						</div>
						<?
					}
					$x++;
				}
				if ($x!=1) {
					echo "</div>";
				}
			}
			?>
			<!-- row -->



			<div class="row hidden-sm hidden-xs margintop30" >
				<div class="col-md-12">
					<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
						<li><a href="index.php">หน้าแรก</a></li>
						<li>
							<a onclick="goBack();" href="#">
								กลับ
							</a>
						</li>        
					</ul>
				</div>
			</div>


		</div>
	</div>
	<!-- container -->
	<? include 'index_footer.php'; ?>
</body>
</html>
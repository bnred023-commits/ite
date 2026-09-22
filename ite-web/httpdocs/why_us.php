<?

include 'index_Include.php'; 
$_SESSION['page'] = 'why_us.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'why_us'";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

?>

<!DOCTYPE html>
<html>
<head>
	<title> ทำไมต้องเลือกเรา   | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?>">
	<meta name="keywords" content="<? echo $fixed[fixed_topic]; ?>">
	<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div>
		<?
		if (isset($pagecontent[pagecontent_photo]) && trim($pagecontent[pagecontent_photo])!='') {
			?>
			<style type="text/css">
				.centered {
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-50%, -50%);
					font-size: 55px;color: white;
				}
				@media (max-width: 1201px) {
					.centered {
						font-size: 20px;color: white;
					}
				}

			</style>
			<div class="img30">
				<img class="full tinted2"  id="<?php echo $pagecontent[pagecontent_photo]; ?>" src="Files/pagecontent_photo/<?php echo $pagecontent[pagecontent_photo]; ?>"  />
				<div class="centered" style="">
					ทำไมต้องเลือกเรา
				</div>
			</div>
			<?
		}
		?>
		<div class="container betwixt30">
			<div class="size36 bold color4" style="margin-bottom: 45px;" >
				ทำไมต้องเลือกเรา
				<div class="bg3" style="height: 7px;width: 264px; max-width: 100%;"></div>
			</div> 
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12 review">
							<? echo  $pagecontent[pagecontent_review];; ?>
						</div>
					</div>
					<div class="row paddingtop15">
						<div class="col-md-12 margintop15">
							<?
							$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'pagecontent_id$pagecontent[pagecontent_id]' ORDER BY gallery_sort IS NULL ASC, gallery_sort ASC";
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
									<div class="marginbottom15">
										<?php echo $gallery[gallery_review]; ?>
									</div>
									<?
								}
								?>
								<?
								if (isset($gallery[gallery_link])&&trim($gallery[gallery_link])!='') {
									?>
									<div class="marginbottom15">
										<a target="_blank" class="btn btn-main" href="http://<?php echo $gallery[gallery_link]; ?>">
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

					
					
					<div class="row hidden-sm hidden-xs margintop30 uppercase" >
						<div class="col-md-12">
							<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
								<li><a href="index.php">หน้าแรก</a></li>
								<li>
									<a onclick="goBack();" href="#">
										กลับ
									</a>
								</li>  
								<li> ทำไมต้องเลือกเรา  </li>
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
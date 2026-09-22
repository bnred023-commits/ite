<?

include 'index_Include.php'; 


$web_content_SL = " SELECT * FROM web_content WHERE web_content_id = '$_GET[web_content_id]'";
$web_content_QR = mysqli_query($con,$web_content_SL);
$web_content 	= mysqli_fetch_array($web_content_QR);

$_SESSION['page'] = 'mainmenu' . $web_content['mainmenu_id'];



?>

<!DOCTYPE html>
<html>
<head>
	<title> <? echo $web_content[web_content_name]; ?>  |  <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $web_content[web_content_name]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="<? echo $web_content[web_content_name]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="<? echo $web_content[web_content_name]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div>
		<?
		if (isset($web_content[web_content_cover]) && trim($web_content[web_content_cover])!='') {
			?>
			<div class="mainmenu_cover">
				<img class="full tinted2"  id="<?php echo $web_content[web_content_cover]; ?>" src="Files/web_content_cover/<?php echo $web_content[web_content_cover]; ?>"  />
				<div class="centered" >
					<? echo $web_content[web_content_name] ?>
				</div>
			</div>
			<?
		}
		else{
			?>
			<div class="mainmenu_cover bg1">
				<div class="centered" >
					<? echo $web_content[web_content_name] ?>
				</div>
			</div>
			<?
		}
		?>
		<div class="container betwixt30">	
			<div class="row">
				<?
				if (isset($web_content[web_content_photo])&&trim($web_content[web_content_photo])!='') {
					?>
					<div class="col-md-7">
						<img class="full" src="Files/web_content_photo/<?php echo $web_content[web_content_photo]; ?>"  />
					</div>
					<div class="col-md-5">
						<div class="size48" style="color: #828282;" >
							<? echo $web_content[web_content_name]; ?>
						</div>
						<div class="size21 text-muted" >
							<? echo $web_content[web_content_detail]; ?>
						</div>
					</div>
					<?
				}
				else{
					?>
					<div class="col-md-12">
						<div class="size21 text-muted" >
							<? echo $web_content[web_content_detail]; ?>
						</div>
					</div>
					<?
				}	
				?>

			</div>

			<?
			$web_content_picture_SL 		= " SELECT * FROM web_content_picture WHERE web_content_id = '$web_content[web_content_id]' ORDER by web_content_picture_id asc ";
			$web_content_picture_QR 		= mysqli_query($con,$web_content_picture_SL);
			$web_content_picture_Row 	= mysqli_num_rows($web_content_picture_QR);
			if ($web_content_picture_Row>0) {
				while ($web_content_picture 	= mysqli_fetch_array($web_content_picture_QR)) {
					?>
					<img class="full" style="cursor: zoom-in;margin-top: 30px;" id="myImg<?php echo $web_content_picture[web_content_picture_id]; ?>" src="Files/web_content_picture_photo/<?php echo $web_content_picture[web_content_picture_photo]; ?>"  />
					<div id="myModal" class="w3-modal">
						<span class="zoom-close w3-close">&times;</span>
						<img class="w3-modal-content w3-close" id="img01">
					</div>
					<script>
						var w3modal = document.getElementById("myModal");
						var img = document.getElementById("myImg<?php echo $web_content_picture[web_content_picture_id]; ?>");
						var modalImg = document.getElementById("img01");
						img.onclick = function(){
							w3modal.style.display = "block";
							modalImg.src = this.src;
						}
						var span = document.getElementsByClassName("w3-close")[0];
						span.onclick = function() { 
							w3modal.style.display = "none";
						}
						window.onclick = function(event) {
							if (event.target == w3modal) {
								w3modal.style.display = "none";
							}
						}
					</script>
					<?
				}
			}
			?>
			<div class="row">
				<div class="col-md-12 review" style="margin-top: 30px;">
					<? echo  $web_content[web_content_review]; ?>
				</div>
			</div>
			<div class="row paddingtop15">
				<div class="col-md-12 margintop15">
					<?
					$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'web_content_id$web_content[web_content_id]' ORDER BY gallery_sort IS NULL ASC, gallery_sort ASC";
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
			

			<div>
				
				<p class="size22">
					สนใจติดต่อสอบถาม
				</p>
				<div class="row">
					<div class="col-md-12">
						<?
						$social_SL = " SELECT * FROM social ORDER BY social_sort ASC ";
						$social_QR 	= mysqli_query($con,$social_SL);
						while ($social 	= mysqli_fetch_array($social_QR)) {
							?>
							<p class="hide1 text-black" title="<?php echo $social[social_name]; ?>">
								<?
								if (isset($social[social_link])&&$social[social_link]!='') {

									if ($social[social_type]=='Tel') {
										?>
										<a  class="btn btn-default" href="tel:<?php echo $social[social_link]; ?>" target="_blank"> 
											<?
											if (isset($social[social_photo])&&$social[social_photo]!='') {
												?>
												<img style="max-height:25px;" src="Files/social_photo/<?php echo $social[social_photo]; ?>" /> 
												<?
											}
											else{
												echo $social[social_type]."  :  ";
											}
											?>
											<?php echo $social[social_name]; ?>
										</a>
										<?
									}
									else{
										?>
										<a class="btn btn-default" href="https://<?php echo $social[social_link]; ?>" target="_blank"> 
											<?
											if (isset($social[social_photo])&&$social[social_photo]!='') {
												?>
												<img style="max-height:25px;" src="Files/social_photo/<?php echo $social[social_photo]; ?>" /> 
												<?
											}
											else{
												echo $social[social_type]."  :  ";
											}
											?>
											<?php echo $social[social_name]; ?>
										</a>
										<?
									}
								}
								else{
									?>
									<a class="btn btn-default"> 
										<?
										if (isset($social[social_photo])&&$social[social_photo]!='') {
											?>
											<img style="max-height:25px;" src="Files/social_photo/<?php echo $social[social_photo]; ?>" /> 
											<?
										}
										else{
											echo $social[social_type]."  :  ";
										}
										?>
										<?php echo $social[social_name]; ?>  
									</a>
									<?
								}
								?>
							</p>
							<?
						}
						?>
					</div>
					<div class="col-xs-6">
						<div class="row margintop10">
							<?
							$qrcode_SL = " SELECT * FROM qrcode ORDER BY qrcode_sort ASC ";
							$qrcode_QR 	= mysqli_query($con,$qrcode_SL);
							while ($qrcode 	= mysqli_fetch_array($qrcode_QR)) {
								?>
								<div class="col-xs-12 paddingbottom15">
									<?
									if (isset($qrcode[qrcode_link])&&$qrcode[qrcode_link]!='') {
										if ($qrcode[qrcode_type]=='Tel') {
											?>
											<a class="marginbottom10"  href="tel:<?php echo $qrcode[qrcode_link]; ?>" target="_blank"> 
												<?
												if (isset($qrcode[qrcode_photo])&&$qrcode[qrcode_photo]!='') {
													?>
													<img class="img-responsive" src="Files/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>" /> 
													<?
												}
												?>
											</a>
											<?
										}
										else{
											?>
											<a class="marginbottom10"  href="https://<?php echo $qrcode[qrcode_link]; ?>" target="_blank"> 
												<?
												if (isset($qrcode[qrcode_photo])&&$qrcode[qrcode_photo]!='') {
													?>
													<img class="img-responsive" src="Files/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>" /> 
													<?
												}
												?>
											</a>
											<?
										}
									}
									else{
										?>
										<a class="marginbottom10"> 
											<?
											if (isset($qrcode[qrcode_photo])&&$qrcode[qrcode_photo]!='') {
												?>
												<img class="img-responsive" style="cursor: zoom-in;max-width: 200px;" id="qrcode_web_content_detail<?php echo $qrcode[qrcode_id]; ?>" src="Files/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>"  />
												<div id="qrcode_web_content_detail" class="w3-modal">
													<span class="zoom-close w3-close">&times;</span>
													<img class="w3-modal-content w3-close" id="qrcode_photo_web_content_detail" style="width: 500px;">
												</div>
												<script>
													var w3modal = document.getElementById("qrcode_web_content_detail");
													var img = document.getElementById("qrcode_web_content_detail<?php echo $qrcode[qrcode_id]; ?>");
													var modalImg = document.getElementById("qrcode_photo_web_content_detail");
													img.onclick = function(){
														w3modal.style.display = "block";
														modalImg.src = this.src;
													}
													var span = document.getElementsByClassName("w3-close")[0];
													span.onclick = function() { 
														w3modal.style.display = "none";
													}
													window.onclick = function(event) {
														if (event.target == w3modal) {
															w3modal.style.display = "none";
														}
													}
												</script>
												<?
											}
											?>
										</a>
										<?
									}
									?>
								</div>
								<?
							}
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="row hidden-sm hidden-xs paddingtop30" >
				<div class="col-md-12">
					<ul class="breadcrumb no-radius">
						<li>
							<a onclick="goBack();" href="#">กลับ</a>
						</li> 
						<li><a href="index.php">หน้าแรก</a></li>
						<li>
							<a href="web_content.php">
								บริการของเรา 
							</a>
						</li>
						<li> <? echo $web_content[web_content_name]; ?></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
	<? include 'index_footer.php'; ?>
</body>
</html>
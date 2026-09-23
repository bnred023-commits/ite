<?

include 'index_Include.php'; 
$_SESSION['page'] = 'web_product.php';

$web_product_SL = " SELECT * FROM web_product WHERE web_product_id = '$_GET[web_product_id]'";
$web_product_QR = mysqli_query($con,$web_product_SL);
$web_product 	= mysqli_fetch_array($web_product_QR);

$_SESSION['page'] = 'mainmenu' . $web_product['mainmenu_id'];



?>

<!DOCTYPE html>
<html>
<head>
	<title> <? echo $web_product[web_product_name]; ?>  |  <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $web_product[web_product_name]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="<? echo $web_product[web_product_name]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="<? echo $web_product[web_product_name]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div>
		<?
		if (isset($web_product[web_product_cover]) && trim($web_product[web_product_cover])!='') {
			?>
			<div class="mainmenu_cover">
				<img class="full tinted2"  id="<?php echo $web_product[web_product_cover]; ?>" src="Files/web_product_cover/<?php echo $web_product[web_product_cover]; ?>"  />
				<div class="centered" >
					<? echo $web_product[web_product_name] ?>
				</div>
			</div>
			<?
		}
		else{
			?>
			<div class="mainmenu_cover bg1">
				<div class="centered" >
					<? echo $web_product[web_product_name] ?>
				</div>
			</div>
			<?
		}
		?>
		<div class="container betwixt30">	
			<div class="row" style="margin-bottom: 15px;">
				<div class="col-md-6">
					<div>
						<div id="custom_carousel" class="carousel slide " data-ride="carousel"  data-interval="false">
							<div class="carousel-inner radius0">
								<div class="item active">
									<div class="img80">
										<img style="cursor: zoom-in;" id="myImgmain<?php echo $web_product[web_product_id]; ?>" src="Files/web_product_photo/<?php echo $web_product[web_product_photo]; ?>"  />
									</div>	
								</div> 
								<div id="myModal" class="w3-modal">
									<span class="zoom-close w3-close">&times;</span>
									<img class="w3-modal-content w3-close" id="img01">
								</div>
								<script>
									var w3modal = document.getElementById("myModal");
									var img = document.getElementById("myImgmain<?php echo $web_product[web_product_id]; ?>");
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
								$web_product_picture_SL = " SELECT * FROM web_product_picture WHERE web_product_id = '$web_product[web_product_id]' ORDER BY web_product_picture_id ASC";
								$web_product_picture_QR 	= mysqli_query($con,$web_product_picture_SL);
								$web_product_picture_Row = mysqli_num_rows($web_product_picture_QR);
								$i=1;
								while ($web_product_picture 	= mysqli_fetch_array($web_product_picture_QR)) {
									$i++;
									?>
									<div class="item">
										<div class="img80">
											<img style="cursor: zoom-in;" id="myImg<?php echo $web_product_picture[web_product_picture_id]; ?>" src="Files/web_product_picture_photo/<?php echo $web_product_picture[web_product_picture_photo]; ?>"  />
										</div>	
									</div> 
									<div id="myModal" class="w3-modal">
										<span class="zoom-close w3-close">&times;</span>
										<img class="w3-modal-content w3-close" id="img01">
									</div>
									<script>
										var w3modal = document.getElementById("myModal");
										var img = document.getElementById("myImg<?php echo $web_product_picture[web_product_picture_id]; ?>");
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
									<?php
								}
								?>
							</div>
							<a class="left carousel-control " href="#custom_carousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control " href="#custom_carousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>

						<div class="controls">
							<ul class="nav">
								<div class="row">	
									<div class="col-md-2 ">
										<li data-target="#custom_carousel" data-slide-to="0" class="active">
											<a href="#">
												<div class="img90 margintop15 " >
													<img src="Files/web_product_photo/<?php echo $web_product[web_product_photo]; ?>" class="full radius0 " >
												</div>
											</a>
										</li>
									</div>
									<?
									$web_product_picture_SL = " SELECT * FROM web_product_picture WHERE web_product_id = '$web_product[web_product_id]' ORDER BY web_product_picture_id ASC";
									$web_product_picture_QR 	= mysqli_query($con,$web_product_picture_SL);
									$web_product_picture_Row = mysqli_num_rows($web_product_picture_QR);
									$web_product_picture_Number =1;
									while ($web_product_picture 	= mysqli_fetch_array($web_product_picture_QR)) {
										?>
										<div class="col-md-2 ">
											<li data-target="#custom_carousel" data-slide-to="<? echo $web_product_picture_Number; ?>">
												<a href="#">
													<div class="img90 margintop15 " >
														<img src="Files/web_product_picture_photo/<?php echo $web_product_picture[web_product_picture_photo]; ?>" class="full radius0 " >
													</div>
												</a>
											</li>
										</div>
										<?
										$web_product_picture_Number++;
									}
									?>
								</div>
							</ul>
						</div>

					</div>

				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12 ">
							<div class="size48" style="color: #828282;" >
								<? echo $web_product[web_product_name]; ?>
							</div>
							<div class="size21 text-muted" >
								<? echo $web_product[web_product_detail]; ?>
							</div>
							<?
							if (isset($web_product[web_product_price])&&trim($web_product[web_product_price])!=''&&trim($web_product[web_product_price])!='0') {
								?>
								<div class="size25 bold color1 " >
									<? echo "฿ ";  echo number_format($web_product[web_product_price]);  ?>
								</div>
								<?
							}
							?>
							<div style="margin-top: 30px;">
								<p class="size16">
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
																<img class="img-responsive" style="cursor: zoom-in;max-width: 200px;" id="qrcode_web_product_detail<?php echo $qrcode[qrcode_id]; ?>" src="Files/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>"  />
																<div id="qrcode_web_product_detail" class="w3-modal">
																	<span class="zoom-close w3-close">&times;</span>
																	<img class="w3-modal-content w3-close" id="qrcode_photo_web_product_detail" >
																</div>
																<script>
																	var w3modal = document.getElementById("qrcode_web_product_detail");
																	var img = document.getElementById("qrcode_web_product_detail<?php echo $qrcode[qrcode_id]; ?>");
																	var modalImg = document.getElementById("qrcode_photo_web_product_detail");
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
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 review">
					<? echo  $web_product[web_product_review]; ?>
				</div>
			</div>
			<div class="row paddingtop15">
				<div class="col-md-12 margintop15">
					<?
					$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'web_product_id$web_product[web_product_id]' ORDER BY gallery_sort IS NULL ASC, gallery_sort ASC";
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

			<div style="margin-top: 30px;">
				<h3>
					Related Products
				</h3>
			</div>

			<div>
				<?
				$web_product_SL = " SELECT * FROM web_product WHERE web_product_id !=  '$_GET[web_product_id]' AND mainmenu_id = '$web_product[mainmenu_id]' ORDER BY  RAND() LIMIT 3 ";  
				$web_product_QR 	= mysqli_query($con,$web_product_SL);
				$Ac_i=1;
				while ($web_product 	= mysqli_fetch_array($web_product_QR)) {
					if ($Ac_i==1) {
						?>
						<div class="row">
							<?
						}
						?>	
						<div class="col-md-4">
							<? include 'index_panel_web_product.php'; ?>
						</div>
						<?
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

			<div class="row  paddingtop30" >
				<div class="col-md-12">
					<ul class="breadcrumb no-radius">
						<li>
							<a onclick="goBack();" href="#">กลับ</a>
						</li> 
						<li><a href="index.php">หน้าแรก</a></li>
						<li> <? echo $web_product[web_product_name]; ?></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
	<? include 'index_footer.php'; ?>
</body>
</html>
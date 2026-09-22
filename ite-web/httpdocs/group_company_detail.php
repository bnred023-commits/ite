<?
include 'index_Include.php'; 
$_SESSION['page'] = 'group_company.php';


if (isset($_GET[group_company_id])){
	$_SESSION[group_company_id] =  $_GET[group_company_id];
}


$group_company_SL = " SELECT * FROM group_company WHERE group_company_id = '$_SESSION[group_company_id] '";
$group_company_QR = mysqli_query($con,$group_company_SL);
$group_company 	= mysqli_fetch_array($group_company_QR);
$group_company_name =  $group_company[group_company_name];

?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>  <? echo $group_company[group_company_name]; ?> | <? echo $fixed[fixed_website]; ?></title>
	<meta name="description" content="  <? echo $group_company[group_company_detail]; ?>  ">
	<meta name="keywords" content="  <? echo $group_company[group_company_name]; ?>">
	<meta name="author" content="  <? echo $group_company[group_company_name];  ?>">
	<? include 'index_head.php'; ?>

	<meta property="og:image" content="https://<? echo $fixed[fixed_website]; ?>/Files/product_photo/<? echo $group_company[group_company_photo]; ?>" />
	<meta property="og:title" content="<? echo $group_company[group_company_name]; ?>" />
	<meta property="og:description"content="<? echo $group_company[group_company_detail]; ?>"/>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div class="bg2">
		<div class="container betwixt30">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default no-radius no-boxsha no-border bg1 text-white radius20">
						<div class="panel-body text-center">
							<span style="font-size: 24px;" >
								<?   echo $group_company[group_company_name];  ?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-12">
					<p class="pagetopic">
						<?   echo $group_company[group_company_name];  ?>
					</p>
					<p class="size20">
						<? echo $group_company[group_company_detail]; ?>
					</p>
					<img class="img-responsive"   style="cursor: zoom-in;" id="id_group_company_photo<?php echo $group_company[group_company_id]; ?>"   src="Files/group_company_photo/<?php echo $group_company[group_company_photo]; ?>" >
					<div id="my_group_company_photo<?php echo $group_company[group_company_id]; ?>" class="w3-modal">
						<span class="zoom-close w3-close<?php echo $group_company[group_company_id]; ?>" >&times;</span>
						<img class="w3-modal-content w3-close<?php echo $group_company[group_company_id]; ?>" id="img_group_company_photo<?php echo $group_company[group_company_id]; ?>">
					</div>
					<script>
						var w3modal = document.getElementById("my_group_company_photo<?php echo $group_company[group_company_id]; ?>");
						var img = document.getElementById("id_group_company_photo<?php echo $group_company[group_company_id]; ?>");
						var modalImg = document.getElementById("img_group_company_photo<?php echo $group_company[group_company_id]; ?>");
						img.onclick = function(){
							w3modal.style.display = "block";
							modalImg.src = this.src;
						}
						var span = document.getElementsByClassName("w3-close<?php echo $group_company[group_company_id]; ?>")[0];
						span.onclick = function() { 
							w3modal.style.display = "none";
						}
						window.onclick = function(event) {
							if (event.target == w3modal) {
								w3modal.style.display = "none";
							}
						}
					</script>
				</div>
			</div>
			<div class="row paddingtop15">
				<?
				$group_company_picture_SL = " SELECT * FROM group_company_picture WHERE group_company_id = '$group_company[group_company_id]' ORDER BY group_company_picture_id ASC";
				$group_company_picture_QR 	= mysqli_query($con,$group_company_picture_SL);
				$group_company_picture_Row = mysqli_num_rows($group_company_picture_QR);
				if (isset($group_company_picture_Row)&&$group_company_picture_Row!=0) {
					$group_company_picture_SL = " SELECT * FROM group_company_picture WHERE group_company_id = '$group_company[group_company_id]' ORDER BY group_company_picture_id ASC";
					$group_company_picture_QR 	= mysqli_query($con,$group_company_picture_SL);
					$Ac_i=1;
					$group_company_pictureActive = 1;
					while ($group_company_picture 	= mysqli_fetch_array($group_company_picture_QR)) {
						?>
						<div class="col-md-4 margintop15">
							<div class="img70">
								<img class="img-responsive" style="cursor: zoom-in;" id="group_company_picture<?php echo $group_company_picture[group_company_picture_id]; ?>"  src="Files/group_company_picture_photo/<?php echo $group_company_picture[group_company_picture_photo]; ?>" >
							</div>
							<div id="myModal" class="w3-modal">
								<span class="zoom-close w3-close">&times;</span>
								<img class="w3-modal-content w3-close" id="group_company_picture">
							</div>
							<script>
								var w3modal = document.getElementById("myModal");
								var img = document.getElementById("group_company_picture<?php echo $group_company_picture[group_company_picture_id]; ?>");
								var modalImg = document.getElementById("group_company_picture");
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
						</div>
						<?
					}
				}
				?>
			</div>
			<div class="row margintop30">
				<div class="col-md-12 Review">
					<? echo $group_company[group_company_review]; ?>
				</div>
			</div>
			
			<div class="row paddingtop15">
				<div class="col-md-12 margintop15">
					<?
					$gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'group_company_id$group_company[group_company_id]' ORDER BY gallery_sort IS NULL ASC, gallery_sort ASC";
					$gallery_QR 	= mysqli_query($con,$gallery_SL);
					$gallery_Row 	= mysqli_num_rows($gallery_QR);
					while ($gallery 	= mysqli_fetch_array($gallery_QR)) {
						?>
						<?
						if (isset($gallery[gallery_photo])&&trim($gallery[gallery_photo])!=''&&isset($gallery[gallery_review])&&trim($gallery[gallery_review])!='') {
							?>
							<div class="row">
								<?
								if (isset($gallery[gallery_photo])&&trim($gallery[gallery_photo])!='') {
									?>
									<div class="marginbottom15 col-md-6">
										<img src="Files/gallery_photo/<?php echo   $gallery[gallery_photo]; ?>" class="img-responsive" />
									</div>
									<?
								}
								?>	
								<?
								if (isset($gallery[gallery_review])&&trim($gallery[gallery_review])!='') {
									?>
									<div class="marginbottom15 col-md-6">
										<?php echo $gallery[gallery_review]; ?>
									</div>
									<?
								}
								?>	
								<div class="col-md-12">
									<hr>
								</div>
							</div>	
							<?
						}
						else{
							?>
							<?
							if (isset($gallery[gallery_photo])&&trim($gallery[gallery_photo])!='') {
								?>
								<div class="marginbottom15">
									<img src="Files/gallery_photo/<?php echo   $gallery[gallery_photo]; ?>" class="img-responsive" />
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
						if (isset($gallery[gallery_link])&&trim($gallery[gallery_link])!='') {
							?>
							<div class="marginbottom15">
								<a target="_blank" class="btn btn-default" href="http://<?php echo $gallery[gallery_link]; ?>">
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
								<a target="_blank" class="btn btn-default" href="Files/gallery_download/<?php echo $gallery[gallery_download]; ?>">
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

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default resize no-border no-radius boxsha radius20 border1" style="overflow: hidden;">
						<div class="panel-body" style="background-color: #fbfcfc;">
							<p>
								<span class="size18 bold color1 border1-bottom">
									ติดต่อสอบถามหรือสั่งซื้อบริการ
								</span>
							</p>
							<div class="row">
								<div class="col-xs-6">
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
													<a  href="tel:<?php echo $social[social_link]; ?>" target="_blank"> 
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
													<a  href="http://<?php echo $social[social_link]; ?>" target="_blank"> 
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
												<a> 
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
													<a class="marginbottom10"  href="http://<?php echo $qrcode[qrcode_link]; ?>" target="_blank"> 
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
														<img class="img-responsive"  style="cursor: zoom-in;width: 200px; max-width:100%;" id="qrcode_product_detail<?php echo $qrcode[qrcode_id]; ?>" src="Files/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>"  />
														<div id="qrcode_product_detail" class="w3-modal">
															<span class="zoom-close w3-close">&times;</span>
															<img class="w3-modal-content w3-close" id="qrcode_photo_product_detail" style="width: 500px;">
														</div>
														<script>
															var w3modal = document.getElementById("qrcode_product_detail");
															var img = document.getElementById("qrcode_product_detail<?php echo $qrcode[qrcode_id]; ?>");
															var modalImg = document.getElementById("qrcode_photo_product_detail");
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
							<div class="row">
								<div class="col-md-12 margintop10 text-right">
									<a href="" class="btn btn-sm btn-link" data-toggle="modal" data-target="#share_modal" ><img style="width: 20px;" src="Photo/share.png"> แชร์ </a>
								</div>
							</div>

							<div id="share_modal" class="modal fade" role="dialog">
								<div class="modal-dialog ">
									<div class="modal-content">
										<form method="post">
											<div class="modal-body text-center">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title color1 bold" > คุณต้องการแชร์ไปยัง</h4>
												<br>
												<div class="row">
													<div class="col-md-12">
														<? $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
														<p class="size18">
															<a style="padding: 4px 7px;" href="http://www.facebook.com/share.php?u=<? echo $actual_link; ?>" target="_blank" class="margintop10 btm-sm btn btn-primary">
																<img src="Photo/facebook.png" style="height: 17px; margin-top: -15px;margin-bottom: -12px;">
																Facebook
															</a>
															<a style="padding: 4px 7px;" style="background-color: #008600;" href="http://lineit.line.me/share/ui?url=<? echo $actual_link; ?>" target="_blank" class="margintop10 btm-sm btn btn-success">
																<img src="Photo/linesocial.png" style="height: 17px; margin-top: -15px;margin-bottom: -12px;">
																Line
															</a>
															<a style="padding: 4px 7px;"  href="http://mail.google.com/mail/u/0/?view=cm&to&su=<? echo $product[product_name]; ?>&body=<? echo $actual_link; ?>" target="_blank" class="margintop10 btm-sm btn btn-danger">
																<img src="Photo/mail.png" style="height: 17px; margin-top: -15px;margin-bottom: -12px;">
																Gmail
															</a>
														</p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 margintop5">
														<p class="size16 color1 bold">หรือ</p>
													</div>
													<div class="col-md-12 ">
														<input type="text" class="form-control" value="<? echo($actual_link); ?>" id="actual_link">
													</div>
													<div class="col-md-12 margintop5">
														<button  onclick="Function_store(actual_link)" class="btn btn-primary" >
															คัดลอก
														</button>
														<script>
															function Function_store($i) {
																var copyText = document.getElementById($i);
																copyText.select();
																copyText.setSelectionRange(0, 99999)
																document.execCommand("copy");
															}
														</script>
													</div>
												</div>
												<br>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row hidden-sm hidden-xs margintop30 uppercase" >
				<div class="col-md-12">
					<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
						<li><a href="index.php">หน้าแรก</a></li>
						<li><a href="group_company.php">บริษัทในเครือ</a></li>
						<li class="active">
							<? echo $group_company_name; ?>
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
<?


?>
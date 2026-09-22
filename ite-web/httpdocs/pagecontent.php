<?

include 'index_Include.php'; 
$_SESSION['page'] = 'pagecontent.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_id = '$_GET[pagecontent_id]' AND  pagecontent_status = 'เปิด' ";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

?>

<!DOCTYPE html>
<html>
<head>
	<title> <? echo $pagecontent[pagecontent_topic]; ?>  |  <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $pagecontent[pagecontent_topic]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="<? echo $pagecontent[pagecontent_topic]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="<? echo $pagecontent[pagecontent_topic]; ?>   <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div>
		<div class="container betwixt30">	

			<div class="col-md-3">
				<div class="panel panel-default no-radius no-boxsha no-border bg1 text-white">
					<div class="panel-body text-center" style="padding-top: 8px;padding-bottom: 8px;">
						<span class="size20" >
							<? echo $pagecontent[pagecontent_topic] ?>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div class="size25">
							<? echo $pagecontent[pagecontent_topic] ?>
						</div>
						<hr style="margin-top: 10px;margin-bottom: 10px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?
						if (isset($pagecontent[pagecontent_photo])&&trim($pagecontent[pagecontent_photo])!='') {
							?>
							<img class="img-responsive betwixt15" style="cursor: zoom-in;" id="myImgmain<?php echo $pagecontent[pagecontent_id]; ?>" src="Files/pagecontent_photo/<?php echo $pagecontent[pagecontent_photo]; ?>"  />
							<div id="myModal" class="w3-modal">
								<span class="zoom-close w3-close">&times;</span>
								<img class="w3-modal-content w3-close" id="img01">
							</div>
							<script>
								var w3modal = document.getElementById("myModal");
								var img = document.getElementById("myImgmain<?php echo $pagecontent[pagecontent_id]; ?>");
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
						else{
							echo "-";
						}
						?>
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
				<div class="row hidden-sm hidden-xs paddingtop30" >
					<div class="col-md-12">
						<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
							<li><a href="index.php">หน้าแรก</a></li>
							<li>
								<a onclick="goBack();" href="#">กลับ</a>
							</li> 
							<li> <? echo $pagecontent[pagecontent_topic]; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<? include 'index_footer.php'; ?>
</body>
</html>
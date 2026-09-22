<?
$slides_SL = " SELECT * FROM slides  ORDER BY slides_sort ASC";
$slides_QR 	= mysqli_query($con,$slides_SL);
$slides_Row = mysqli_num_rows($slides_QR);
if ($slides_Row>0) {
	?>
	<div id="myCarousel" class="carousel slide" data-interval="5000"  data-ride="carousel" style="width: 100%;margin: auto;">
		<?
		if ($slides_Row>1) {
			?>
			<ol class="carousel-indicators visible-lg">
				<? for ($x=0; $x < $slides_Row ; $x++) { ?>
					<li data-target="#myCarousel" data-slide-to="<? echo $x; ?>" class="<?  if ($x==0) { echo 'active'; } ?>"></li>
				<? } ?> 
			</ol>
			<?
		}
		?>
		<div class="carousel-inner">
			<?
			$i=1;
			while ($slides 	= mysqli_fetch_array($slides_QR)) {
				?>
				<div class="item <?  if ($i==1) { echo 'active'; } ?> font2">

					<?
					if (!empty($slides['slides_link'])) {
						?>
						<a target="_blank"  href="https://<? echo $slides[slides_link]; ?>"  >
							<div >
								<img  class="full <? if((isset($slides[slides_detail])&&trim($slides[slides_detail])!='')){  ?>tinted <?  } ?>"  src="Files/slides_photo/<?php echo $slides[slides_photo]; ?>" >
							</div>
						</a>
						<?
					}
					else{
						?>
						<div >
							<img  class="full <? if((isset($slides[slides_detail])&&trim($slides[slides_detail])!='')){  ?>tinted <?  } ?>"  src="Files/slides_photo/<?php echo $slides[slides_photo]; ?>" >
						</div>
						<?
					}
					?>
					
					<?
					if (isset($slides[slides_topic])&&$slides[slides_topic]!='') {
						?>
						<div class="carousel-caption visible-lg" style="margin-bottom: 13%;">
							<div style="font-size: 50px;color: white;font-weight: bold;" >
								<?php echo $slides[slides_topic]; ?>
							</div>
						</div>
						<?
					}
					if (isset($slides[slides_detail])&&trim($slides[slides_detail])!='') {
						?>
						<div class="carousel-caption visible-lg" style="margin-bottom: 10%;">
							<p style="color: white;font-size: 25px;">
								<?
								if (isset($slides[slides_detail])&&$slides[slides_detail]!='') {
									echo $slides[slides_detail]; 
								}
								?>
							</p>
						</div>
						<?
					}
					?>
				
				</div>
				<?php
				$i++;
			}
			?>
		</div>
		<a class="left carousel-control " href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control " href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<?
}
?>


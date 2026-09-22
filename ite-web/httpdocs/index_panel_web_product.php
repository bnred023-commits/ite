<a   href="web_product_detail.php?web_product_id=<? echo $web_product[web_product_id]; ?>"  >
	<div class="">
		<div class="img70 bg1">
			<?
			if (isset($web_product[web_product_photo])&&trim($web_product[web_product_photo])!='') {
				?>
				<img  src="Files/web_product_photo/<?php echo $web_product[web_product_photo]; ?>"   />
				<?
			}	
			else{
				?>
				<div style="position: absolute;top: 45%;text-align: center; -webkit-text-stroke: 0.5px black;color: black;font-size: 18px;width: 100%;">
					<? echo $web_product[web_product_name]; ?>
				</div>
				<?
			}
			?>
		</div>
		<div class="row ">
			<div class="col-md-12 ">
				<div  style="padding: 5px 10px;background: linear-gradient(135deg, #fffefe, #bbbbbb, #f1f1f1);">
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
						<a class=" text-black"  href="web_product_detail.php?web_product_id=<? echo $web_product[web_product_id]; ?>"  >
							ดูเพิ่มเติม
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div style="margin-bottom: 30px;"></div>
</a>
<a  href="product.php?catalog_id=<? echo $catalog[catalog_id]; ?>" title="<? echo $catalog[catalog_name]; ?>" >
	<div  class="panel panel-default no-radius" style="background-color: inherit !important;overflow: hidden;border-top: 5px solid #e2c277;">
		<div class="panel-body no-border resize" style="overflow: hidden;background-color: inherit !important;">
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="size18 marginbottom0  text-black bold" >
						<? echo $catalog[catalog_name]; ?>
					</p>
				</div>
			</div>
		</div>
		<div class="panel-heading no-border no-padding " style="overflow: hidden;background: inherit;" >
			<div class="img70">
				<img  src="Files/catalog_photo/<?php echo $catalog[catalog_photo]; ?>"  />
			</div>
		</div>
	</div>
</a>


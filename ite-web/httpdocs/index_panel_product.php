<a  href="product_detail.php?product_id=<? echo $product[product_id]; ?>"  >
	<div  class="panel panel-default  no-boxsha no-radius" style="background-color: white !important;">
		<div class="panel-heading no-border no-padding  no-radius" style="overflow: hidden;" style="background-color: white !important;">
			<div class="img70" title="<? echo $product[product_name]; ?> <? echo $product[product_detail]; ?>">
				<img  src="Files/product_photo/<?php echo $product[product_photo]; ?>"  />
			</div>
		</div>
		<div class="panel-body no-border resize" style="overflow: hidden;background-color: #fff !important;">
			<div class="row">
				<div class="col-md-12">
					<div class="size16 hide2 color1"  >
						<? echo $product[product_name]; ?>
					</div>
					<div class="size14 text-muted" >
						<? echo $product[product_detail]; ?>
					</div>
				</div>
				<div class="col-md-12 margintop5">
					<a class="btn btn-sm btn-main" href="product_detail.php?product_id=<? echo $product[product_id]; ?>"> รายละเอียด </a>
				</div>
			</div>
		</div>
	</div>
</a>


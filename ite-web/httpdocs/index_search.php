<div class="panel panel-default panel-set01 boxsha4 margintop30">
	<div class="panel-body">
		<div class="col-md-12  ">
			<form class="form-horizontal" action="product.php">
				<div class="form-group no-margin">
					<div class="col-md-3 marginbottom15 ">
						<select class="form-control"  name="market_id" >
							<option value="">ซื้อ & เช่า</option>
							<?
							$market_SL = " SELECT * FROM market  ORDER BY market_sort ASC";
							$market_QR 	= mysqli_query($con,$market_SL);
							while ($market 	= mysqli_fetch_array($market_QR)) {
								?>
								<option value="<?php echo $market[market_id]; ?>"><?php echo $market[market_name]; ?>  </option>
								<?
							}
							?>
						</select>
					</div>
					<div class="col-md-3 marginbottom15 ">
						<input  class="form-control" name="keyword" placeholder="คำค้นหา เช่น ชื่อโครงการ ทำเล" maxlength="40">
					</div>
					<div class="col-md-3 marginbottom15 ">
						<select class="form-control"  name="catalog_id" >
							<option value="">ที่อยู่อาศัย ประเภทอสังหาฯ</option>
							<?
							$catalog_SL = " SELECT * FROM catalog  ORDER BY catalog_sort ASC";
							$catalog_QR 	= mysqli_query($con,$catalog_SL);
							while ($catalog 	= mysqli_fetch_array($catalog_QR)) {
								?>
								<option value="<?php echo $catalog[catalog_id]; ?>"><?php echo $catalog[catalog_name]; ?>  </option>
								<?
							}
							?>
						</select>
					</div>
					<div class="col-md-3 marginbottom15 ">
						<input type="number" class="form-control" name="product_bedroom" placeholder="จำนวนห้องนอน" maxlength="40">
					</div>
				</div>
				<div class="form-group no-margin">
					<div class="col-md-3 marginbottom15 ">
						<input type="number" class="form-control" name="product_bathroom" placeholder="จำนวนห้องน้ำ" maxlength="40">				
					</div>
					<div class="col-md-3 marginbottom15 ">
						<input type="number" class="form-control" name="price_min" placeholder="ราคาต่ำสุด" maxlength="40">
					</div>
					<div class="col-md-3 marginbottom15 ">
						<input type="number" class="form-control" name="price_max" placeholder="ราคาสูงสุด" maxlength="40">				
					</div>
					<div class="col-md-3 marginbottom15 ">
						<button class="btn btn-main btn-block" type="submit"  style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
							<i class="glyphicon glyphicon-search"></i>  ค้นหา
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?
						$web_product_SL = " SELECT * FROM web_product WHERE mainmenu_id = '$mainmenu_id'";
						$web_product_QR 	= mysqli_query($con,$web_product_SL);
						$web_product_row    = mysqli_num_rows($web_product_QR);
						if ($web_product_row > 0) {
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-6">
											<?
											if (isset($_GET[keyword])&&$_GET[keyword]!='') {
												?>
												ค้นหา : <? echo $keyword; echo " "; ?>
												<?
											}
											if (isset($_GET[mainmenu_id])&&trim($_GET[mainmenu_id])!='') {
												$mainmenutopic_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$_GET[mainmenu_id]'";
												$mainmenutopic_QR = mysqli_query($con,$mainmenutopic_SL);
												$mainmenutopic 	= mysqli_fetch_array($mainmenutopic_QR);
												?>
												ผลิตภัณฑ์หรือบริการ : <? echo $mainmenutopic[mainmenu_name]; echo " "; ?>
												<?
											}
											if ($Q==1) {
												?>
												ผลิตภัณฑ์หรือบริการ 
												<?
											}
											?>
											<?
											if ($web_product_row=='0') { echo "( ไม่มีผลิตภัณฑ์หรือบริการนี้ )"; }
											else{ 
												?>
												<span class="badge"> <? echo "$web_product_row"; ?></span> 
												<?
											} 
											?>

										</div>
										<div class="col-md-6 text-right" style="margin: -5px;">
											<a class="btn btn-default" onclick="location.reload()">
												รีเฟรชหน้า
											</a>
											<a class="btn btn-default" onclick="goBack()">
												<span class="glyphicon glyphicon-backward"></span>
												กลับ
											</a>
										</div>
									</div>
								</div>
								<div class="panel-body">

									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th> # </th>
													<th> รูป  </th>
													<th> ผลิตภัณฑ์หรือบริการ </th>
													<th> เมนูหลัก </th>
													<th> รายละเอียด , แก้ไข , ลบ </th>
												</tr>
											</thead>
											<tbody class="row_position">
												<?
												$i = 1;
												while ($web_product 	= mysqli_fetch_array($web_product_QR)) {
													?>
													<tr id="<?php echo $web_product['web_product_id'] ?>">
														<td style="width: 30px;"><? echo $i; ?></td>
														<td style="width: 140px;">
															<?
															if (!empty($web_product['web_product_photo'])) {
																?>
																<a href="web_product_one.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" >
																	<img class="full"  src="../Files/web_product_photo/<?php echo $web_product[web_product_photo]; ?>"  />
																</a>
																<?
															} else {
																echo " ไม่มีข้อมูลนี้ ";
															}
															?>
														</td>
														<td>
															<? echo $web_product[web_product_name]; ?>
														</td>
														<td>
															<?
															if (isset($web_product[mainmenu_id])&&trim($web_product[mainmenu_id])!='0') {
																$mainmenu_SL = " SELECT * FROM mainmenu WHERE mainmenu_id = '$web_product[mainmenu_id]'";
																$mainmenu_QR = mysqli_query($con,$mainmenu_SL);
																$mainmenu 	= mysqli_fetch_array($mainmenu_QR);
																?>
																<? echo $mainmenu[mainmenu_name]; ?>
																<?
															}
															?>
														</td>
														<td style="width: 300px;">
															<a target="_blank" href="web_product_one.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" class="btn btn-sm btn-primary">
																<span class="glyphicon glyphicon-zoom-in"></span>
																รายละเอียด  
															</a>
															<a target="_blank" href="web_product_update.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" class="btn btn-sm btn-info">
																<span class="glyphicon glyphicon-edit"></span>
																แก้ไข
															</a>
															<a target="_blank" href="web_product_del.php?web_product_id=<?php echo $web_product[web_product_id]; ?>" onclick="return confirm('  ยืนยันการลบผลิตภัณฑ์หรือบริการ  ? ')"  class="btn btn-sm btn-danger">
																<span class="glyphicon glyphicon-trash"></span> ลบ
															</a>
														</td>

													</tr>
													<?
													$i++;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<?
						}
						?>
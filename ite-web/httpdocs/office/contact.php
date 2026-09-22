<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'contact.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'contact'";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

$Row = "SELECT * FROM contactus";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 20;   // Per Page
$Page = $_GET["Page"];
if(!$_GET["Page"]){
	$Page=1;
}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page){
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0){
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
$i=$Page_Start+1;

$contactus_SL = " SELECT * FROM contactus ORDER BY contactus_id DESC LIMIT $Page_Start , $Per_Page ";
$contactus_RS 	= mysqli_query($con,$contactus_SL);
$contactus_Row 	= mysqli_num_rows($contactus_RS);

if ($_POST['Updatefixed_graphicmap']) {
	if($_FILES['fixed_graphicmap']['name']!=''){
		@unlink("../Files/fixed_graphicmap/".$fixed['fixed_graphicmap']);
		$fixed_graphicmap = rand().$_FILES["fixed_graphicmap"]["name"];
		$upload = move_uploaded_file($_FILES["fixed_graphicmap"]["tmp_name"],"../Files/fixed_graphicmap/".$fixed_graphicmap);
		$fixed_graphicmap_Update = "UPDATE `fixed` SET `fixed_graphicmap` = '$fixed_graphicmap'";
		$fixed_graphicmap_Reult = mysqli_query($con,$fixed_graphicmap_Update);
	}
	if ($fixed_graphicmap_Reult) {
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='contact.php?UPDATE';</script>";
	}
	else {
		echo"<script>alert('fixed_Reult'); window.history.back(); </script>";
	}
}

if ($_POST['Updatefixed_googlemaps']) {
	$fixed_googlemaps = $_POST['fixed_googlemaps'];
	$fixed_Up = "UPDATE fixed SET fixed_googlemaps = '$fixed_googlemaps' ";
	$fixed_Reult = mysqli_query($con,$fixed_Up);
	if ($fixed_Reult) {
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='contact.php?UPDATE';</script>";
	}
	else {
		echo"<script>alert('fixed_Reult'); window.history.back(); </script>";
	}
}

if ($_GET[fixed_graphicmap]=='Delete') {
	@unlink("../Files/fixed_graphicmap/".$fixed['fixed_graphicmap']);
	$fixed_graphicmap_Update = "UPDATE `fixed` SET `fixed_graphicmap` = ''";
	$fixed_graphicmap_Reult = mysqli_query($con,$fixed_graphicmap_Update);
	echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='contact.php?update';</script>";
}


if ($_POST['pagecontent_photo_update']) {
	if($_FILES['pagecontent_photo']['name']!=''){
		
		$suffix = strrchr($_FILES["pagecontent_photo"]["name"],".");
		suffix($suffix);

		@unlink("../Files/pagecontent_photo/".$pagecontent['pagecontent_photo']);

		$Jpg = strrchr($_FILES["pagecontent_photo"]["name"],".");
		$pagecontent_photo = rand().rand().$Jpg;
		
		$upload = move_uploaded_file($_FILES["pagecontent_photo"]["tmp_name"],"../Files/pagecontent_photo/".$pagecontent_photo);
		$pagecontent_photo_Update = "UPDATE `pagecontent` SET `pagecontent_photo` = '$pagecontent_photo' WHERE `pagecontent_id` = '$pagecontent[pagecontent_id]'";
		$pagecontent_photo_Reult = mysqli_query($con,$pagecontent_photo_Update);
		if (!$pagecontent_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($pagecontent_photo_Reult) {
			echo"<script>   window.location='contact.php?UPDATE'; </script>";
		}
	}
}

if ($_GET[pagecontent_photo_update]=='delete') {
	@unlink("../Files/pagecontent_photo/".$pagecontent['pagecontent_photo']);
	$pagecontent_photo_Update = "UPDATE `pagecontent` SET `pagecontent_photo` = ''  WHERE `pagecontent_id` = '$pagecontent[pagecontent_id]' ";
	$pagecontent_photo_Reult = mysqli_query($con,$pagecontent_photo_Update);
	echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='contact.php?update';</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navbar.php'; ?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="main-left">
				<div class="row">
					<div class="col-md-12">
						<? include 'index_AdminMenu.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3> จัดการ  ติดต่อเรา  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="contact_update.php" class="btn btn-info ">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไข 
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียด ติดต่อเรา
							</div>
							<div class="panel-body">
								<? echo $pagecontent[pagecontent_review]; ?>
							</div>
							<div class="panel-footer">
								แก้ไขล่าสุด : <? echo $pagecontent[pagecontent_update]; ?>
							</div>
						</div>
					</div>
					<!-- 12 -->
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รูป cover  : <span class="text-primary"> <? echo $pagecontent[pagecontent_topic]; ?> </span>
								<button type="button" class="btn  btn-info " data-toggle="modal" data-target="#pagecontent_photo_update"> 
									<span class="glyphicon glyphicon-picture"></span>
									แก้ไขรูป cover
								</button>
								<div id="pagecontent_photo_update" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<form class="form" enctype="multipart/form-data" method="post">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> แก้ไขรูป cover  <span class="text-primary"> <? echo $pagecontent[pagecontent_topic]; ?> </span> </h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label for="recipient-name" class="control-label">เลือกรูปภาพ <span class="text-muted normal">เป็นรูปภาพที่จะนำมาแทนรูปเดิม</span></label>
														<input type="file" required class="form-control" multiple="multiple" name="pagecontent_photo">
													</div>
												</div>
												<div class="modal-footer">

													<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-success">
														<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
													</button>
													<input type="hidden" name="pagecontent_photo_update" value="x">
													<a href="contact.php?pagecontent_photo_update=delete" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
														<span class="glyphicon glyphicon-trash"></span>
														ลบรูป  
													</a>
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<?
								if (isset($pagecontent[pagecontent_photo])&&trim($pagecontent[pagecontent_photo])!='') {
									?>
									<img class="img-responsive" style="cursor: zoom-in;" id="myImgmain<?php echo $pagecontent[pagecontent_id]; ?>" src="../Files/pagecontent_photo/<?php echo $pagecontent[pagecontent_photo]; ?>"  />
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
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										Google Maps 
									</div>
									<div class="col-md-6 text-right">
										<button type="button" style="margin: -6px 5px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Updatefixed_googlemaps">
											<span class="glyphicon glyphicon-edit"></span>
											แก้ไข Google Maps 
										</button> 
									</div>
								</div>
							</div>
							<div class="panel-body GoogleMaps">
								<? echo $fixed[fixed_googlemaps]; ?>
								<div id="Updatefixed_googlemaps" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> แก้ไข   Google Maps   </h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label class="control-label " >  Google Maps  </label>
														<textarea class="form-control" rows="5" id="comment" name="fixed_googlemaps" placeholder=" Embed a map "><? echo $fixed[fixed_googlemaps]; ?></textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-info btn-sm">
														<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
													</button>
													<input Type="hidden" name="Updatefixed_googlemaps" value="x">
													<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										Graphic Map   
									</div>
									<div class="col-md-6 text-right">
										<a class="btn btn-danger btn-sm" style="margin: -6px 5px;" href="contact.php?fixed_graphicmap=Delete">  ลบ  Graphic Map</a>
										<button type="button" style="margin: -6px 5px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Updatefixed_graphicmap">
											<span class="glyphicon glyphicon-edit"></span>
											แก้ไข Graphic Map
										</button> 
									</div>
								</div>
							</div>
							<div class="panel-body">
								<?
								if (isset($fixed[fixed_graphicmap])&&trim($fixed[fixed_graphicmap])!='') {
									?>
									<img class="full" src="../Files/fixed_graphicmap/<?php echo $fixed[fixed_graphicmap]; ?>" />
									<?
								}
								else{
									echo "-";
								}
								?>
								<div id="Updatefixed_graphicmap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel"> แก้ไข Graphic Map   </h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label class="control-label " >  Graphic Map    </label>
														<input type="file" class="form-control br2" name="fixed_graphicmap"  placeholder="" >
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-info btn-sm">
														<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
													</button>
													<input Type="hidden" name="Updatefixed_graphicmap" value="x">
													<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								การติดต่อเข้ามา ทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
							</div>
							<div class="panel-body">
								<?
								if ($contactus_Row>0) {
									?>
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th> #</th>
													<th> ชื่อ </th>
													<th> อีเมล </th>
													<th> เบอร์โทรศัพท์ </th>
													<th> วันเดือนปี </th>
													<th> รายละเอียด , ลบ </th>
												</tr>
											</thead>
											<tbody>
												<?
												while ($contactus 	= mysqli_fetch_array($contactus_RS)) {
													?>
													<tr>
														<td>
															<p><?php echo $i; ?></p>
														</td>
														<td>
															<p><?php echo $contactus[contactus_name]; ?></p>
														</td>
														<td>
															<p><?php echo $contactus[contactus_email]; ?></p>
														</td>
														<td>
															<p><?php echo $contactus[contactus_phone]; ?></p>
														</td>
														<td>
															<p><?php echo displaydate($contactus[contactus_date]); ?></p>
														</td>
														<td>
															<a href="contactus_one.php?contactus_id=<?php echo $contactus[contactus_id]; ?>" class="btn btn-primary btn-sm">
																<span class="glyphicon glyphicon-zoom-in"></span>
																รายละเอียด  
															</a>
															<a href="contactus_del.php?contactus_id=<?php echo $contactus[contactus_id]; ?>" class="btn btn-danger btn-sm" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')">
																<span class="glyphicon glyphicon-trash"></span>
																ลบ 
															</a>
														</td>
													</tr>
													<?php
													$i++;
												}
												?>
											</tbody>
										</table>
									</div>
									<?
								}
								else{
									echo "<h4> ยังไม่มีการติดต่อเข้ามา </h4>";
								}
								?>
							</div>
						</div>
					</div>
					<!-- 12 -->
				</div>
				<!-- row -->
			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>
</html>



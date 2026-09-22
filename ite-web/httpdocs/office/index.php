<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'index.php';

$fixed_SL = " SELECT * FROM fixed";
$fixed_QR = mysqli_query($con,$fixed_SL);
$fixed 	= mysqli_fetch_array($fixed_QR);

if ($_GET[fixed_navlogo]=='Delete') {
	@unlink("../Files/fixed_navlogo/".$fixed['fixed_navlogo']);
	$fixed_navlogo_Update = "UPDATE `fixed` SET `fixed_navlogo` = ''";
	$fixed_navlogo_Reult = mysqli_query($con,$fixed_navlogo_Update);
	echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='index.php?update';</script>";
}

if ($_POST['Updatefixed']) {
	$fixed_company = function_teeth($_POST['fixed_company']);
	$fixed_eng_company = function_teeth($_POST['fixed_eng_company']);
	$fixed_topic = function_teeth($_POST['fixed_topic']);
	$fixed_eng_topic = function_teeth($_POST['fixed_eng_topic']);
	$fixed_inbox = function_teeth($_POST['fixed_inbox']);
	$fixed_navbar = function_teeth($_POST['fixed_navbar']);
	$fixed_pluginpage = function_link($_POST['fixed_pluginpage']);
	
	$fixed_Up = "UPDATE fixed SET 
	fixed_pluginpage = '$fixed_pluginpage',
	fixed_navbar = '$fixed_navbar',
	fixed_company = '$fixed_company',
	fixed_eng_company = '$fixed_eng_company',
	fixed_topic = '$fixed_topic',
	fixed_eng_topic = '$fixed_eng_topic',
	fixed_inbox = '$fixed_inbox' 
	";

	$fixed_Reult = mysqli_query($con,$fixed_Up);
	if ($fixed_Reult) {
		if($_FILES['fixed_titlelogo']['name']!=''){

			$suffix = strrchr($_FILES["fixed_titlelogo"]["name"],".");
			suffix($suffix);

			@unlink("../Files/fixed_titlelogo/".$fixed['fixed_titlelogo']);
			$fixed_titlelogo = rand()." - ".$_FILES["fixed_titlelogo"]["name"];
			$upload = move_uploaded_file($_FILES["fixed_titlelogo"]["tmp_name"],"../Files/fixed_titlelogo/".$fixed_titlelogo);
			$fixed_titlelogo_Update = "UPDATE `fixed` SET `fixed_titlelogo` = '$fixed_titlelogo'";
			$fixedPhoto_Reult = mysqli_query($con,$fixed_titlelogo_Update);
		}
		if($_FILES['fixed_navlogo']['name']!=''){

			$suffix = strrchr($_FILES["fixed_navlogo"]["name"],".");
			suffix($suffix);

			@unlink("../Files/fixed_navlogo/".$fixed['fixed_navlogo']);
			$fixed_navlogo = rand()." - ".$_FILES["fixed_navlogo"]["name"];
			$upload = move_uploaded_file($_FILES["fixed_navlogo"]["tmp_name"],"../Files/fixed_navlogo/".$fixed_navlogo);
			$fixed_navlogo_Update = "UPDATE `fixed` SET `fixed_navlogo` = '$fixed_navlogo'";
			$fixedPhoto_Reult = mysqli_query($con,$fixed_navlogo_Update);
		}
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='index.php?update';</script>";
	}
	else {
		echo"<script>alert('fixed_Reult'); window.history.back(); </script>";
	}
}
if ($_POST['Updatestatus']) {
	$fixed_status_id = $_POST['fixed_status_id'];
	$fixed_Up = "UPDATE fixed SET fixed_status_id = '$fixed_status_id' ";
	$fixed_Reult = mysqli_query($con,$fixed_Up);
	if ($fixed_Reult) {
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='index.php?update';</script>";
	}
	else {
		echo"<script>alert('fixed_Reult'); window.history.back(); </script>";
	}
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
						<h3>  จัดการ ข้อมูลเว็บไซต์เบื้องต้น  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Updatefixed">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไขข้อมูล
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#Updatestatus">
							<span class="glyphicon glyphicon-edit"></span>
							สถานะเว็บไซต์ (เปิด/ปิด)
						</button>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียด "ข้อมูลเว็บไซต์เบื้องต้น"
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" >
									<div class="form-group">
										<label class="control-label col-sm-3" for="email"> บริษัท,ร้าน,แบรนด์ </label>
										<div class="col-sm-6 control-label text-left">
											<? 
											if (isset($fixed[fixed_company])&&trim($fixed[fixed_company])!='') {
												echo $fixed[fixed_company];
											}
											else{
												echo " - ";
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email"> คำแนะนำเว็บไซต์  </label>
										<div class="col-sm-6 control-label text-left">
											<? 
											if (isset($fixed[fixed_topic])&&trim($fixed[fixed_topic])!='') {
												echo $fixed[fixed_topic];
											}
											else{
												echo " - ";
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > หัวข้อตรงเมนูบาร์  </label>
										<div class="col-sm-4 control-label text-left" >
											<? 
											if (isset($fixed[fixed_navbar])&&trim($fixed[fixed_navbar]!='')) {
												echo $fixed[fixed_navbar];
											}
											else{
												echo "-";
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email"> อีเมลรับการแจ้งเตือน </label> 
										<div class="col-sm-6 control-label text-left" >
											<? 
											if (isset($fixed[fixed_inbox])&&trim($fixed[fixed_inbox])!='') {
												echo $fixed[fixed_inbox];
											}
											else{
												echo " - ";
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > โลโก้ส่วนบนของเว็บไซต์   </label>
										<div class="col-md-6">
											<img style="max-height: 35px;" src="../Files/fixed_titlelogo/<?php echo $fixed[fixed_titlelogo]; ?>" />
											(แสดงบนแทบ เบราว์เซอร์ เช่น chrome)
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > โลโก้เมนู (แสดงด้านบนสุดของเว็บไซต์)  </label>
										<div class="col-md-4">
											<?
											if (isset($fixed[fixed_navlogo])&&trim($fixed[fixed_navlogo])!='') {
												?>
												<img style="max-height: 35px;" src="../Files/fixed_navlogo/<?php echo $fixed[fixed_navlogo]; ?>" />
												<a href="index.php?fixed_navlogo=Delete">  ลบโลโก้เมนูออก คลิก </a>
												<?
											}
											else{
												echo "-";
											}
											?>

										</div>
										
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" for="email">ลิ้งเพจเฟสบุ๊ค (ใช้สำหรับปลั๊กอิน)</label> 
										<div class="col-sm-6 control-label text-left" >
											<?
											if (isset($fixed[fixed_pluginpage])&&trim($fixed[fixed_pluginpage])!='') {
												?>
												<p class="hide1" title="http://<? echo $fixed[fixed_pluginpage]; ?>">
													http://<? echo $fixed[fixed_pluginpage]; ?>
												</p>
												<?
											}
											else{
												echo "-";
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email"></label> 
										<div class="col-sm-6 control-label text-left" >
											<?
											if (isset($fixed[fixed_pluginpage])&&trim($fixed[fixed_pluginpage])!='') {
												?>
												<p>
													<div id="fb-root"></div>
													<script>(function(d, s, id) {
														var js, fjs = d.getElementsByTagName(s)[0];
														if (d.getElementById(id)) return;
														js = d.createElement(s); js.id = id;
														js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=140464089416756&autoLogAppEvents=1';
														fjs.parentNode.insertBefore(js, fjs);
													}(document, 'script', 'facebook-jssdk'));</script>
													<div class="fb-page" height="0" data-href="https://<? echo $fixed[fixed_pluginpage]; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://<? echo $fixed[fixed_pluginpage]; ?>" class="fb-xfbml-parse-ignore"><a href="https://<? echo $fixed[fixed_pluginpage]; ?>"></a></blockquote></div>
												</p>
												<?
											}
											else{
												echo "-";
											}
											?>

										</div>
									</div>
								</form>
							</div>
							<div class="panel-footer">
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

	<div id="Updatestatus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel"> แก้ไข "สถานะเว็บไซต์ (เปิด/ปิด)" </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label" for="email"> สถานะเว็บไซต์ (เปิด/ปิด) </label>
							<select class="form-control"  name="fixed_status_id">
								<?
								$fixed_status_SL = " SELECT * FROM fixed_status WHERE fixed_status_id = '$fixed[fixed_status_id]'";
								$fixed_status_QR = mysqli_query($con,$fixed_status_SL);
								$fixed_status 	= mysqli_fetch_array($fixed_status_QR);
								if (!isset($fixed_status[fixed_status_id])||$fixed_status[fixed_status_id]=='') {
									?>
									<option value="">สถานะเว็บไซต์ (เปิด/ปิด)</option>
									<?
								}
								else{
									?>
									<option value="<?php echo $fixed_status[fixed_status_id]; ?>"><? echo $fixed_status[fixed_status_name]; ?></option>
									<?
								}
								$fixed_status_SL = " SELECT * FROM fixed_status WHERE fixed_status_id != '$fixed[fixed_status_id]' AND fixed_status_id != '3' ORDER BY fixed_status_id ASC";
								$fixed_status_QR 	= mysqli_query($con,$fixed_status_SL);
								while ($fixed_status 	= mysqli_fetch_array($fixed_status_QR)) {
									?>
									<option value="<?php echo $fixed_status[fixed_status_id]; ?>"><?php echo $fixed_status[fixed_status_name]; ?></option>
									<?
								}
								?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input Type="hidden" name="Updatestatus" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="Updatefixed" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel"> แก้ไข "ข้อมูลเว็บไซต์เบื้องต้น" </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label" for="email"> บริษัท,ร้าน,แบรนด์ (Title ของเว็บไซต์ ) </label>
							<input   name="fixed_company" value="<? echo $fixed[fixed_company]; ?>" type="text" class="form-control" placeholder="" >
						</div>
						<div class="form-group">
							<label class="control-label" for="email"> คำแนะนำเว็บไซต์ (description) </label>
							<input   name="fixed_topic" value="<? echo $fixed[fixed_topic]; ?>" type="text" class="form-control" placeholder="เว็บไซต์ขายหรือมีบริการอะไรบ้าง" >
						</div>
						<div class="form-group">
							<label class="control-label" for="email"> หัวข้อตรงเมนูบาร์ (แสดงด้านบนสุดของเว็บไซต์)  </label>
							<input   name="fixed_navbar" value="<? echo $fixed[fixed_navbar]; ?>" type="text" class="form-control" placeholder="" >
						</div>
						<div class="form-group">
							<label class="control-label" for="email"> อีเมลรับการแจ้งเตือน (เช่น ฝากข้อความ)  </label>
							<input  name="fixed_inbox" value="<? echo $fixed[fixed_inbox]; ?>" type="email" class="form-control" placeholder="" >
						</div>
						<div class="form-group">
							<label class="control-label " > โลโก้ส่วนบนของเว็บไซต์ (แสดงบนแทบ เบราว์เซอร์ เช่น chrome)  </label>
							<input type="file" class="form-control br2" name="fixed_titlelogo"  placeholder="" >
						</div>
						<div class="form-group">
							<label class="control-label " > โลโก้เมนู (แสดงด้านบนสุดของเว็บไซต์)  </label>
							<input type="file" class="form-control br2" name="fixed_navlogo"  placeholder="" >
						</div>
						

						<div class="form-group">
							<label class="control-label" for="email">ลิ้งเพจเฟสบุ๊ค (ใช้สำหรับปลั๊กอิน)  </label>
							<input   name="fixed_pluginpage" value="<? echo $fixed[fixed_pluginpage]; ?>" type="text" class="form-control" placeholder="" >
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<input Type="hidden" name="Updatefixed" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



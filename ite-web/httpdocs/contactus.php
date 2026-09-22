<?

include 'index_Include.php'; 
include 'index_function.php';

$_SESSION['page'] = 'contactus.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'contact'";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

if ($_POST['contact_us_add']) {
	$contactus_code = input_all($_POST['contactus_code']);
	if ($contactus_code == $_SESSION[contactus_code] ) {

		$contactus_address = input_all($_POST['contactus_address']);
		$contactus_name = input_all($_POST['contactus_name']);
		$contactus_email = input_all($_POST['contactus_email']);
		$contactus_phone = input_all($_POST['contactus_phone']);
		$contactus_message = input_all($_POST['contactus_message']);

		$ContactUs_Add = "INSERT INTO `contactus` (`contactus_date`,`contactus_time`,`contactus_phone`,`contactus_name`,`contactus_address`,`contactus_email`,`contactus_message`) "; 
		$ContactUs_Add .=" VALUES (NOW(),NOW(),'$contactus_phone','$contactus_name','$contactus_address','$contactus_email','$contactus_message')";
		$ContactUs_Reult = mysqli_query($con,$ContactUs_Add);

		if (!$ContactUs_Reult) {
			echo"<script>alert('Error'); window.history.back(); </script>";
		}
		if ($ContactUs_Reult) {

			$To = !empty($fixed['fixed_inbox']) ? $fixed['fixed_inbox'] : 'intertech@ite-tech.com';
			$company_name = !empty($fixed['fixed_company']) ? $fixed['fixed_company'] : 'Inter Tech Engineering';
			$Subject = "=?UTF-8?B?" . base64_encode("ติดต่อสอบถาม / ขอใบเสนอราคา - " . $company_name) . "?=";
			$Header = "MIME-Version: 1.0\r\n";
			$Header .= "Content-type: text/html; charset=utf-8\r\n";
			$from_email = !empty($fixed['fixed_sent']) ? $fixed['fixed_sent'] : 'intertech@ite-tech.com';
			$Header .= "From: " . $company_name . " <" . $from_email . ">\r\n";
			if (!empty($contactus_email)) {
				$Header .= "Reply-To: " . $contactus_email . "\r\n";
			}

			$Message = "<div style='font-family: Arial, sans-serif; font-size: 15px; color: #333;'>";
			$Message .= "<h3 style='color: #000B5E; border-bottom: 2px solid #000B5E; padding-bottom: 8px;'>มีการติดต่อสอบถาม / ขอใบเสนอราคาเข้ามาใหม่</h3>";
			$Message .= "<p><b>ชื่อผู้ติดต่อ:</b> " . htmlspecialchars($contactus_name) . "</p>";
			$Message .= "<p><b>อีเมล:</b> <a href='mailto:" . htmlspecialchars($contactus_email) . "'>" . htmlspecialchars($contactus_email) . "</a></p>";
			$Message .= "<p><b>เบอร์โทรศัพท์:</b> " . htmlspecialchars($contactus_phone) . "</p>";
			$Message .= "<p><b>ข้อความ / รายละเอียด:</b><br><div style='background: #f8f9fa; padding: 12px; border-radius: 6px; border: 1px solid #e2e8f0;'>" . nl2br(htmlspecialchars($contactus_message)) . "</div></p>";
			$Message .= "<p style='color: #888; font-size: 13px; margin-top: 20px;'>ส่งจากแบบฟอร์มหน้าเว็บไซต์: " . (!empty($fixed['fixed_website']) ? $fixed['fixed_website'] : 'ite-tech.com') . " เมื่อ " . date('d/m/Y H:i') . "</p>";
			$Message .= "</div>";

			$flgSend = @mail($To, $Subject, $Message, $Header); 

			echo "<script> alert('ส่งข้อความเรียบร้อยแล้ว เจ้าหน้าที่จะติดต่อกลับโดยเร็ว'); window.location='contactus.php'; </script>";
		}
	}
	else{
		echo " <script> alert(' กรอกตัวเลขไม่ถูกต้อง ');  window.history.back(); </script>";
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title> ติดต่อเรา  | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?>">
	<meta name="keywords" content="<? echo $fixed[fixed_topic]; ?>">
	<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div>
		<?
		if (isset($pagecontent[pagecontent_photo]) && trim($pagecontent[pagecontent_photo])!='') {
			?>
			<div class="mainmenu_cover">
				<img class="full tinted2"  id="<?php echo $pagecontent[pagecontent_photo]; ?>" src="Files/pagecontent_photo/<?php echo $pagecontent[pagecontent_photo]; ?>"  />
				<div class="centered" >
					<? echo $pagecontent[pagecontent_topic] ?>
				</div>
			</div>
			<?
		}
		else{
			?>
			<div class="mainmenu_cover bg1">
				<div class="centered" >
					<? echo $pagecontent[pagecontent_topic] ?>
				</div>
			</div>
			<?
		}
		?>
		<div class="container betwixt30">	
			<div class="row">
				<div class="col-md-12">
					<div class="row" style="margin-top: 15px;">
						<div class="col-md-6">
							<?
							$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'contact'";
							$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
							$pagecontent 	= mysqli_fetch_array($pagecontent_QR);
							if (isset($pagecontent[pagecontent_review])&&trim($pagecontent[pagecontent_review])!='') {
								?>
								<div class="panel panel-default no-radius review">
									<div class="panel-body">
										<?  echo $pagecontent[pagecontent_review]; ?>
									</div>
								</div>
								<?
							}
							?>
						</div>
						<div class="col-md-6">
							<div class="row ">
								<div class="col-md-12">
									<div class="panel panel-default no-radius">
										<div class="panel-body">
											<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label" >  ชื่อ - นามสกุล  <span class="text-red"> * </span>  </label>
															<input required name="contactus_name" type="text"  class="form-control" placeholder="Firts Name / Last Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label" >  อีเมล  <span class="text-red"> * </span> </label>
															<input required name="contactus_email" type="email"  class="form-control" placeholder="E-mail">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label" > เบอร์โทรศัพท์  <span class="text-red"> * </span> </label>
															<input required name="contactus_phone" type="text"   class="form-control" placeholder="Phone Number">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label" > ข้อความ </label>
															<textarea id="contactus_message" class="form-control" rows="4" name="contactus_message"  maxlength="500" placeholder="Message"></textarea>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label" >  ใส่ตัวเลข <? $_SESSION[contactus_code] = rand(100,300);  echo $_SESSION[contactus_code]; ?>  </label>
															<input required  name="contactus_code" type="number"   class="form-control" placeholder=" (เพื่อป้องกัน Spam บนเว็บ)" >
														</div>
													</div>
												</div>
												<button type="submit" class="btn btn-main btn-block "> 
													<span class="glyphicon glyphicon-envelope"></span>
													ส่งข้อความ
												</button>
												<input type="hidden" name="contact_us_add" value="x">
											</form>
										</div>
									</div>
								</div>
							</div> 
						</div>
					</div>
					<div class="row margintop15">
						<div class="col-md-12">
							<?
							if (isset($fixed[fixed_googlemaps])&&trim($fixed[fixed_googlemaps])!='') {
								?>
								<div class="row">
									<div class="col-md-12">
										<div class="panel panel-default no-radius">
											<div class="panel-body">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#GoogleMaps">Google Maps  </a></li>
													<?
													if (isset($fixed[fixed_graphicmap])&&trim($fixed[fixed_graphicmap])!='') {
														?>
														<li><a data-toggle="tab" href="#GraphicMap">Graphic Map  </a></li>
														<?
													}
													?>
												</ul>
												<div class="tab-content">
													<div id="GoogleMaps" class="tab-pane fade in active GoogleMaps">
														<? echo $fixed[fixed_googlemaps]; ?>
													</div>
													<div id="GraphicMap" class="tab-pane fade">
														<img class="full" src="Files/fixed_graphicmap/<?php echo $fixed[fixed_graphicmap]; ?>" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?
							}
							?>
							
						</div>
					</div>
					<div class="row hidden-sm hidden-xs paddingtop30 uppercase" >
						<div class="col-md-12">
							<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
								<li><a href="index.php">หน้าแรก</a></li>
								<li>
									<a onclick="goBack();" href="#">กลับ</a>
								</li> 
								<li>ติดต่อเรา</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- container -->
	<? include 'index_footer.php'; ?>
</body>
</html>
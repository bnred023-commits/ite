<?

include 'index_Include.php'; 
$_SESSION['page'] = 'howtoorder.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'howtoorder'";
$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
$pagecontent 	= mysqli_fetch_array($pagecontent_QR);

?>

<!DOCTYPE html>
<html>
<head>
	<title> <? echo $pagecontent[pagecontent_topic];?>  | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="<? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?>">
	<meta name="keywords" content="<? echo $fixed[fixed_topic]; ?>">
	<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
	<? include 'index_head.php'; ?>
</head>
<body>
	<? include 'index_navbar.php'; ?>
	<div style="background-color: #f0f0f0;">
		<div class="container between20">
			<div class="row">
				<div class="col-md-12 text-center">
					<span class="pagetopic bold color1 border1-bottom">
						how to order
					</span>
					<p class="size20 bold">
						วิธีการสั่งซื้อ
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container betwixt20">	
		<div class="row">
			<div class="col-md-12">
				<? echo  $pagecontent[pagecontent_review];; ?>
			</div>
		</div>
		<div class="row hidden-sm hidden-xs margintop30 uppercase" >
			<div class="col-md-12">
				<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
					<li><a href="index.php">หน้าแรก</a></li>
					<li>
						<a onclick="goBack();" href="#">
							กลับ
						</a>
					</li>  
					<li> <? echo $pagecontent[pagecontent_topic]; ?>  </li>
				</ul>
			</div>
		</div>
	</div>
	<? include 'index_footer.php'; ?>
</body>
</html>
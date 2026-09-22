<?php
include 'index_Include.php'; 
$_SESSION['page'] = 'product.php';

$product_id = isset($_GET['product_id']) ? mysqli_real_escape_string($con, $_GET['product_id']) : 0;
$product_SL = "SELECT * FROM product WHERE product_id = '$product_id'";
$product_QR = mysqli_query($con, $product_SL);
$product = ($product_QR && mysqli_num_rows($product_QR) > 0) ? mysqli_fetch_array($product_QR) : null;

if (!$product) {
	header("Location: product.php");
	exit;
}

// Catalog Info
$catalog_name = "สินค้าสแตนเลส";
if (!empty($product['catalog_id'])) {
	$cat_SL = "SELECT * FROM catalog WHERE catalog_id = '{$product['catalog_id']}'";
	$cat_QR = mysqli_query($con, $cat_SL);
	if ($cat_QR && mysqli_num_rows($cat_QR) > 0) {
		$cat_data = mysqli_fetch_array($cat_QR);
		$catalog_name = $cat_data['catalog_name'];
	}
}

// Main Image
if (!empty($product['product_photo']) && file_exists("Files/product_photo/" . $product['product_photo'])) {
	$main_photo = "Files/product_photo/" . $product['product_photo'];
} elseif (!empty($product['product_photo']) && file_exists("v1-assets/images/" . $product['product_photo'])) {
	$main_photo = "v1-assets/images/" . $product['product_photo'];
} else {
	$main_photo = "v1-assets/images/company-2-480x272.jpg";
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<title><?php echo htmlspecialchars($product['product_name']); ?> | <?php echo !empty($fixed['fixed_website']) ? htmlspecialchars($fixed['fixed_website']) : 'Inter Tech Engineering'; ?></title>
	<meta name="description" content="<?php echo htmlspecialchars(strip_tags($product['product_name'])); ?> - <?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : ''; ?>">
	<meta name="keywords" content="<?php echo htmlspecialchars($product['product_name']); ?>, <?php echo htmlspecialchars($catalog_name); ?>">
	<meta name="author" content="<?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : ''; ?>">

	<?php include 'v1_head.php'; ?>
</head>
<body style="background-color: #f8f9fa;">
	<?php include 'v1_navbar.php'; ?>

	<!-- BREADCRUMB & HERO BANNER -->
	<section class="py-4" style="background-color: #000B5E; padding-top: 130px !important;">
		<div class="container-fluid px-3 px-md-5">
			<div class="row align-items-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-2">
							<li class="breadcrumb-item"><a href="index.php" class="text-white opacity-75 text-decoration-none">หน้าแรก</a></li>
							<li class="breadcrumb-item"><a href="product.php" class="text-white opacity-75 text-decoration-none">สินค้า</a></li>
							<li class="breadcrumb-item"><a href="product.php?catalog_id=<?php echo $product['catalog_id']; ?>" class="text-white opacity-75 text-decoration-none"><?php echo htmlspecialchars($catalog_name); ?></a></li>
							<li class="breadcrumb-item active text-white fw-bold" aria-current="page"><?php echo htmlspecialchars($product['product_name']); ?></li>
						</ol>
					</nav>
					<h1 class="fw-bold text-white mb-0 display-5" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem);">
						<?php echo htmlspecialchars($product['product_name']); ?>
					</h1>
				</div>
			</div>
		</div>
	</section>

	<!-- PRODUCT DETAIL SECTION -->
	<section class="py-5" style="background-color: #ffffff;">
		<div class="container-fluid px-3 px-md-5">
			<div class="row g-4 g-lg-5 align-items-start">
				<!-- LEFT: PRODUCT IMAGE & GALLERY -->
				<div class="col-12 col-lg-6">
					<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3 p-2 bg-white" style="border: 1px solid #e9ecef !important;">
						<div class="position-relative overflow-hidden rounded-4 text-center d-flex align-items-center justify-content-center" style="min-height: 350px; max-height: 500px; background-color: #f8f9fa;">
							<img src="<?php echo $main_photo; ?>" id="mainProductPhoto" class="w-100 h-100 img-fluid rounded-4 shadow-sm" alt="<?php echo htmlspecialchars($product['product_name']); ?>" style="object-fit: contain; max-height: 480px;">
						</div>
					</div>

					<!-- GALLERY THUMBNAILS -->
					<?php
					$gallery_SL = "SELECT * FROM gallery WHERE gallery_code = 'product_id{$product['product_id']}' ORDER BY gallery_sort IS NULL ASC, gallery_sort ASC";
					$gallery_QR = mysqli_query($con, $gallery_SL);
					if ($gallery_QR && mysqli_num_rows($gallery_QR) > 0):
					?>
						<div class="d-flex flex-wrap gap-2 mt-3">
							<!-- Main Photo Thumbnail -->
							<div class="rounded-3 overflow-hidden border p-1 bg-white cursor-pointer shadow-sm gallery-thumb active" style="width: 80px; height: 80px;" onclick="changeMainImage('<?php echo $main_photo; ?>', this)">
								<img src="<?php echo $main_photo; ?>" class="w-100 h-100" style="object-fit: cover; border-radius: 6px;" />
							</div>
							<?php while ($gal = mysqli_fetch_array($gallery_QR)): ?>
								<?php if (!empty($gal['gallery_photo']) && file_exists("Files/gallery_photo/" . $gal['gallery_photo'])): ?>
									<?php $gal_src = "Files/gallery_photo/" . $gal['gallery_photo']; ?>
									<div class="rounded-3 overflow-hidden border p-1 bg-white cursor-pointer shadow-sm gallery-thumb" style="width: 80px; height: 80px;" onclick="changeMainImage('<?php echo $gal_src; ?>', this)">
										<img src="<?php echo $gal_src; ?>" class="w-100 h-100" style="object-fit: cover; border-radius: 6px;" />
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>

				<!-- RIGHT: PRODUCT DETAILS & SPECIFICATIONS -->
				<div class="col-12 col-lg-6">
					<div class="ps-lg-3">
						<span class="badge rounded-pill px-3 py-2 mb-3" style="background-color: rgba(0, 11, 94, 0.1); color: #000B5E; font-size: 0.9rem; font-weight: 600;">
							<?php echo htmlspecialchars($catalog_name); ?>
						</span>
						
						<h2 class="fw-bold mb-3" style="color: #000B5E; line-height: 1.3;">
							<?php echo htmlspecialchars($product['product_name']); ?>
						</h2>

						<?php if (!empty($product['product_code'])): ?>
							<p class="text-muted mb-4 pb-3 border-bottom fs-6">
								<strong class="text-dark">รหัสสินค้า:</strong> <?php echo htmlspecialchars($product['product_code']); ?>
							</p>
						<?php endif; ?>

						<!-- PRODUCT DESCRIPTION BOX -->
						<div class="mb-4">
							<h5 class="fw-bold mb-3" style="color: #000B5E;">รายละเอียดและคุณลักษณะ</h5>
							<div class="p-4 rounded-4 bg-light text-secondary lh-lg fs-6" style="border: 1px dashed #ced4da;">
								<?php 
								if (!empty($product['product_detail'])) {
									echo nl2br($product['product_detail']); 
								} else {
									echo '<p class="mb-0 text-muted">ติดต่อฝ่ายขายสอบถามข้อมูลรายละเอียดและคุณลักษณะเพิ่มเติมของผลิตภัณฑ์</p>';
								}
								?>
							</div>
						</div>

						<!-- CONTACT / ORDER CALL TO ACTION BOX -->
						<div class="card border-0 rounded-4 p-4 text-white shadow-sm mb-4" style="background: linear-gradient(135deg, #000B5E 0%, #001f80 100%);">
							<h5 class="fw-bold mb-2 text-white">สนใจสั่งซื้อ หรือสอบถามข้อมูลเพิ่มเติม</h5>
							<p class="mb-3 text-white-50 small">ทีมงานวิศวกรผู้เชี่ยวชาญพร้อมให้คำปรึกษา ออกแบบ และเสนอราคาพิเศษแก่ท่าน</p>
							<div class="d-flex flex-wrap gap-2">
								<?php if (!empty($fixed['fixed_tel'])): ?>
									<a href="tel:<?php echo htmlspecialchars($fixed['fixed_tel']); ?>" class="btn btn-light rounded-pill px-4 py-2 fw-semibold" style="color: #000B5E;">
										<i class="mobi-mbri mobi-mbri-phone mbr-iconfont me-1"></i> โทร: <?php echo htmlspecialchars($fixed['fixed_tel']); ?>
									</a>
								<?php endif; ?>
								<a href="contactus.php" class="btn btn-outline-light rounded-pill px-4 py-2 fw-semibold">
									ติดต่อฝ่ายขาย
								</a>
							</div>
						</div>

						<!-- SOCIAL SHARE & QR CODE SECTION -->
						<div class="pt-2">
							<p class="small text-muted mb-2 font-weight-bold">แชร์สินค้านี้:</p>
							<div class="d-flex gap-2">
								<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
								<a href="http://www.facebook.com/share.php?u=<?php echo urlencode($actual_link); ?>" target="_blank" class="btn btn-sm text-white rounded-pill px-3" style="background-color: #1877f2;">
									Facebook
								</a>
								<a href="http://lineit.line.me/share/ui?url=<?php echo urlencode($actual_link); ?>" target="_blank" class="btn btn-sm text-white rounded-pill px-3" style="background-color: #06c755;">
									LINE
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- RELATED PRODUCTS SECTION -->
			<?php
			$related_SL = "SELECT * FROM product WHERE catalog_id = '{$product['catalog_id']}' AND product_id != '{$product['product_id']}' ORDER BY RAND() LIMIT 4";
			$related_QR = mysqli_query($con, $related_SL);
			if ($related_QR && mysqli_num_rows($related_QR) > 0):
			?>
				<div class="row mt-5 pt-4 border-top">
					<div class="col-12 mb-4">
						<h3 class="fw-bold" style="color: #000B5E;">สินค้าที่เกี่ยวข้อง</h3>
					</div>
					<?php while ($rel = mysqli_fetch_array($related_QR)): ?>
						<?php
						$rel_photo = (!empty($rel['product_photo']) && file_exists("Files/product_photo/" . $rel['product_photo']))
							? "Files/product_photo/" . $rel['product_photo']
							: "v1-assets/images/company-2-480x272.jpg";
						?>
						<div class="col-12 col-sm-6 col-md-3 d-flex mb-3">
							<div class="card w-100 border-0 shadow-sm rounded-4 overflow-hidden h-100 d-flex flex-column" style="background: #ffffff;">
								<div class="position-relative overflow-hidden" style="height: 180px; background-color: #f1f3f5;">
									<a href="product_detail.php?product_id=<?php echo $rel['product_id']; ?>">
										<img src="<?php echo $rel_photo; ?>" class="w-100 h-100 img-fluid" alt="<?php echo htmlspecialchars($rel['product_name']); ?>" style="object-fit: cover;">
									</a>
								</div>
								<div class="card-body p-3 d-flex flex-column justify-content-between flex-fill">
									<h6 class="fw-bold mb-2" style="color: #000B5E;">
										<a href="product_detail.php?product_id=<?php echo $rel['product_id']; ?>" class="text-decoration-none" style="color: inherit;">
											<?php echo htmlspecialchars($rel['product_name']); ?>
										</a>
									</h6>
									<a href="product_detail.php?product_id=<?php echo $rel['product_id']; ?>" class="btn w-100 btn-sm rounded-pill mt-2 text-white" style="background-color: #000B5E;">
										ดูรายละเอียด
									</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<script>
		function changeMainImage(src, element) {
			document.getElementById('mainProductPhoto').src = src;
			document.querySelectorAll('.gallery-thumb').forEach(el => el.classList.remove('active'));
			if (element) {
				element.classList.add('active');
			}
		}
	</script>

	<?php include 'v1_footer.php'; ?>
</body>
</html>
<?php
include 'index_Include.php'; 
$_SESSION['page'] = 'product.php';

// Multi-image slides mapping for each product
$product_image_slides = [
	1 => [
		'v1-assets/images/profile2-1-433x577.png',
		'v1-assets/images/profile1-433x577.png',
		'v1-assets/images/389512987s-114073607-0-removebg-preview-433x577.png',
		'v1-assets/images/1252234851s-115220490-removebg-preview-433x577.png',
		'v1-assets/images/275272448-433x577.png'
	],
	2 => [
		'v1-assets/images/pipe1-432x577.png',
		'v1-assets/images/line-album-15769-260715-9-815x1086.jpeg',
		'v1-assets/images/line-album-15769-260715-2-815x1086.jpeg'
	],
	3 => [
		'v1-assets/images/fab-433x577.png',
		'v1-assets/images/cabinet1-433x325.jpg',
		'v1-assets/images/cabinet2-433x325.jpg',
		'v1-assets/images/cabinet3-433x325.jpg',
		'v1-assets/images/cabinet4-433x325.jpg',
		'v1-assets/images/cabinet5-433x325.jpg'
	],
	4 => [
		'v1-assets/images/host-433x577.png',
		'v1-assets/images/picture1-643x480.jpg',
		'v1-assets/images/picture2-630x380.jpg'
	],
	5 => [
		'v1-assets/images/table-1-709x500.png',
		'v1-assets/images/picture3-630x380.jpg',
		'v1-assets/images/picture4-630x380.jpg'
	],
	6 => [
		'v1-assets/images/wagon-465x536.png',
		'v1-assets/images/picture6-660x380.jpg',
		'v1-assets/images/picture7-660x380.jpg'
	],
	7 => [
		'v1-assets/images/sheltf-removebg-preview-709x541.png',
		'v1-assets/images/picture8-660x380.jpg',
		'v1-assets/images/picture10-630x380.jpg'
	],
	8 => [
		'v1-assets/images/2115826668-640x480.jpeg',
		'v1-assets/images/ffu2-643x480.jpg',
		'v1-assets/images/picture11-630x380.jpg'
	],
	9 => [
		'v1-assets/images/984982170s-134635526-0-removebg-preview-433x577.png',
		'v1-assets/images/canteen01-853x480.jpg',
		'v1-assets/images/canteen03-853x480.jpg',
		'v1-assets/images/canteen04-853x480.jpg'
	],
	10 => [
		'v1-assets/images/663723861s-136904706-0-removebg-preview-433x577.png',
		'v1-assets/images/picture12-630x380.jpg',
		'v1-assets/images/picture14-630x380.jpg'
	],
	11 => [
		'v1-assets/images/1457858386s-132120580-0-removebg-preview-433x577.png',
		'v1-assets/images/punching-721x480.jpg',
		'v1-assets/images/waterjet-721x480.jpg'
	],
	12 => [
		'v1-assets/images/1388968721-433x577.png',
		'v1-assets/images/picture15-630x380.jpg',
		'v1-assets/images/picture16-630x380.jpg'
	],
	13 => [
		'v1-assets/images/conveyor1-596x447.jpg',
		'v1-assets/images/conveyor-720x480.jpg',
		'v1-assets/images/510263385-660x380.jpg'
	],
	14 => [
		'v1-assets/images/other-4-596x447.jpg',
		'v1-assets/images/all-700x308.jpg',
		'v1-assets/images/jeng1-700x308.jpg'
	],
	15 => [
		'v1-assets/images/405014605-580x773.jpg',
		'v1-assets/images/1009233977194566330-651x400.jpg',
		'v1-assets/images/2037496523901379757-665x400.jpg'
	],
	16 => [
		'v1-assets/images/1388968721-433x577.png',
		'v1-assets/images/1517653588586561164-600x398.jpg',
		'v1-assets/images/2134551032-600x480.jpg'
	]
];

$fallback_products = [
	['product_id' => 1, 'product_name' => 'Profile', 'product_photo' => 'profile2-1-433x577.png'],
	['product_id' => 2, 'product_name' => 'Pipe', 'product_photo' => 'pipe1-432x577.png'],
	['product_id' => 3, 'product_name' => 'Cabinet', 'product_photo' => 'fab-433x577.png'],
	['product_id' => 4, 'product_name' => 'Hotpital', 'product_photo' => 'host-433x577.png'],
	['product_id' => 5, 'product_name' => 'Table', 'product_photo' => 'table-1-709x500.png'],
	['product_id' => 6, 'product_name' => 'Wagon', 'product_photo' => 'wagon-465x536.png'],
	['product_id' => 7, 'product_name' => 'Basket', 'product_photo' => 'sheltf-removebg-preview-709x541.png'],
	['product_id' => 8, 'product_name' => 'Laminar & FFU', 'product_photo' => '2115826668-640x480.jpeg'],
	['product_id' => 9, 'product_name' => 'Canteen', 'product_photo' => '984982170s-134635526-0-removebg-preview-433x577.png'],
	['product_id' => 10, 'product_name' => 'Box & Dust Bin', 'product_photo' => '663723861s-136904706-0-removebg-preview-433x577.png'],
	['product_id' => 11, 'product_name' => 'Tooling', 'product_photo' => '1457858386s-132120580-0-removebg-preview-433x577.png'],
	['product_id' => 12, 'product_name' => 'M2M', 'product_photo' => '1388968721-433x577.png'],
	['product_id' => 13, 'product_name' => 'Conveyor', 'product_photo' => 'conveyor1-596x447.jpg'],
	['product_id' => 14, 'product_name' => 'Other Product', 'product_photo' => 'other-4-596x447.jpg'],
	['product_id' => 15, 'product_name' => 'Plastic ESD', 'product_photo' => '405014605-580x773.jpg'],
	['product_id' => 16, 'product_name' => 'M2M', 'product_photo' => '1388968721-433x577.png']
];

$Q = 1;
$Row = "SELECT * FROM product WHERE ";

if (isset($_GET['catalog_id']) && $_GET['catalog_id'] != '') {
	$catalog_id = mysqli_real_escape_string($con, $_GET['catalog_id']);
	if ($Q == 1) {
		$Row .= " (catalog_id = '$catalog_id')";
		$Q++;
	} else {
		$Row .= " AND (catalog_id = '$catalog_id') ";
		$Q++;
	}
}

if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
	$keyword = mysqli_real_escape_string($con, $_GET['keyword']);
	if ($Q == 1) {
		$Row .= " (product_search LIKE '%$keyword%' or product_code LIKE '%$keyword%' or product_name LIKE '%$keyword%') ";
		$Q++;
	} else {
		$Row .= " AND (product_search LIKE '%$keyword%' or product_code LIKE '%$keyword%' or product_name LIKE '%$keyword%') ";
		$Q++;
	}
}

if ($Q == 1) {
	$Row = "SELECT * FROM product ";
}

$RowQuery = mysqli_query($con, $Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 16;   // 16 products per page (4 rows of 4 matching page3.html)
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
if ($page < 1) { $page = 1; }
$Prev_page = $page - 1;
$Next_page = $page + 1;
$page_Start = (($Per_page * $page) - $Per_page);

if ($Num_Rows <= $Per_page) {
	$Num_pages = 1;
} else if (($Num_Rows % $Per_page) == 0) {
	$Num_pages = ($Num_Rows / $Per_page);
} else {
	$Num_pages = (int)($Num_Rows / $Per_page) + 1;
}

$product_SL = $Row . " ORDER BY product_sort ASC, product_id ASC LIMIT $page_Start , $Per_page ";
$product_QR = mysqli_query($con, $product_SL);

// Build Products List for Rendering
$products_list = [];
if ($Num_Rows > 0) {
	while ($r = mysqli_fetch_array($product_QR)) {
		$products_list[] = $r;
	}
} elseif (empty($_GET['keyword']) && empty($_GET['catalog_id'])) {
	$products_list = $fallback_products;
}

// Current catalog info
$current_catalog_name = "สินค้าทั้งหมด";
if (isset($_GET['catalog_id']) && $_GET['catalog_id'] != '') {
	$cat_info_SL = "SELECT * FROM catalog WHERE catalog_id = '" . mysqli_real_escape_string($con, $_GET['catalog_id']) . "'";
	$cat_info_QR = mysqli_query($con, $cat_info_SL);
	if ($cat_info_QR && mysqli_num_rows($cat_info_QR) > 0) {
		$cat_info = mysqli_fetch_array($cat_info_QR);
		$current_catalog_name = $cat_info['catalog_name'];
	}
}

// Reusable Card Rendering Function (With In-Card Image Slider, NO code, NO description)
function renderProductCardHTML($p) {
	global $con, $product_image_slides;

	$id = isset($p['product_id']) ? (int)$p['product_id'] : 1;
	$name = htmlspecialchars($p['product_name']);

	// Determine Slides for this card (Supports CMS Uploads + Product Picture Gallery + Fallback Slides)
	$slides = [];

	// 1. Check main photo from database (CMS upload)
	if (!empty($p['product_photo'])) {
		if (file_exists("Files/product_photo/" . $p['product_photo'])) {
			$slides[] = "Files/product_photo/" . $p['product_photo'];
		} elseif (file_exists("v1-assets/images/" . $p['product_photo'])) {
			$slides[] = "v1-assets/images/" . $p['product_photo'];
		}
	}

	// 2. Check sub-photos from database table product_picture (uploaded via CMS office/product_one.php)
	if (!empty($con) && $id > 0) {
		$pic_SL = "SELECT product_picture_photo FROM product_picture WHERE product_id = '$id' ORDER BY product_picture_order ASC, product_picture_id ASC";
		$pic_QR = mysqli_query($con, $pic_SL);
		if ($pic_QR && mysqli_num_rows($pic_QR) > 0) {
			while ($pic_row = mysqli_fetch_array($pic_QR)) {
				$pic_file = $pic_row['product_picture_photo'];
				if (file_exists("Files/product_picture_photo/" . $pic_file)) {
					$slides[] = "Files/product_picture_photo/" . $pic_file;
				} elseif (file_exists("v1-assets/images/" . $pic_file)) {
					$slides[] = "v1-assets/images/" . $pic_file;
				}
			}
		}
	}

	// 3. Fallback / supplementary slides from preset catalogue
	if (isset($product_image_slides[$id]) && is_array($product_image_slides[$id])) {
		if (empty($slides)) {
			$slides = $product_image_slides[$id];
		} else {
			// If only main image exists, append preset slides to ensure rich multi-slide display
			if (count($slides) == 1) {
				foreach ($product_image_slides[$id] as $preset_img) {
					if (!in_array($preset_img, $slides)) {
						$slides[] = $preset_img;
					}
				}
			}
		}
	}

	// 4. Default fallback if still empty
	if (empty($slides)) {
		$slides = ['v1-assets/images/profile2-1-433x577.png'];
	}

	// Category/Material Tag Detection
	$tag = 'Stainless Steel';
	if (stripos($name, 'hospital') !== false || stripos($name, 'hotpital') !== false) {
		$tag = 'Hospital';
	} elseif (stripos($name, 'cleanroom') !== false || stripos($name, 'ffu') !== false || stripos($name, 'laminar') !== false) {
		$tag = 'Cleanroom';
	} elseif (stripos($name, 'm2m') !== false || stripos($name, 'automation') !== false) {
		$tag = 'Automation';
	} elseif (stripos($name, 'plastic') !== false || stripos($name, 'esd') !== false) {
		$tag = 'Plastic ESD';
	} elseif (stripos($name, 'tooling') !== false) {
		$tag = 'Tooling';
	} elseif (stripos($name, 'conveyor') !== false) {
		$tag = 'Conveyor';
	} elseif (stripos($name, 'table') !== false || stripos($name, 'wagon') !== false) {
		$tag = 'Workstation';
	}
	?>
	<div class="col-12 col-sm-6 col-lg-3 mb-4">
		<div class="product-premium-card h-100">
			<!-- TOP IMAGE STAGE WITH SLIDER CONTROLS -->
			<div class="product-card-img-holder" id="cardSlider_<?php echo $id; ?>" data-current-index="0" data-total-slides="<?php echo count($slides); ?>">
				<span class="product-card-badge"><?php echo $tag; ?></span>

				<!-- PREV ARROW -->
				<?php if (count($slides) > 1): ?>
					<button type="button" class="card-slide-nav card-slide-prev" onclick="event.preventDefault(); event.stopPropagation(); changeCardSlide(<?php echo $id; ?>, -1);" aria-label="Previous image" title="ดูรูปก่อนหน้า">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
					</button>
				<?php endif; ?>

				<!-- NEXT ARROW -->
				<?php if (count($slides) > 1): ?>
					<button type="button" class="card-slide-nav card-slide-next" onclick="event.preventDefault(); event.stopPropagation(); changeCardSlide(<?php echo $id; ?>, 1);" aria-label="Next image" title="ดูรูปถัดไป">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
					</button>
				<?php endif; ?>

				<!-- SLIDES -->
				<a href="product_detail.php?product_id=<?php echo $id; ?>" class="product-img-link" title="<?php echo $name; ?>">
					<div class="card-slides-track">
						<?php foreach ($slides as $idx => $s_img): ?>
							<img src="<?php echo $s_img; ?>" 
								 alt="<?php echo $name; ?>" 
								 class="card-slide-img <?php echo ($idx === 0) ? 'active' : ''; ?>" 
								 data-slide-index="<?php echo $idx; ?>" 
								 loading="lazy">
						<?php endforeach; ?>
					</div>
				</a>

				<!-- MINI SLIDER DOTS -->
				<?php if (count($slides) > 1): ?>
					<div class="card-slide-dots">
						<?php foreach ($slides as $idx => $s_img): ?>
							<span class="card-slide-dot <?php echo ($idx === 0) ? 'active' : ''; ?>" data-slide-index="<?php echo $idx; ?>" onclick="event.preventDefault(); event.stopPropagation(); goToCardSlide(<?php echo $id; ?>, <?php echo $idx; ?>);"></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- CARD BODY: ONLY TITLE & ACTION BUTTON (REMOVED ITE-003 & DESCRIPTION TEXT) -->
			<div class="product-card-body">
				<h5 class="product-card-title mb-4">
					<a href="product_detail.php?product_id=<?php echo $id; ?>" title="<?php echo $name; ?>">
						<?php echo $name; ?>
					</a>
				</h5>
				<div class="product-card-footer mt-auto">
					<a href="product_detail.php?product_id=<?php echo $id; ?>" class="product-card-btn">
						<span>ดูเพิ่มเติม</span>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<title><?php echo htmlspecialchars($current_catalog_name); ?> | <?php echo !empty($fixed['fixed_website']) ? htmlspecialchars($fixed['fixed_website']) : 'Inter Tech Engineering'; ?></title>
	<meta name="description" content="<?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : ''; ?> <?php echo !empty($fixed['fixed_topic']) ? htmlspecialchars($fixed['fixed_topic']) : ''; ?>">
	<meta name="keywords" content="<?php echo htmlspecialchars($current_catalog_name); ?>, สินค้าสแตนเลส, โลหะแผ่น, Tooling">
	<meta name="author" content="<?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : ''; ?>">

	<?php include 'v1_head.php'; ?>

	<style>
	/* ==========================================================================
	   PREMIUM PRODUCT CARD & IN-CARD SLIDER STYLING
	   ========================================================================== */
	.product-premium-card {
		background: #ffffff !important;
		border: 1px solid rgba(0, 11, 94, 0.08) !important;
		border-radius: 20px !important;
		overflow: hidden !important;
		height: 100% !important;
		display: flex !important;
		flex-direction: column !important;
		box-shadow: 0 10px 25px -4px rgba(0, 11, 94, 0.06), 0 4px 10px -2px rgba(0, 0, 0, 0.03) !important;
		transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
		position: relative !important;
	}

	.product-premium-card:hover {
		transform: translateY(-8px) !important;
		border-color: rgba(0, 11, 94, 0.3) !important;
		box-shadow: 0 22px 42px -6px rgba(0, 11, 94, 0.16), 0 10px 18px -4px rgba(0, 0, 0, 0.06) !important;
	}

	/* Image Holder: FULL BLEED (NO FRAME, NO PADDING) */
	.product-card-img-holder {
		position: relative !important;
		height: 250px !important;
		background: #f8fafc !important;
		display: block !important;
		padding: 0 !important;
		margin: 0 !important;
		overflow: hidden !important;
		border-top-left-radius: 20px !important;
		border-top-right-radius: 20px !important;
	}

	.product-img-link {
		width: 100% !important;
		height: 100% !important;
		display: block !important;
		position: relative !important;
		overflow: hidden !important;
		text-decoration: none !important;
	}

	/* Card Slides Image Transition */
	.card-slides-track {
		position: relative !important;
		width: 100% !important;
		height: 100% !important;
		overflow: hidden !important;
	}

	.card-slide-img {
		position: absolute !important;
		top: 0 !important;
		left: 0 !important;
		width: 100% !important;
		height: 100% !important;
		object-fit: cover !important;
		object-position: center !important;
		border-radius: 0 !important;
		opacity: 0 !important;
		visibility: hidden !important;
		transition: opacity 0.35s ease, transform 0.4s ease !important;
		pointer-events: none !important;
	}

	.card-slide-img.active {
		opacity: 1 !important;
		visibility: visible !important;
		pointer-events: auto !important;
	}

	.product-premium-card:hover .card-slide-img.active {
		transform: scale(1.06) !important;
	}

	/* Slide Navigation Arrows on the Card Image */
	.card-slide-nav {
		position: absolute !important;
		top: 50% !important;
		transform: translateY(-50%) !important;
		width: 36px !important;
		height: 36px !important;
		border-radius: 50% !important;
		background: rgba(255, 255, 255, 0.92) !important;
		backdrop-filter: blur(8px) !important;
		border: 1px solid rgba(0, 0, 0, 0.08) !important;
		box-shadow: 0 4px 14px rgba(0, 0, 0, 0.18) !important;
		color: #000B5E !important;
		display: flex !important;
		align-items: center !important;
		justify-content: center !important;
		cursor: pointer !important;
		z-index: 6 !important;
		transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
		opacity: 0.9 !important;
	}

	.card-slide-nav:hover {
		background: #000B5E !important;
		color: #ffffff !important;
		border-color: #000B5E !important;
		transform: translateY(-50%) scale(1.12) !important;
		box-shadow: 0 6px 18px rgba(0, 11, 94, 0.3) !important;
		opacity: 1 !important;
	}

	.card-slide-prev {
		left: 10px !important;
	}

	.card-slide-next {
		right: 10px !important;
	}

	/* Card Slide Dots: Frosted Glass Capsule */
	.card-slide-dots {
		position: absolute !important;
		bottom: 12px !important;
		left: 50% !important;
		transform: translateX(-50%) !important;
		display: flex !important;
		gap: 6px !important;
		z-index: 6 !important;
		background: rgba(0, 0, 0, 0.45) !important;
		backdrop-filter: blur(8px) !important;
		padding: 4px 10px !important;
		border-radius: 20px !important;
		border: 1px solid rgba(255, 255, 255, 0.2) !important;
	}

	.card-slide-dot {
		width: 7px !important;
		height: 7px !important;
		border-radius: 50% !important;
		background: rgba(255, 255, 255, 0.5) !important;
		cursor: pointer !important;
		transition: all 0.25s ease !important;
	}

	.card-slide-dot.active {
		width: 18px !important;
		border-radius: 10px !important;
		background: #ffffff !important;
	}

	/* Category Badge */
	.product-card-badge {
		position: absolute !important;
		top: 14px !important;
		right: 14px !important;
		background: rgba(255, 255, 255, 0.94) !important;
		backdrop-filter: blur(8px) !important;
		border: 1px solid rgba(0, 11, 94, 0.12) !important;
		color: #000B5E !important;
		font-size: 0.72rem !important;
		font-weight: 700 !important;
		padding: 4px 12px !important;
		border-radius: 50px !important;
		box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06) !important;
		z-index: 2 !important;
		letter-spacing: 0.5px !important;
		text-transform: uppercase !important;
		pointer-events: none !important;
	}

	/* Card Body Content (Clean & Compact) */
	.product-card-body {
		padding: 24px 20px 22px !important;
		display: flex !important;
		flex-direction: column !important;
		flex-grow: 1 !important;
		text-align: center !important;
		background: #ffffff !important;
	}

	.product-card-title {
		font-size: 1.35rem !important;
		font-weight: 700 !important;
		line-height: 1.3 !important;
		margin-bottom: 22px !important;
	}

	.product-card-title a {
		color: #000B5E !important;
		text-decoration: none !important;
		transition: color 0.2s ease !important;
	}

	.product-card-title a:hover,
	.product-premium-card:hover .product-card-title a {
		color: #2563eb !important;
	}

	/* Action Button */
	.product-card-btn {
		width: 100% !important;
		background: linear-gradient(135deg, #000B5E 0%, #001f80 100%) !important;
		color: #ffffff !important;
		border: none !important;
		border-radius: 50px !important;
		padding: 12px 24px !important;
		font-size: 0.95rem !important;
		font-weight: 600 !important;
		display: inline-flex !important;
		align-items: center !important;
		justify-content: center !important;
		gap: 8px !important;
		transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
		box-shadow: 0 4px 14px rgba(0, 11, 94, 0.2) !important;
		text-decoration: none !important;
	}

	.product-card-btn:hover {
		background: linear-gradient(135deg, #2563eb 0%, #000B5E 100%) !important;
		box-shadow: 0 6px 20px rgba(37, 99, 235, 0.35) !important;
		transform: translateY(-2px) !important;
		color: #ffffff !important;
	}

	.product-card-btn svg {
		transition: transform 0.25s ease !important;
	}

	/* ==========================================================================
	   MODERN 2-COLUMN HERO BANNER (BALANCED COMPOSITION, NO OVERFLOW)
	   ========================================================================== */
	html {
		scroll-behavior: smooth;
	}

	section#productHero,
	#productHero,
	.product-hero-section {
		position: relative !important;
		background: linear-gradient(135deg, #000B5E 0%, #081a54 60%, #00083a 100%) !important;
		padding-top: 165px !important;
		padding-bottom: 75px !important;
		color: #ffffff !important;
		overflow: hidden !important;
	}

	.product-hero-section::before {
		content: '' !important;
		position: absolute !important;
		top: -40% !important;
		right: -15% !important;
		width: 550px !important;
		height: 550px !important;
		background: radial-gradient(circle, rgba(37, 99, 235, 0.28) 0%, rgba(0, 0, 0, 0) 70%) !important;
		pointer-events: none !important;
	}

	.hero-title {
		font-size: clamp(1.8rem, 3vw, 2.6rem) !important;
		font-weight: 800 !important;
		line-height: 1.25 !important;
		color: #ffffff !important;
		letter-spacing: -0.5px !important;
	}

	.hero-title-highlight {
		background: linear-gradient(90deg, #60a5fa 0%, #93c5fd 100%) !important;
		-webkit-background-clip: text !important;
		-webkit-text-fill-color: transparent !important;
	}

	.hero-description {
		font-size: clamp(0.92rem, 1.1vw, 1.02rem) !important;
		line-height: 1.65 !important;
		color: #cbd5e1 !important;
		max-width: 620px !important;
	}

	.hero-feature-tags .hero-tag {
		display: inline-flex !important;
		align-items: center !important;
		gap: 6px !important;
		background: rgba(255, 255, 255, 0.08) !important;
		border: 1px solid rgba(255, 255, 255, 0.15) !important;
		color: #e2e8f0 !important;
		font-size: 0.82rem !important;
		padding: 6px 12px !important;
		border-radius: 8px !important;
	}

	.hero-feature-tags .hero-tag svg {
		color: #38bdf8 !important;
	}

	.hero-cta-btn {
		background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%) !important;
		color: #ffffff !important;
		padding: 12px 24px !important;
		border-radius: 50px !important;
		font-size: 0.95rem !important;
		font-weight: 600 !important;
		display: inline-flex !important;
		align-items: center !important;
		gap: 8px !important;
		text-decoration: none !important;
		box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35) !important;
		transition: all 0.3s ease !important;
	}

	.hero-cta-btn:hover {
		background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%) !important;
		transform: translateY(-2px) !important;
		color: #ffffff !important;
		box-shadow: 0 12px 24px rgba(37, 99, 235, 0.45) !important;
	}

	.hero-outline-btn {
		background: rgba(255, 255, 255, 0.06) !important;
		color: #ffffff !important;
		border: 1.5px solid rgba(255, 255, 255, 0.3) !important;
		padding: 12px 22px !important;
		border-radius: 50px !important;
		font-size: 0.95rem !important;
		font-weight: 600 !important;
		display: inline-flex !important;
		align-items: center !important;
		gap: 8px !important;
		text-decoration: none !important;
		transition: all 0.3s ease !important;
	}

	.hero-outline-btn:hover {
		background: rgba(255, 255, 255, 0.16) !important;
		border-color: #ffffff !important;
		color: #ffffff !important;
		transform: translateY(-2px) !important;
	}

	/* Showcase Image Frame (Balanced Height for 50/50 Proportion) */
	.hero-showcase-wrapper {
		position: relative !important;
	}

	.hero-image-frame {
		position: relative !important;
		border-radius: 24px !important;
		overflow: hidden !important;
		border: 2px solid rgba(255, 255, 255, 0.18) !important;
		box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
		background: #000B5E !important;
		height: 330px !important;
	}

	.hero-showcase-img {
		width: 100% !important;
		height: 100% !important;
		object-fit: cover !important;
		object-position: center 60% !important;
		display: block !important;
		transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1) !important;
	}

	.hero-image-frame:hover .hero-showcase-img {
		transform: scale(1.04) !important;
	}

	.hero-image-overlay-glow {
		position: absolute !important;
		inset: 0 !important;
		background: linear-gradient(180deg, rgba(0, 11, 94, 0.05) 0%, rgba(0, 11, 94, 0.35) 100%) !important;
		pointer-events: none !important;
	}

	/* ==========================================================================
	   MODERN CATEGORY FILTER BAR (SWIPEABLE MOBILE CHIPS & DESKTOP WRAP)
	   ========================================================================== */
	.category-filter-container {
		position: relative !important;
		width: 100% !important;
	}

	.category-filter-scroll {
		display: flex !important;
		align-items: center !important;
		gap: 8px !important;
		width: 100% !important;
	}

	.category-chip {
		display: inline-flex !important;
		align-items: center !important;
		justify-content: center !important;
		padding: 9px 20px !important;
		border-radius: 50px !important;
		font-size: 0.92rem !important;
		font-weight: 500 !important;
		text-decoration: none !important;
		white-space: nowrap !important;
		flex-shrink: 0 !important;
		transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
		cursor: pointer !important;
		border: 1.5px solid #e2e8f0 !important;
		background: #ffffff !important;
		color: #475569 !important;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.04) !important;
	}

	.category-chip:hover {
		background: #f1f5f9 !important;
		color: #000B5E !important;
		border-color: #cbd5e1 !important;
		transform: translateY(-2px) !important;
		box-shadow: 0 4px 10px rgba(0, 11, 94, 0.1) !important;
	}

	.category-chip.active {
		background: #000B5E !important;
		border-color: #000B5E !important;
		color: #ffffff !important;
		font-weight: 600 !important;
		box-shadow: 0 4px 14px rgba(0, 11, 94, 0.28) !important;
		transform: translateY(-1px) !important;
	}

	.category-chip.active:hover {
		background: #001680 !important;
		border-color: #001680 !important;
		color: #ffffff !important;
	}

	/* Desktop View (>= 992px) */
	@media (min-width: 992px) {
		.category-filter-scroll {
			flex-wrap: wrap !important;
			justify-content: center !important;
			gap: 10px !important;
		}
	}

	/* Mobile & Tablet View (< 992px): Smooth Thumb-Swipeable Chips */
	@media (max-width: 991.98px) {
		section#productHero,
		#productHero,
		.product-hero-section {
			padding-top: 105px !important;
			padding-bottom: 40px !important;
		}
		.hero-image-frame {
			height: 230px !important;
		}
		.hero-title {
			font-size: 1.85rem !important;
		}
		.hero-description {
			font-size: 0.92rem !important;
			line-height: 1.55 !important;
		}

		.category-filter-container {
			position: relative !important;
			margin-left: -12px !important;
			margin-right: -12px !important;
			padding: 0 !important;
			overflow: hidden !important;
		}

		/* Subtle edge fade indicator for horizontal scroll */
		.category-filter-container::after {
			content: '' !important;
			position: absolute !important;
			top: 0 !important;
			right: 0 !important;
			bottom: 12px !important;
			width: 32px !important;
			background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.98)) !important;
			pointer-events: none !important;
			z-index: 3 !important;
		}

		.category-filter-scroll {
			flex-wrap: nowrap !important;
			overflow-x: auto !important;
			-webkit-overflow-scrolling: touch !important;
			scroll-behavior: smooth !important;
			scrollbar-width: none !important; /* Firefox */
			-ms-overflow-style: none !important;  /* IE/Edge */
			padding: 6px 14px 12px 14px !important;
			gap: 8px !important;
		}

		.category-filter-scroll::-webkit-scrollbar {
			display: none !important; /* Chrome/Safari */
		}

		.category-chip {
			padding: 8px 16px !important;
			font-size: 0.88rem !important;
		}

		.category-chip.active {
			box-shadow: 0 3px 10px rgba(0, 11, 94, 0.35) !important;
		}
	}
	</style>
</head>
<body style="background-color: #f8f9fa;">
	<?php include 'v1_navbar.php'; ?>

	<!-- MODERN HERO BANNER SECTION (2-COLUMN BALANCED COMPOSITION) -->
	<section class="product-hero-section" id="productHero">
		<div class="container-fluid px-3 px-md-5">
			<div class="row align-items-center g-4 g-lg-5">
				<!-- LEFT COLUMN: CONTENT & ACTION -->
				<div class="col-12 col-lg-6 col-xl-7">
					<h1 class="hero-title mb-3">
						Custom Stainless Steel<br>
						<span class="hero-title-highlight">Sheet Metal Forming</span>
					</h1>
					<p class="hero-description mb-4">
						ให้บริการผลิตชิ้นส่วนสแตนเลสขึ้นรูปตาม Drawing และข้อกำหนดของลูกค้า ด้วยกระบวนการตัด ดัด และขึ้นรูปโลหะแผ่นที่มีความแม่นยำสูง รองรับงานอุตสาหกรรมหลากหลายประเภท พร้อมควบคุมคุณภาพทุกขั้นตอนการผลิต
					</p>
					
					<!-- FEATURE PILLS -->
					<div class="hero-feature-tags d-flex flex-wrap gap-2 mb-4">
						<span class="hero-tag">
							<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
							ผลิตตาม Drawing & OEM
						</span>
						<span class="hero-tag">
							<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
							สแตนเลสเกรด Cleanroom & Food Grade
						</span>
						<span class="hero-tag">
							<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
							เครื่องจักรอุตสาหกรรมแม่นยำสูง
						</span>
					</div>

					<!-- ACTION BUTTONS -->
					<div class="d-flex flex-wrap gap-3">
						<a href="#productsCatalog" class="hero-cta-btn">
							<span>สำรวจแคตตาล็อกสินค้า</span>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
						</a>
						<a href="contactus.php" class="hero-outline-btn">
							<span>ติดต่อขอใบเสนอราคา</span>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
						</a>
					</div>
				</div>

				<!-- RIGHT COLUMN: SHOWCASE IMAGE (PERFECTLY FRAMED, NO OVERFLOW) -->
				<div class="col-12 col-lg-6 col-xl-5">
					<div class="hero-showcase-wrapper">
						<div class="hero-image-frame">
							<img src="v1-assets/images/line-album-15769-260715-14-1477x1108.jpg" 
								 alt="Custom Stainless Steel Sheet Metal Forming - Inter Tech Engineering" 
								 class="hero-showcase-img">
							<div class="hero-image-overlay-glow"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- MAIN PRODUCTS CATALOG SECTION -->
	<section class="py-5" id="productsCatalog" style="background-color: #ffffff;">
		<div class="container">
			<!-- CATEGORY FILTER & SEARCH SECTION -->
			<div class="row justify-content-center mb-4 mb-md-5">
				<div class="col-12 col-lg-10">
					<!-- SEARCH BAR -->
					<div class="mb-3 mb-md-4">
						<form action="product.php" method="GET" class="w-100 mx-auto" style="max-width: 540px;">
							<?php if (isset($_GET['catalog_id'])) echo '<input type="hidden" name="catalog_id" value="' . htmlspecialchars($_GET['catalog_id']) . '">'; ?>
							<div class="input-group shadow-sm" style="border-radius: 50px !important; border: 1.5px solid #000B5E !important; overflow: hidden !important; background: #ffffff !important;">
								<span class="input-group-text border-0 bg-transparent ps-3 pe-0" style="color: #000B5E;">
									<i class="mobi-mbri mobi-mbri-search mbr-iconfont" style="font-size: 1.1rem;"></i>
								</span>
								<input type="text" name="keyword" class="form-control border-0 shadow-none ps-2 pe-2" placeholder="ค้นหาสินค้า..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" style="font-size: 0.95rem; height: 46px; background: transparent; outline: none !important; box-shadow: none !important;">
								<?php if (isset($_GET['keyword']) && $_GET['keyword']!=''): ?>
									<a href="product.php<?php echo isset($_GET['catalog_id']) ? '?catalog_id='.htmlspecialchars($_GET['catalog_id']) : ''; ?>" class="d-flex align-items-center px-2 text-muted text-decoration-none" title="ล้างการค้นหา">
										<i class="mobi-mbri mobi-mbri-close mbr-iconfont" style="font-size: 1rem;"></i>
									</a>
								<?php endif; ?>
								<button class="btn text-white font-weight-bold" type="submit" style="background-color: #000B5E !important; border: none !important; border-radius: 0 50px 50px 0 !important; padding: 0 24px !important; height: 46px !important; font-size: 0.95rem !important; margin: 0 !important;">
									ค้นหา
								</button>
							</div>
						</form>
					</div>

					<!-- CATEGORY FILTER CHIPS (HORIZONTAL SCROLL ON MOBILE, WRAP ON DESKTOP) -->
					<div class="category-filter-container">
						<div class="category-filter-scroll" id="categoryFilterScroll">
							<?php
							$is_all_active = (!isset($_GET['catalog_id']) || $_GET['catalog_id'] == '');
							$all_link = "product.php" . ((isset($_GET['keyword']) && $_GET['keyword'] != '') ? '?keyword=' . urlencode($_GET['keyword']) : '');
							$all_count = number_format($Num_Rows > 0 ? $Num_Rows : count($products_list));
							?>
							<a href="<?php echo $all_link; ?>" class="category-chip <?php echo $is_all_active ? 'active' : ''; ?>">
								<span>ทั้งหมด (<?php echo $all_count; ?>)</span>
							</a>
							<?php
							$catalog_SL = "SELECT * FROM catalog ORDER BY catalog_sort ASC";
							$catalog_QR = mysqli_query($con, $catalog_SL);
							if ($catalog_QR && mysqli_num_rows($catalog_QR) > 0) {
								while ($cat = mysqli_fetch_array($catalog_QR)) {
									$is_active = (isset($_GET['catalog_id']) && $_GET['catalog_id'] == $cat['catalog_id']);
									$cat_link = "product.php?catalog_id=" . $cat['catalog_id'];
									if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
										$cat_link .= "&keyword=" . urlencode($_GET['keyword']);
									}
									echo '<a href="' . $cat_link . '" class="category-chip ' . ($is_active ? 'active' : '') . '">';
									echo '<span>' . htmlspecialchars($cat['catalog_name']) . '</span>';
									echo '</a>';
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>

			<!-- PRODUCT COUNT HEADER -->
			<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom">
				<div class="d-flex align-items-center gap-2 mb-2 mb-md-0">
					<span class="text-muted small">สินค้าทั้งหมด:</span>
					<span class="fw-bold px-3 py-1 rounded-pill" style="background-color: rgba(0, 11, 94, 0.08); color: #000B5E; font-size: 0.95rem;">
						<?php echo count($products_list); ?> รายการ
					</span>
					<?php if (isset($_GET['keyword']) && $_GET['keyword']!=''): ?>
						<span class="text-muted small ms-2">ผลการค้นหาสำหรับ "<?php echo htmlspecialchars($_GET['keyword']); ?>"</span>
					<?php endif; ?>
				</div>
			</div>

			<!-- EMPTY STATE -->
			<?php if (count($products_list) == 0): ?>
				<div class="col-12 text-center py-5">
					<div class="py-4">
						<i class="mobi-mbri mobi-mbri-search mbr-iconfont text-muted" style="font-size: 3rem;"></i>
						<h4 class="text-muted mt-3">ไม่พบรายการสินค้าที่ค้นหา</h4>
						<a href="product.php" class="btn btn-primary rounded-pill mt-3 px-4 py-2" style="background-color: #000B5E; border-color: #000B5E;">ดูสินค้าทั้งหมด</a>
					</div>
				</div>
			<?php else: ?>

				<!-- PRODUCTS GRID (4x4 RESPONSIVE GRID WITH IN-CARD SLIDERS) -->
				<div class="row">
					<?php foreach ($products_list as $product): ?>
						<?php renderProductCardHTML($product); ?>
					<?php endforeach; ?>
				</div>

			<?php endif; ?>

			<!-- PAGINATION -->
			<?php if ($Num_pages > 1 && count($products_list) > 0): ?>
				<div class="row mt-4">
					<div class="col-12 d-flex justify-content-center">
						<nav aria-label="Product navigation">
							<ul class="pagination pagination-md gap-1">
								<?php if ($page > 1): ?>
									<li class="page-item">
										<a class="page-item rounded-pill px-3 py-2 text-decoration-none border shadow-sm" href="product.php?page=<?php echo $Prev_page; ?><?php if(isset($_GET['catalog_id'])) echo '&catalog_id='.urlencode($_GET['catalog_id']); ?><?php if(isset($_GET['keyword'])) echo '&keyword='.urlencode($_GET['keyword']); ?>" style="color: #000B5E; background: #fff;">
											&laquo; ก่อนหน้า
										</a>
									</li>
								<?php endif; ?>

								<?php for ($p = 1; $p <= $Num_pages; $p++): ?>
									<li class="page-item">
										<a class="page-link rounded-circle d-flex align-items-center justify-content-center shadow-sm <?php echo ($p == $page) ? 'active' : ''; ?>" 
										   href="product.php?page=<?php echo $p; ?><?php if(isset($_GET['catalog_id'])) echo '&catalog_id='.urlencode($_GET['catalog_id']); ?><?php if(isset($_GET['keyword'])) echo '&keyword='.urlencode($_GET['keyword']); ?>"
										   style="<?php echo ($p == $page) ? 'background-color: #000B5E !important; border-color: #000B5E !important; color: #fff !important;' : 'color: #000B5E; background: #fff;'; ?> width: 40px; height: 40px;">
											<?php echo $p; ?>
										</a>
									</li>
								<?php endfor; ?>

								<?php if ($page < $Num_pages): ?>
									<li class="page-item">
										<a class="page-item rounded-pill px-3 py-2 text-decoration-none border shadow-sm" href="product.php?page=<?php echo $Next_page; ?><?php if(isset($_GET['catalog_id'])) echo '&catalog_id='.urlencode($_GET['catalog_id']); ?><?php if(isset($_GET['keyword'])) echo '&keyword='.urlencode($_GET['keyword']); ?>" style="color: #000B5E; background: #fff;">
											ถัดไป &raquo;
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</nav>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php include 'v1_footer.php'; ?>

	<script>
	// In-Card Image Slider Functionality
	function changeCardSlide(cardId, direction) {
		var container = document.getElementById('cardSlider_' + cardId);
		if (!container) return;

		var currentIdx = parseInt(container.getAttribute('data-current-index') || '0', 10);
		var total = parseInt(container.getAttribute('data-total-slides') || '1', 10);
		if (total <= 1) return;

		var newIdx = (currentIdx + direction + total) % total;
		goToCardSlide(cardId, newIdx);
	}

	function goToCardSlide(cardId, targetIdx) {
		var container = document.getElementById('cardSlider_' + cardId);
		if (!container) return;

		container.setAttribute('data-current-index', targetIdx);

		var imgs = container.querySelectorAll('.card-slide-img');
		imgs.forEach(function(img, idx) {
			if (idx === targetIdx) {
				img.classList.add('active');
			} else {
				img.classList.remove('active');
			}
		});

		var dots = container.querySelectorAll('.card-slide-dot');
		dots.forEach(function(dot, idx) {
			if (idx === targetIdx) {
				dot.classList.add('active');
			} else {
				dot.classList.remove('active');
			}
		});
	}

	// Auto-scroll active category chip into horizontal center view on mobile
	document.addEventListener('DOMContentLoaded', function() {
		var activeChip = document.querySelector('.category-chip.active');
		var scrollContainer = document.getElementById('categoryFilterScroll');
		if (activeChip && scrollContainer && window.innerWidth < 992) {
			setTimeout(function() {
				var containerWidth = scrollContainer.clientWidth;
				var chipLeft = activeChip.offsetLeft;
				var chipWidth = activeChip.clientWidth;
				scrollContainer.scrollTo({
					left: Math.max(0, chipLeft - (containerWidth / 2) + (chipWidth / 2)),
					behavior: 'smooth'
				});
			}, 100);
		}

		// Touch swipe support for card image sliders
		document.querySelectorAll('.product-card-img-holder').forEach(function(holder) {
			var startX = 0;
			var startY = 0;
			var idMatch = holder.id.match(/^cardSlider_(\d+)$/);
			if (!idMatch) return;
			var cardId = parseInt(idMatch[1], 10);

			holder.addEventListener('touchstart', function(e) {
				if (e.touches.length === 1) {
					startX = e.touches[0].clientX;
					startY = e.touches[0].clientY;
				}
			}, { passive: true });

			holder.addEventListener('touchend', function(e) {
				if (!startX) return;
				var diffX = e.changedTouches[0].clientX - startX;
				var diffY = e.changedTouches[0].clientY - startY;
				// Check horizontal swipe gesture (more horizontal than vertical, diff > 35px)
				if (Math.abs(diffX) > 35 && Math.abs(diffX) > Math.abs(diffY)) {
					if (diffX < 0) {
						changeCardSlide(cardId, 1);
					} else {
						changeCardSlide(cardId, -1);
					}
				}
				startX = 0;
				startY = 0;
			}, { passive: true });
		});
	});
	</script>
</body>
</html>
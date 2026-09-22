<?php
if (isset($con)) {
    $pagecontent_body_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'tag_body' ";
    $pagecontent_body_QR = mysqli_query($con, $pagecontent_body_SL);
    if ($pagecontent_body_QR && mysqli_num_rows($pagecontent_body_QR) > 0) {
        $pagecontent_body = mysqli_fetch_array($pagecontent_body_QR);
        if (!empty($pagecontent_body['pagecontent_review'])) {
            $body_review = html_entity_decode(htmlspecialchars_decode($pagecontent_body['pagecontent_review']));
            $body_review = str_replace("&#39;", "'", $body_review);
            echo $body_review;
        }
    }
}
$current_page = isset($_SESSION['page']) ? $_SESSION['page'] : 'index.php';
?>

<section data-bs-version="5.1" class="menu menu6 cid-vpp4kfszsa" once="menu" id="menu06-1r">
	<nav class="navbar navbar-dropdown opacityScrollOff navbar-expand-lg">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-logo">
					<a href="index.php">
						<?php if (!empty($fixed['fixed_navlogo'])): ?>
							<img src="Files/fixed_navlogo/<?php echo $fixed['fixed_navlogo']; ?>" alt="<?php echo !empty($fixed['fixed_navbar']) ? htmlspecialchars($fixed['fixed_navbar']) : 'ITE'; ?>">
						<?php else: ?>
							<img src="v1-assets/images/18700032920-20ite-96x67.png" alt="ITE Logo">
						<?php endif; ?>
					</a>
				</span>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<div class="collapse navbar-collapse opacityScrollOff" id="navbarSupportedContent">
				<ul class="navbar-nav nav-dropdown nav-right mx-auto" data-app-modern-menu="true">
					<li class="nav-item">
						<a class="nav-link link display-4" href="index.php">หน้าแรก</a>
					</li>
					<li class="nav-item">
						<a class="nav-link link display-4" href="aboutus.php">เกี่ยวกับเรา</a>
					</li>
					<li class="nav-item">
						<a class="nav-link link display-4" href="product.php">สินค้า</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link link dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">การออกแบบ</a>
						<div class="dropdown-menu">
							<a class="text-white dropdown-item display-4" href="web_product.php">Hospital Design</a>
							<a class="text-white dropdown-item display-4" href="web_product.php">Cleanroom Design</a>
							<a class="text-white dropdown-item display-4" href="web_product.php">Canteen Design</a>
							<a class="text-white dropdown-item display-4" href="web_product.php">Tooling Design</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link link dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">ประเภทวัสดุ</a>
						<div class="dropdown-menu">
							<a class="text-white dropdown-item display-4" href="product.php">Stainless Steel</a>
							<a class="text-white dropdown-item display-4" href="product.php">Aluminium</a>
							<a class="text-white dropdown-item display-4" href="product.php">Steel</a>
							<a class="text-white dropdown-item display-4" href="product.php">Plastic ESD</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link link display-4" href="contactus.php">ติดต่อเรา</a>
					</li>
				</ul>
				<div class="navbar-buttons mbr-section-btn d-none d-lg-block">
					<a class="navbar-contact-pill" href="mailto:intertech@ite-tech.com">
						intertech@ite-tech.com
					</a>
				</div>
			</div>
		</div>
	</nav>
</section>

<?php
include 'index_Include.php'; 
$_SESSION['page'] = 'index.php';

// Fetch DB contents
$slides_SL = " SELECT * FROM slides ORDER BY slides_sort ASC ";
$slides_QR = mysqli_query($con, $slides_SL);
$slides_Row = ($slides_QR) ? mysqli_num_rows($slides_QR) : 0;

$bg_photo = "v1-assets/images/hero-banner.jpg";
$slide_topic = "Inter Tech Engineering Co., Ltd.";
$slide_detail = "Stainless Steel Manufacturing Experts<br>Custom Stainless Steel Fabrication for Every Industry.";
$slide_link = "contactus.php";

if ($slides_Row > 0) {
    $slide = mysqli_fetch_array($slides_QR);
    if (!empty($slide['slides_photo']) && file_exists("Files/slides_photo/" . $slide['slides_photo'])) {
        $bg_photo = "v1-assets/images/hero-banner.jpg";
    }
    if (!empty($slide['slides_topic'])) {
        $slide_topic = htmlspecialchars($slide['slides_topic']);
    }
    if (!empty($slide['slides_detail'])) {
        $slide_detail = nl2br(htmlspecialchars($slide['slides_detail']));
    }
    if (!empty($slide['slides_link'])) {
        $slide_link = $slide['slides_link'];
        if (!preg_match("~^(?:f|ht)tps?://~i", $slide_link)) {
            $slide_link = "http://" . $slide_link;
        }
    }
}

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'home' ";
$pagecontent_QR = mysqli_query($con, $pagecontent_SL);
$pagecontent = ($pagecontent_QR && mysqli_num_rows($pagecontent_QR) > 0) ? mysqli_fetch_array($pagecontent_QR) : null;

$suggestion_SL = " SELECT * FROM suggestion ORDER BY suggestion_sort ASC ";
$suggestion_QR = mysqli_query($con, $suggestion_SL);
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <!-- Site made with Mobirise Website Builder v6.1.12, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v6.1.12, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="v1-assets/images/18700032920-20ite-96x67.png" type="image/x-icon">
  <meta name="description" content="<?php echo !empty($fixed['fixed_topic']) ? htmlspecialchars($fixed['fixed_topic']) : ''; ?>">
  
  <title><?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : 'Inter Tech Engineering'; ?> | <?php echo !empty($fixed['fixed_topic']) ? htmlspecialchars($fixed['fixed_topic']) : ''; ?></title>
  
  <?php include 'v1_head.php'; ?>
</head>
<body>
  
  <?php include 'v1_navbar.php'; ?>

  <!-- 1. HERO BANNER SECTION (Single Line Title Formatting) -->
  <section data-bs-version="5.1" class="header16 cid-vpp4Cig7Bn mbr-fullscreen mbr-parallax-background" id="header17-1t" style="background-image: url('<?php echo $bg_photo; ?>');">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrap col-12 col-md-12 text-center">
          <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-4 hero-title-single-line">
            <strong><?php echo $slide_topic; ?></strong>
          </h1>
          <p class="mbr-fonts-style mbr-text mbr-white mb-4 display-7">
            <?php echo $slide_detail; ?>
          </p>
          <div class="mbr-section-btn">
            <a class="btn btn-white-outline display-7" href="<?php echo htmlspecialchars($slide_link); ?>">ติดต่อเรา</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. ABOUT US SECTION -->
  <section data-bs-version="5.1" class="start article2 cid-vpp7H4ZsrS" id="article02-1v">
    <div class="container">
      <div class="row justify-content-center align-items-center g-4">
        <div class="col-12 col-lg-6 image-wrapper">
          <?php if (!empty($pagecontent['pagecontent_photo']) && file_exists("Files/pagecontent_photo/" . $pagecontent['pagecontent_photo'])): ?>
            <img class="w-100 rounded-4 shadow-sm" src="Files/pagecontent_photo/<?php echo $pagecontent['pagecontent_photo']; ?>" alt="Inter Tech Engineering">
          <?php else: ?>
            <img class="w-100 rounded-4 shadow-sm" src="v1-assets/images/line-album-15769-260715-5-1104x828.jpg" alt="Mobirise Website Builder">
          <?php endif; ?>
        </div>
        <div class="col-12 col-lg-6">
          <div class="text-wrapper align-left">
            <h4 class="mbr-section-title mbr-fonts-style mb-3 display-5"><strong><?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : 'บริษัท อินเตอร์เทค เอ็นจิเนียริ่ง จำกัด'; ?></strong></h4>
            <?php if (!empty($pagecontent['pagecontent_review'])): ?>
              <div class="mbr-text align-left mbr-fonts-style mb-0 display-7">
                <?php echo $pagecontent['pagecontent_review']; ?>
              </div>
            <?php else: ?>
              <p class="mbr-text align-left mbr-fonts-style mb-0 display-7">เราเป็นผู้เชี่ยวชาญด้านการผลิตและแปรรูปงานสแตนเลสสำหรับภาคอุตสาหกรรม ให้บริการที่ครอบคลุมงานตัด พับ ม้วน เชื่อม ขึ้นรูปโลหะแผ่น ออกแบบและผลิตทูลลิ่ง ตลอดจนผลิตชิ้นส่วนเครื่องจักร เครื่องมือ และอุปกรณ์ที่ใช้ในงานอุตสาหกรรม
              <br><br>ด้วยประสบการณ์กว่า 30 ปี พร้อมเครื่องจักรและเทคโนโลยีการผลิตที่ทันสมัย เราควบคุมคุณภาพในทุกขั้นตอนการผลิต เพื่อให้ผลิตภัณฑ์มีความเที่ยงตรง ได้มาตรฐาน และตอบโจทย์ความต้องการของลูกค้าในหลากหลายอุตสาหกรรม
              <br><br>เรามุ่งมั่นส่งมอบผลิตภัณฑ์คุณภาพสูง ตรงต่อเวลา ในราคาที่เหมาะสม พร้อมให้บริการด้วยความซื่อสัตย์และความเป็นมืออาชีพ เพื่อสร้างความเชื่อมั่นและเป็นพันธมิตรทางธุรกิจที่ลูกค้าไว้วางใจในระยะยาว&nbsp;<br></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. POINTS OF INTEREST SECTION -->
  <section data-bs-version="5.1" class="pricing02 cid-vppdDAcc9y" id="pricing02-1y">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 content-head">
          <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
              <strong>จุดเด่นของบริษัท</strong>
            </h4>
          </div>
        </div>
      </div>
      <div class="row justify-content-center g-4">
        <?php if ($suggestion_QR && mysqli_num_rows($suggestion_QR) > 0): ?>
          <?php while ($sug = mysqli_fetch_array($suggestion_QR)): ?>
            <div class="item features-image col-12 col-md-6 col-lg-4">
              <div class="hex-badge-card">
                <?php if (!empty($sug['suggestion_photo']) && file_exists("Files/suggestion_photo/" . $sug['suggestion_photo'])): ?>
                  <img src="Files/suggestion_photo/<?php echo $sug['suggestion_photo']; ?>" class="hex-bg-img" alt="<?php echo htmlspecialchars($sug['suggestion_name']); ?>">
                <?php else: ?>
                  <img src="v1-assets/images/line-album-15769-260715-14-815x611.jpeg" class="hex-bg-img" alt="Experience">
                <?php endif; ?>
                <div class="hex-card-overlay">
                  <div class="hex-top-content">
                    <?php if (!empty($sug['suggestion_topic_en'])): ?>
                      <h4 class="hex-en-title"><?php echo htmlspecialchars($sug['suggestion_topic_en']); ?></h4>
                    <?php endif; ?>
                  </div>
                  <div class="hex-bottom-content">
                    <h5 class="hex-th-title"><?php echo htmlspecialchars($sug['suggestion_name']); ?></h5>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <!-- 1. Experience 20+ Years -->
          <div class="item features-image col-12 col-md-6 col-lg-4">
            <div class="hex-badge-card">
              <img src="v1-assets/images/line-album-15769-260715-14-815x611.jpeg" class="hex-bg-img" alt="ประสบการณ์ยาวนานกว่า 20 ปี">
              <div class="hex-card-overlay">
                <div class="hex-top-content">
                  <h4 class="hex-en-title">Experience</h4>
                </div>
                <div class="hex-bottom-content">
                  <h5 class="hex-th-title">ประสบการณ์ยาวนานกว่า 20 ปี</h5>
                </div>
              </div>
            </div>
          </div>
          <!-- 2. Modern Machinery -->
          <div class="item features-image col-12 col-md-6 col-lg-4">
            <div class="hex-badge-card">
              <img src="v1-assets/images/line-album-15769-260715-9-815x1086.jpeg" class="hex-bg-img" alt="เครื่องจักรทันสมัยและคุณภาพการผลิตมาตรฐาน">
              <div class="hex-card-overlay">
                <div class="hex-top-content">
                  <h4 class="hex-en-title">Modern Machinery</h4>
                </div>
                <div class="hex-bottom-content">
                  <h5 class="hex-th-title">เครื่องจักรทันสมัยและคุณภาพการผลิตมาตรฐาน</h5>
                </div>
              </div>
            </div>
          </div>
          <!-- 3. Full Service -->
          <div class="item features-image col-12 col-md-6 col-lg-4">
            <div class="hex-badge-card">
              <img src="v1-assets/images/line-album-15769-260715-2-815x1086.jpeg" class="hex-bg-img" alt="บริการครบวงจร ตรงเวลา และราคายุติธรรม">
              <div class="hex-card-overlay">
                <div class="hex-top-content">
                  <h4 class="hex-en-title">Full Service</h4>
                </div>
                <div class="hex-bottom-content">
                  <h5 class="hex-th-title">บริการครบวงจร ตรงเวลา และราคายุติธรรม</h5>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- 4. CLIENTS SECTION -->
  <section data-bs-version="5.1" class="article9 cid-vppfRG0mX7" id="article09-1z">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 content-head">
          <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
            <strong>ลูกค้าของเรา</strong>
          </h3>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 image-wrapper d-flex justify-content-center">
          <img src="v1-assets/images/our-clients.png" alt="ลูกค้าของเรา" style="max-width: 100%; height: auto;">
        </div>
      </div>
    </div>
  </section>

  <!-- 5. DESIGN SERVICES SECTION -->
  <section data-bs-version="5.1" class="features10 cid-vppgvB4dzX" id="features010-20">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 mb-0 content-head">
          <h3 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 display-2"><strong>
            การออกแบบ
          </strong></h3>
        </div>
      </div>
      <div class="row">
        <!-- 1. Hospital Design -->
        <div class="item features-without-image col-12 col-md-6 col-lg-3 active">
          <div class="item-wrapper design-card-pill-wrap">
            <div class="design-card-img-header mb-3">
              <img src="v1-assets/images/picture1-643x480.jpg" alt="Hospital Design">
            </div>
            <div class="card-box align-center">
              <h5 class="card-title mbr-fonts-style display-5 mb-3"><strong>Hospital Design</strong></h5>
              <div class="mbr-section-btn item-footer"><a href="web_product.php" class="btn btn-pill-green display-7">ดูเพิ่มเติม</a></div>
            </div>
          </div>
        </div>
        <!-- 2. Cleanroom Design -->
        <div class="item features-without-image col-12 col-md-6 col-lg-3">
          <div class="item-wrapper design-card-pill-wrap">
            <div class="design-card-img-header mb-3">
              <img src="v1-assets/images/ffu2-643x480.jpg" alt="Cleanroom Design">
            </div>
            <div class="card-box align-center">
              <h5 class="card-title mbr-fonts-style display-5 mb-3"><strong>Cleanroom Design</strong></h5>
              <div class="mbr-section-btn item-footer"><a href="web_product.php" class="btn btn-pill-green display-7">ดูเพิ่มเติม</a></div>
            </div>
          </div>
        </div>
        <!-- 3. Canteen Design -->
        <div class="item features-without-image col-12 col-md-6 col-lg-3">
          <div class="item-wrapper design-card-pill-wrap">
            <div class="design-card-img-header mb-3">
              <img src="v1-assets/images/canteen01-853x480.jpg" alt="Canteen Design">
            </div>
            <div class="card-box align-center">
              <h5 class="card-title mbr-fonts-style display-5 mb-3"><strong>Canteen Design</strong></h5>
              <div class="mbr-section-btn item-footer"><a href="web_product.php" class="btn btn-pill-green display-7">ดูเพิ่มเติม</a></div>
            </div>
          </div>
        </div>
        <!-- 4. Tooling Design -->
        <div class="item features-without-image col-12 col-md-6 col-lg-3">
          <div class="item-wrapper design-card-pill-wrap">
            <div class="design-card-img-header mb-3">
              <img src="v1-assets/images/punching-721x480.jpg" alt="Tooling Design">
            </div>
            <div class="card-box align-center">
              <h5 class="card-title mbr-fonts-style display-5 mb-3"><strong>Tooling Design</strong></h5>
              <div class="mbr-section-btn item-footer"><a href="web_product.php" class="btn btn-pill-green display-7">ดูเพิ่มเติม</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. MATERIAL TYPES SECTION -->
  <section data-bs-version="5.1" class="clients2 cid-vpppEIH3Ys" id="clients02-2b">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 content-head">
          <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
            <strong>ประเภทวัสดุ</strong>
          </h3>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-6 card col-lg-3">
          <div class="card-wrap card1">
            <div class="content-wrap">
              <div class="mbr-section-btn card-btn align-center"><a class="btn btn-white display-7" href="product.php">Stainless Steel</a></div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 card col-lg-3">
          <div class="card-wrap card2">
            <div class="content-wrap">
              <div class="mbr-section-btn card-btn align-center"><a class="btn btn-white display-7" href="product.php">Aluminium</a></div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 card col-lg-3">
          <div class="card-wrap card3">
            <div class="content-wrap">
              <div class="mbr-section-btn card-btn align-center"><a class="btn btn-white display-7" href="product.php">Steel&nbsp;</a></div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 card col-lg-3">
          <div class="card-wrap card4">
            <div class="content-wrap">
              <div class="mbr-section-btn card-btn align-center"><a class="btn btn-white display-7" href="product.php">Plastic ESD</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'v1_footer.php'; ?>
</body>
</html>

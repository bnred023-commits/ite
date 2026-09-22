<?php
include 'index_Include.php'; 
$_SESSION['page'] = 'aboutus.php';

$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'aboutus'";
$pagecontent_QR = mysqli_query($con, $pagecontent_SL);
$pagecontent 	= ($pagecontent_QR && mysqli_num_rows($pagecontent_QR) > 0) ? mysqli_fetch_array($pagecontent_QR) : null;

// Fetch Hero Banner DB content
$slides_SL = " SELECT * FROM slides ORDER BY slides_sort ASC ";
$slides_QR = mysqli_query($con, $slides_SL);
$slides_Row = ($slides_QR) ? mysqli_num_rows($slides_QR) : 0;

$bg_photo = "v1-assets/images/hero-banner.jpg";
$slide_detail = "บริษัท อินเตอร์ เทค เอ็นจิเนียริ่ง จำกัด<br>ผู้เชี่ยวชาญด้านการผลิตและขึ้นรูปงานสแตนเลสและโลหะแผ่น";

if ($slides_Row > 0) {
    $slide = mysqli_fetch_array($slides_QR);
    if (!empty($slide['slides_photo']) && file_exists("Files/slides_photo/" . $slide['slides_photo'])) {
        $bg_photo = "v1-assets/images/hero-banner.jpg";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>เกี่ยวกับเรา | <?php echo !empty($fixed['fixed_website']) ? htmlspecialchars($fixed['fixed_website']) : 'Inter Tech Engineering'; ?></title>
    <meta name="description" content="<?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : ''; ?> - <?php echo !empty($fixed['fixed_topic']) ? htmlspecialchars($fixed['fixed_topic']) : ''; ?>">
    <meta name="keywords" content="<?php echo !empty($fixed['fixed_topic']) ? htmlspecialchars($fixed['fixed_topic']) : ''; ?>">
    <meta name="author" content="<?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : ''; ?>">

    <?php include 'v1_head.php'; ?>
</head>
<body>
    <?php include 'v1_navbar.php'; ?>

    <!-- HERO BANNER SECTION (MAIN HOMEPAGE BANNER STYLE) -->
    <section data-bs-version="5.1" class="header16 cid-vpp4Cig7Bn mbr-parallax-background" id="header17-aboutus" style="background-image: url('<?php echo $bg_photo; ?>'); align-items: center !important; justify-content: center !important;">
        <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="content-wrap col-12 col-md-10 col-lg-8 text-center mx-auto" style="margin-top: 10px !important;">
                    <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-2 text-center" style="font-size: clamp(3.5rem, 10vw, 8rem) !important; font-weight: 300 !important; font-family: 'Times New Roman', serif !important; letter-spacing: 4px; text-align: center !important; line-height: 1 !important;">
                        <strong>1991</strong>
                    </h1>
                    <p class="mbr-fonts-style mbr-text mbr-white mb-0 text-center" style="font-size: clamp(0.95rem, 2vw, 1.25rem) !important; line-height: 1.6 !important; font-weight: 400 !important; opacity: 0.95; text-align: center !important; margin: 0 auto !important; max-width: 800px !important;">
                        Established on August 14, 1991, specializing in sheet metal fabrication, stainless steel products, custom tooling, and parts manufacturing.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 1. COMPANY HISTORY TIMELINE SECTION (FIRST SECTION AFTER BANNER) -->
    <section class="timeline-section py-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-md-10">
                    <h2 class="fw-bold mb-3" style="color: #000B5E; font-size: clamp(2rem, 3.5vw, 2.5rem);">
                        <strong>ประวัติและความเป็นมา</strong>
                    </h2>
                    <p class="text-muted display-7">เส้นทางการเติบโตและพัฒนาการอย่างต่อเนื่องของ อินเตอร์ เทค เอ็นจิเนียริ่ง</p>
                </div>
            </div>

            <!-- Vertical Timeline Structure -->
            <div class="timeline-container position-relative mx-auto" style="max-width: 900px;">
                <!-- Center Vertical Line -->
                <div class="timeline-line position-absolute h-100" style="width: 4px; background-color: #000B5E; left: 50%; transform: translateX(-50%); top: 0; z-index: 1;"></div>

                <!-- Timeline Item 1: 1991 -->
                <div class="row align-items-center mb-4 mb-md-5 position-relative timeline-item">
                    <div class="col-12 col-md-6 timeline-col timeline-col-left text-md-end">
                        <div class="p-4 rounded-4 shadow-sm text-white" style="background-color: #000B5E;">
                            <h3 class="fw-bold mb-2 text-white" style="font-size: 1.8rem;">1991</h3>
                            <p class="mb-0 display-7" style="font-size: 0.95rem; opacity: 0.95; line-height: 1.6;">
                                บริษัท อินเตอร์ เทค เอ็นจิเนียริ่ง จำกัด ก่อตั้งขึ้นเมื่อวันที่ 14 สิงหาคม 2534 ดำเนินธุรกิจเกี่ยวกับงานขึ้นรูปโลหะแผ่น สแตนเลส ประเภท โต๊ะ ตู้ รถเข็น ฯลฯ พร้อมเพิ่มประสิทธิภาพการผลิตประเภทงาน Tooling, M/C, Spare parts และงาน Design โดย Draftsman
                            </p>
                        </div>
                    </div>
                    <div class="timeline-node position-absolute rounded-circle border border-3 border-white shadow-sm" style="width: 20px; height: 20px; background-color: #000B5E; z-index: 2;"></div>
                    <div class="col-12 col-md-6 timeline-col timeline-col-right d-none d-md-block"></div>
                </div>

                <!-- Timeline Item 2: 2008 -->
                <div class="row align-items-center mb-4 mb-md-5 position-relative timeline-item">
                    <div class="col-12 col-md-6 pe-md-4 mb-2 mb-md-0 timeline-col timeline-col-left text-md-end d-none d-md-block"></div>
                    <div class="timeline-node position-absolute rounded-circle border border-3 border-white shadow-sm" style="width: 20px; height: 20px; background-color: #000B5E; z-index: 2;"></div>
                    <div class="col-12 col-md-6 timeline-col timeline-col-right">
                        <div class="p-4 rounded-4 shadow-sm text-white" style="background-color: #000B5E;">
                            <h3 class="fw-bold mb-2 text-white" style="font-size: 1.8rem;">2008</h3>
                            <p class="mb-0 display-7" style="font-size: 0.95rem; opacity: 0.95; line-height: 1.6;">
                                บริษัทได้รับการรับรองมาตรฐาน ISO 9001:2008 สำหรับระบบบริหารงานคุณภาพที่ครอบคลุมกระบวนการผลิต การควบคุมคุณภาพ และการตรวจสอบผลิตภัณฑ์ให้เป็นไปตามข้อกำหนดของมาตรฐาน เพื่อให้ผลิตภัณฑ์มีคุณภาพและเป็นไปตามเกณฑ์ที่กำหนด
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Timeline Item 3: ปัจจุบัน -->
                <div class="row align-items-center position-relative timeline-item">
                    <div class="col-12 col-md-6 timeline-col timeline-col-left text-md-end">
                        <div class="p-4 rounded-4 shadow-sm text-white" style="background-color: #000B5E;">
                            <h3 class="fw-bold mb-2 text-white" style="font-size: 1.8rem;">ปัจจุบัน</h3>
                            <p class="mb-0 display-7" style="font-size: 0.95rem; opacity: 0.95; line-height: 1.6;">
                                บริษัทมีเครื่องจักรและอุปกรณ์ที่มีคุณภาพ เหมาะสมกับกระบวนการผลิตในแต่ละขั้นตอน ตั้งแต่การเตรียมวัตถุดิบ การขึ้นรูป การตัด การเชื่อม การประกอบ ตลอดจนการตรวจสอบคุณภาพผลิตภัณฑ์ เพื่อควบคุมกระบวนการผลิตให้เป็นไปตามมาตรฐานที่กำหนด เพิ่มประสิทธิภาพในการผลิต ลดความคลาดเคลื่อน และสนับสนุนการส่งมอบสินค้าได้ตามกำหนด รวมถึงการพัฒนาผลิตภัณฑ์อย่างต่อเนื่อง
                            </p>
                        </div>
                    </div>
                    <div class="timeline-node position-absolute rounded-circle border border-3 border-white shadow-sm" style="width: 20px; height: 20px; background-color: #000B5E; z-index: 2;"></div>
                    <div class="col-12 col-md-6 timeline-col timeline-col-right d-none d-md-block"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. INDUSTRIAL SOLUTIONS SECTION (FROM v1/page2.html article9) -->
    <section data-bs-version="5.1" class="article9 cid-vpIy4sRtbK py-5" id="article09-3x" style="background-color: #ffffff;">
        <div class="container-fluid px-0 px-md-3">
            <div class="row justify-content-center text-center mb-4 mx-0">
                <div class="col-12 px-0">
                    <h2 class="card-title mbr-fonts-style display-2 mb-3" style="font-weight: 700; color: #000B5E;">
                        <strong>Industrial Solutions</strong>
                    </h2>
                    <p class="text-muted display-7">โซลูชันอุตสาหกรรมครบวงจร รองรับทุกความต้องการด้วยมาตรฐานระดับสากล</p>
                </div>
            </div>
            <div class="row justify-content-center mx-0">
                <div class="col-12 px-0 text-center">
                    <div class="image-wrapper d-flex justify-content-center w-100 p-0 p-md-3 bg-white rounded-4 border overflow-hidden" style="border-color: #dee2e6 !important; max-width: 1200px; margin: 0 auto;">
                        <img class="w-100 img-fluid rounded-4 animate__animated animate__fadeIn" src="v1-assets/images/c95058dd-6930-4a23-b4c2-84a7b239c487-1672x941.png" alt="Industrial Solutions" style="width: 100% !important; min-width: 100% !important; height: auto; display: block; box-shadow: none !important;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. GALLERY / CMS DYNAMIC EXTRA MEDIA (IF ANY) -->
    <?php
    if (isset($pagecontent['pagecontent_id'])) {
        $gallery_SL = " SELECT * FROM gallery WHERE gallery_code = 'pagecontent_id{$pagecontent['pagecontent_id']}' ORDER BY gallery_sort IS NULL ASC, gallery_sort ASC";
        $gallery_QR = mysqli_query($con, $gallery_SL);
        if ($gallery_QR && mysqli_num_rows($gallery_QR) > 0) {
            echo '<section class="py-5 bg-white"><div class="container"><div class="row justify-content-center">';
            while ($gallery = mysqli_fetch_array($gallery_QR)) {
                if (!empty($gallery['gallery_photo'])) {
                    echo '<div class="col-md-6 mb-4"><img src="Files/gallery_photo/' . $gallery['gallery_photo'] . '" class="img-fluid rounded-3 shadow-sm" /></div>';
                }
            }
            echo '</div></div></section>';
        }
    }
    ?>

    <?php include 'v1_footer.php'; ?>
</body>
</html>
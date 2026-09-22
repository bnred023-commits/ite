<!-- 1. FULL WIDTH GOOGLE MAP BACKGROUND SECTION WITH FLOATING CONTACT CAPSULE -->
<section data-bs-version="5.1" class="contacts02 map1 cid-vpprVZ9ego" id="contacts02-2c">
    <!-- Full-width Google Maps Background -->
    <div class="google-map-background" style="width: 100%; height: 580px; position: relative;">
        <iframe frameborder="0" style="border:0; width: 100%; height: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.6757167618166!2d100.71805387486266!3d14.096310486332415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d83d270af4c75%3A0x2c9ee90b1f5ac424!2sInter%20Tech%20Engineering%20Co.%2C%20Ltd.!5e0!3m2!1sen!2sth!4v1784087927809!5m2!1sen!2sth" allowfullscreen=""></iframe>
    </div>

    <!-- Floating White Capsule Card Container -->
    <div class="container footer-cards-container">
        <div class="footer-floating-capsule">
            <div class="row align-items-center g-4">
                <!-- Left Column: Contact Details (Dynamically bound from CMS $fixed) -->
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="d-flex flex-column gap-3">
                        <!-- 1. Company Name -->
                        <div class="d-flex align-items-center ps-1">
                            <div class="footer-info-icon-btn me-3 flex-shrink-0">
                                <svg viewBox="0 0 24 24"><path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/></svg>
                            </div>
                            <div>
                                <h4 class="fw-bold text-dark mb-0 display-7" style="font-size: 1.15rem;">
                                    <?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : 'บริษัท อินเตอร์เทค เอ็นจิเนียริ่ง จำกัด'; ?>
                                </h4>
                            </div>
                        </div>

                        <!-- 2. Address -->
                        <div class="d-flex align-items-center ps-1">
                            <div class="footer-info-icon-btn me-3 flex-shrink-0">
                                <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <div>
                                <div class="capsule-subtext" style="font-size: 0.95rem; color: #475569; font-weight: 500;">
                                    <?php echo !empty($fixed['fixed_address']) ? nl2br(htmlspecialchars($fixed['fixed_address'])) : '19/17-18 หมู่ 8 ต.คลองห้า อ.คลองหลวง จ.ปทุมธานี 12120'; ?>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Opening Hours Pill Card with Soft Blue Background -->
                        <div class="hours-blue-card p-3 rounded-3 d-flex align-items-center">
                            <div class="footer-info-icon-btn me-3 flex-shrink-0">
                                <svg viewBox="0 0 24 24"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zM9 14H7v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2zm-8 4H7v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z"/></svg>
                            </div>
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 1.05rem;">เปิดทำการ</div>
                                <div class="capsule-subtext" style="font-size: 0.95rem; color: #475569; font-weight: 500;">
                                    <?php echo !empty($fixed['fixed_open']) ? nl2br(htmlspecialchars($fixed['fixed_open'])) : 'จันทร์ - เสาร์ 8:00 - 17:00 น.'; ?>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Phone -->
                        <div class="d-flex align-items-center ps-1">
                            <div class="footer-info-icon-btn me-3 flex-shrink-0">
                                <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            </div>
                            <div>
                                <div class="capsule-subtext fw-bold text-dark" style="font-size: 1.05rem;">
                                    <?php echo !empty($fixed['fixed_tel']) ? htmlspecialchars($fixed['fixed_tel']) : '02-902-5752-6'; ?>
                                </div>
                            </div>
                        </div>

                        <!-- 5. Email -->
                        <div class="d-flex align-items-center ps-1">
                            <div class="footer-info-icon-btn me-3 flex-shrink-0">
                                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </div>
                            <div>
                                <div class="capsule-subtext" style="font-size: 0.95rem; color: #475569; font-weight: 500;">
                                    <?php 
                                    if (!empty($fixed['fixed_email'])) {
                                        echo 'อีเมล: ' . htmlspecialchars($fixed['fixed_email']);
                                    } else {
                                        echo 'อีเมล: intertech@ite-tech.com';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Title + Enlarged LINE QR Code -->
                <div class="col-12 col-md-5 col-lg-5 text-center d-flex flex-column align-items-center justify-content-center border-start-md ps-md-4">
                    <h5 class="fw-bold text-dark mb-3 display-7" style="font-size: 1.35rem;">ติดต่อเรา</h5>
                    <div class="qr-code-box bg-white p-2 border rounded-3 inline-block shadow-sm">
                        <?php if (!empty($fixed['fixed_qrcode']) && file_exists("Files/fixed_qrcode/" . $fixed['fixed_qrcode'])): ?>
                            <img src="Files/fixed_qrcode/<?php echo $fixed['fixed_qrcode']; ?>" alt="LINE QR Code" style="width: 185px; height: 185px; object-fit: contain; border-radius: 0 !important;">
                        <?php else: ?>
                            <img src="Files/qrcode.png" alt="LINE QR Code" style="width: 185px; height: 185px; object-fit: contain; border-radius: 0 !important;" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://line.me/ti/p/~intertech';">
                        <?php endif; ?>
                    </div>
                    <p class="text-secondary small mt-2 mb-0" style="font-size: 0.88rem;">สแกน QR เพื่อเพิ่มเพื่อนใน LINE</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. DARK FOOTER BOTTOM BAR -->
<footer class="text-center site-footer-bottom text-white display-7">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <p class="mb-0 text-white opacity-75 display-7">
            Copyright © 2025<?php if (date("Y") != '2025') { echo "-" . date("Y"); } ?> <?php echo !empty($fixed['fixed_website']) ? htmlspecialchars($fixed['fixed_website']) : 'Inter Tech Engineering'; ?> All rights reserved.
        </p>
    </div>
</footer>

<!-- Floating Scroll To Top Button -->
<a href="#" id="scrollToTop" title="เลื่อนกลับไปด้านบน">
    <svg viewBox="0 0 24 24">
        <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
    </svg>
</a>

<input name="animation" type="hidden">

<script src="v1-assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="v1-assets/parallax/jarallax.js"></script>
<script src="v1-assets/smoothscroll/smooth-scroll.js"></script>
<script src="v1-assets/ytplayer/index.js"></script>
<script src="v1-assets/dropdown/js/navbar-dropdown.js"></script>
<script src="v1-assets/viewportchecker/viewportchecker.js"></script>
<script src="v1-assets/theme/js/script.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('scrollToTop');
    if (btn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 250) {
                btn.classList.add('show');
            } else {
                btn.classList.remove('show');
            }
        });
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
</script>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<link rel="icon" href="Files/fixed_titlelogo/<?php echo !empty($fixed['fixed_titlelogo']) ? $fixed['fixed_titlelogo'] : ''; ?>" type="image/x-icon">
<meta name="description" content="<?php echo !empty($fixed['fixed_topic']) ? htmlspecialchars($fixed['fixed_topic']) : 'Inter Tech Engineering'; ?>">
<meta name="keywords" content="<?php echo !empty($fixed['fixed_topic']) ? htmlspecialchars($fixed['fixed_topic']) : ''; ?>">
<meta name="author" content="<?php echo !empty($fixed['fixed_company']) ? htmlspecialchars($fixed['fixed_company']) : ''; ?>">

<link rel="stylesheet" href="v1-assets/web/assets/mobirise-icons2/mobirise2.css">
<link rel="stylesheet" href="v1-assets/web/assets/mobirise-icons/mobirise-icons.css">
<link rel="stylesheet" href="v1-assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="v1-assets/parallax/jarallax.css">
<link rel="stylesheet" href="v1-assets/animatecss/animate.css">
<link rel="stylesheet" href="v1-assets/dropdown/css/style.css">
<link rel="stylesheet" href="v1-assets/theme/css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap">
<link rel="stylesheet" href="v1-assets/mobirise/css/mbr-additional.css?v=8qCoMP" type="text/css">

<style>
html, body {
    margin: 0 !important;
    padding: 0 !important;
    font-family: 'Noto Sans Thai', 'Inter Tight', sans-serif !important;
    overflow-x: hidden;
}

.rounded-4 {
    border-radius: 1.25rem !important;
}

/* Harmonized Font Family for All Elements */
h1, h2, h3, h4, h5, h6, p, a, span, button, input, select, label, 
.display-1, .display-2, .display-4, .display-5, .display-7, 
.nav-link, .dropdown-item, .navbar-caption {
    font-family: 'Noto Sans Thai', 'Inter Tight', sans-serif !important;
}

/* Hero Title Single Line Formatting */
.header16 {
    padding-top: 120px !important;
    padding-bottom: 60px !important;
    display: flex !important;
    align-items: center !important;
}

.header16 .content-wrap {
    margin-top: 40px !important;
}

.hero-title-single-line {
    font-size: clamp(1.8rem, 3.5vw, 3.2rem) !important;
    white-space: nowrap !important;
    line-height: 1.2 !important;
    margin-top: 20px !important;
}

@media (max-width: 991px) {
    .header16 {
        padding-top: 100px !important;
        padding-bottom: 40px !important;
        min-height: auto !important;
    }
    .hero-title-single-line {
        white-space: normal !important;
        font-size: clamp(1.6rem, 5.5vw, 2.2rem) !important;
    }
}

/* Timeline Desktop & Mobile Responsiveness */
.timeline-node {
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

@media (max-width: 767px) {
    .timeline-container {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }
    .timeline-line {
        left: 20px !important;
        transform: none !important;
    }
    .timeline-node {
        left: 10px !important;
        top: 25px !important;
        transform: none !important;
    }
    .timeline-col {
        padding-left: 38px !important;
        padding-right: 5px !important;
        text-align: left !important;
        width: 100% !important;
    }

    /* Industrial Solutions Diagram Mobile Full-Touch Optimization */
    .article9 .image-wrapper {
        padding: 6px !important;
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch;
    }
    .article9 .image-wrapper img {
        min-width: 100% !important;
    }
}

/* Floating Dark Pill Navbar Overlaid Directly Over Hero Banner (Scrolls away with page) */
section.menu {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    width: 100% !important;
    z-index: 1000 !important;
    background: transparent !important;
}

.menu .navbar,
.menu .navbar.navbar-fixed-top {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    width: 100% !important;
    z-index: 1000 !important;
    background: transparent !important;
    box-shadow: none !important;
    padding: 20px 0 0 0 !important;
    transition: none !important;
}

/* Floating Scroll To Top Button (Follows every scroll) */
#scrollToTop {
    position: fixed !important;
    bottom: 30px !important;
    right: 30px !important;
    width: 48px !important;
    height: 48px !important;
    background-color: #09090b !important;
    color: #ffffff !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    border-radius: 50% !important;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35) !important;
    z-index: 9999 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
}

#scrollToTop.show {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateY(0) !important;
}

#scrollToTop:hover {
    background-color: #3b82f6 !important;
    color: #ffffff !important;
    transform: translateY(-4px) !important;
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4) !important;
}

#scrollToTop svg {
    width: 22px;
    height: 22px;
    fill: currentColor;
}

@media (max-width: 767.98px) {
    #scrollToTop {
        bottom: 18px !important;
        right: 16px !important;
        width: 42px !important;
        height: 42px !important;
    }
    #scrollToTop svg {
        width: 18px !important;
        height: 18px !important;
    }
}

.menu .navbar-dropdown .container {
    background: #09090b !important;
    border-radius: 50px !important;
    padding: 6px 20px !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.45) !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    backdrop-filter: blur(16px) !important;
    max-width: 1200px !important;
    margin: 0 auto !important;
}

.menu .navbar-logo {
    background: #ffffff !important;
    padding: 4px 14px !important;
    border-radius: 30px !important;
    display: inline-flex !important;
    align-items: center !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
}

.menu .navbar-logo img {
    height: 2.2rem !important;
    max-height: 42px !important;
    width: auto !important;
}

.menu .nav-link, 
.menu .dropdown-item, 
.menu .navbar-caption,
.navbar-contact-pill {
    font-family: 'Noto Sans Thai', 'Inter Tight', sans-serif !important;
}

.menu .nav-link {
    color: #ffffff !important;
    font-weight: 500 !important;
    font-size: 1.15rem !important;
    padding: 8px 16px !important;
    transition: all 0.2s ease !important;
}

.menu .nav-link:hover, .menu .nav-link:focus {
    color: #3b82f6 !important;
    opacity: 0.9;
}

.menu .dropdown-menu {
    background: #09090b !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    border-radius: 16px !important;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5) !important;
    padding: 8px 0 !important;
}

.menu .dropdown-item {
    color: #ffffff !important;
    font-weight: 400 !important;
    font-size: 1.05rem !important;
    padding: 8px 20px !important;
    transition: background 0.2s ease !important;
}

.menu .dropdown-item:hover {
    background: rgba(255, 255, 255, 0.1) !important;
    color: #3b82f6 !important;
}

.navbar-contact-pill {
    background: #ffffff !important;
    color: #09090b !important;
    font-weight: 600 !important;
    font-size: 1.0rem !important;
    padding: 8px 20px !important;
    border-radius: 30px !important;
    text-decoration: none !important;
    transition: all 0.2s ease !important;
    display: inline-block !important;
}

.navbar-contact-pill:hover {
    background: #e4e4e7 !important;
    color: #000000 !important;
    transform: translateY(-1px);
}

@media (max-width: 991px) {
    .menu .navbar {
        padding-top: 10px !important;
    }
    .menu .navbar-dropdown .container {
        border-radius: 30px !important;
        padding: 8px 16px !important;
        width: 94% !important;
    }
    .menu .navbar-collapse {
        background: #09090b !important;
        border-radius: 20px !important;
        padding: 20px !important;
        margin-top: 15px !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
    }
    .menu .hamburger span {
        background-color: #ffffff !important;
    }
}

/* 100% Unified Harmonious Spacing System Across All Sections */
section:not(.header16):not(.product-hero-section):not(#productHero) {
    min-height: auto !important;
    padding-top: 2.8rem !important;
    padding-bottom: 2.8rem !important;
}

/* Specific Extra Top Spacing for About Us Section (#article02-1v) */
section#article02-1v, section.article2 {
    padding-top: 4.8rem !important;
}

@media (max-width: 768px) {
    section#article02-1v, section.article2 {
        padding-top: 2.5rem !important;
    }
}

/* Global Unified Header & Subtitle Margins */
.mbr-section-head, 
.content-head,
.mbr-section-head .content-head {
    margin-top: 0 !important;
    margin-bottom: 1.75rem !important;
}

.mbr-section-title,
.mbr-section-subtitle {
    margin-top: 0 !important;
    margin-bottom: 1.0rem !important;
}

@media (max-width: 768px) {
    section:not(.header16) {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
    }
    .mbr-section-head, 
    .content-head {
        margin-bottom: 1.25rem !important;
    }
}
/* Modern Floating Contact Capsule Footer Layout (Zero gap space) */
section.contacts02.map1 {
    position: relative !important;
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    background-color: #0f172a !important;
}

section.contacts02.map1 .google-map-background {
    width: 100% !important;
    height: 580px !important;
    position: relative !important;
}

section.contacts02.map1 .footer-cards-container {
    position: absolute !important;
    bottom: 25px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    z-index: 5 !important;
    width: 100% !important;
    max-width: 960px !important;
    padding-left: 15px !important;
    padding-right: 15px !important;
}

.footer-floating-capsule {
    background: #ffffff !important;
    border-radius: 28px !important;
    padding: 24px 32px !important;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2) !important;
    border: 1px solid #e2e8f0 !important;
    margin: 0 !important;
}

.footer-floating-capsule h5,
.footer-floating-capsule .fw-bold {
    color: #0f172a !important;
    font-weight: 700 !important;
}

.footer-floating-capsule .capsule-subtext,
.footer-floating-capsule p,
.footer-floating-capsule span,
.footer-floating-capsule div {
    color: #334155 !important;
}

.hours-blue-card {
    background-color: #eff6ff !important;
    border-radius: 12px !important;
}

.footer-info-icon-btn {
    width: 38px !important;
    height: 38px !important;
    min-width: 38px !important;
    border-radius: 50% !important;
    background-color: #3b82f6 !important;
    color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.footer-info-icon-btn svg {
    width: 18px;
    height: 18px;
    fill: currentColor;
}

@media (min-width: 768px) {
    .border-start-md {
        border-left: 1px solid #e2e8f0 !important;
    }
}

footer.site-footer-bottom {
    background-color: #0f172a !important;
    padding-top: 22px !important;
    padding-bottom: 22px !important;
    position: relative !important;
    z-index: 10 !important;
    overflow: hidden !important;
}

footer.site-footer-bottom p,
footer.site-footer-bottom .site-footer-bottom-text {
    font-size: clamp(0.72rem, 2.6vw, 0.92rem) !important;
    line-height: 1.6 !important;
    word-break: break-word !important;
    overflow-wrap: break-word !important;
    max-width: 100% !important;
    margin: 0 auto !important;
}

@media (max-width: 991px) {
    section.contacts02.map1 {
        position: relative !important;
        background: transparent !important;
    }
    section.contacts02.map1 .google-map-background {
        height: 680px !important;
    }
    section.contacts02.map1 .footer-cards-container {
        position: absolute !important;
        bottom: 15px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
        max-width: 100% !important;
        width: 96% !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
    }
    .footer-floating-capsule {
        padding: 16px 16px !important;
        border-radius: 20px !important;
    }
    .footer-floating-capsule .row {
        --bs-gutter-y: 0.5rem !important;
    }
    .footer-floating-capsule .d-flex.flex-column {
        gap: 0.4rem !important;
    }
    footer.site-footer-bottom {
        padding-left: 45px !important;
        padding-right: 45px !important;
        padding-top: 16px !important;
        padding-bottom: 16px !important;
    }
    footer.site-footer-bottom p {
        font-size: clamp(0.68rem, 3.2vw, 0.8rem) !important;
    }
}
/* Modern Design Cards Layout with Pill Buttons */
.design-card-pill-wrap {
    background: #ffffff !important;
    border-radius: 16px !important;
    padding: 0 0 18px 0 !important;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08) !important;
    overflow: hidden !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    display: flex !important;
    flex-direction: column !important;
}

.design-card-pill-wrap .card-box {
    padding: 16px 16px 6px 16px !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-grow: 1 !important;
}

.design-card-pill-wrap:hover {
    transform: translateY(-6px) !important;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12) !important;
}

.design-card-img-header {
    width: 100% !important;
    height: 180px !important;
    overflow: hidden !important;
}

.design-card-img-header img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    border-top-left-radius: 16px !important;
    border-top-right-radius: 16px !important;
    transition: transform 0.4s ease !important;
}

.design-card-pill-wrap:hover .design-card-img-header img {
    transform: scale(1.05) !important;
}

.cid-vppgvB4dzX {
    padding-top: 3rem !important;
    padding-bottom: 5.5rem !important;
}

.btn-pill-green {
    background-color: #000B5E !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: 50px !important;
    padding: 8px 28px !important;
    font-weight: 500 !important;
    font-size: 0.95rem !important;
    box-shadow: 0 4px 14px rgba(0, 11, 94, 0.35) !important;
    transition: all 0.25s ease !important;
}

.btn-pill-green:hover {
    background-color: #000845 !important;
    color: #ffffff !important;
    box-shadow: 0 6px 18px rgba(0, 11, 94, 0.5) !important;
    transform: scale(1.03) !important;
}

/* Company Highlights Shield Shape (Flat Top, Smooth Curved Bottom Tip) */
.company-highlight-card {
    background: #000B5E !important;
    clip-path: polygon(
        0% 0%, 
        100% 0%, 
        100% 78%, 
        60% 96%, 
        55% 98.5%, 
        50% 100%, 
        45% 98.5%, 
        40% 96%, 
        0% 78%
    ) !important;
    border-radius: 0 !important;
    overflow: hidden !important;
    transition: transform 0.35s ease, filter 0.35s ease !important;
    height: 440px !important;
    display: flex !important;
    flex-direction: column !important;
    color: #ffffff !important;
    margin-bottom: 1.5rem !important;
}

.company-highlight-card:hover {
    transform: translateY(-8px) !important;
    filter: drop-shadow(0 14px 22px rgba(0, 11, 94, 0.45)) !important;
}

.highlight-img-container {
    position: relative !important;
    width: 100% !important;
    height: 60% !important;
    overflow: hidden !important;
}

.highlight-img-container img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.4s ease !important;
}

.company-highlight-card:hover .highlight-img-container img {
    transform: scale(1.06) !important;
}

.highlight-overlay-title {
    position: absolute !important;
    top: 20px !important;
    left: 20px !important;
    color: #ffffff !important;
    font-weight: 700 !important;
    font-size: 1.5rem !important;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.85), 0 0 16px rgba(0, 0, 0, 0.6) !important;
    letter-spacing: -0.2px !important;
    z-index: 2 !important;
}

.highlight-text-footer {
    height: 40% !important;
    padding: 15px 24px 45px 24px !important;
    background: #000B5E !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
}

.highlight-main-title {
    color: #ffffff !important;
    font-size: 1.15rem !important;
    line-height: 1.5 !important;
    font-weight: 600 !important;
}

/* Modern Inner Page Header Cover (Header Banner) */
.page-header-cover {
    position: relative !important;
    width: 100% !important;
    height: 320px !important;
    background-color: #000B5E !important;
    background-size: cover !important;
    background-position: center !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    margin-top: 0 !important;
}

.page-header-cover .cover-overlay {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: linear-gradient(180deg, rgba(0, 11, 94, 0.75) 0%, rgba(0, 7, 61, 0.85) 100%) !important;
    z-index: 1 !important;
}

.page-header-cover .cover-title {
    position: relative !important;
    z-index: 2 !important;
    color: #ffffff !important;
    font-size: clamp(2rem, 5vw, 3.2rem) !important;
    font-weight: 700 !important;
    text-align: center !important;
    text-shadow: 0 4px 16px rgba(0, 0, 0, 0.4) !important;
    margin-top: 50px !important;
}

@media (max-width: 767px) {
    .page-header-cover {
        height: 240px !important;
    }
    .page-header-cover .cover-title {
        margin-top: 40px !important;
    }
}

/* Mobirise news08 Component Styling Exact Match for v1/page3.html */
.news08 .item-wrapper {
    background: transparent !important;
    text-align: center !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
}
.news08 .item-img {
    height: 320px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    background: transparent !important;
    overflow: hidden !important;
    width: 100% !important;
}
.news08 .item-img img {
    max-height: 100% !important;
    max-width: 100% !important;
    width: auto !important;
    height: auto !important;
    object-fit: contain !important;
}
.news08 .item-content {
    text-align: center !important;
    width: 100% !important;
}
.news08 .item-subtitle {
    font-size: 1.4rem !important;
    font-weight: 700 !important;
    color: #000000 !important;
    text-align: center !important;
}
.news08 .btn-white {
    background-color: #efefec !important;
    color: #555555 !important;
    border-radius: 100px !important;
    border: none !important;
    padding: 8px 24px !important;
    font-size: 0.95rem !important;
    box-shadow: none !important;
}

/* Fix Search Input Focus Ring Overlap */
.input-group input.form-control:focus,
.input-group input.form-control:active {
    outline: none !important;
    box-shadow: none !important;
    border-color: transparent !important;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var materialCards = document.querySelectorAll('.cid-vpppEIH3Ys .card-wrap');
  materialCards.forEach(function(card) {
    card.addEventListener('click', function(e) {
      if (window.innerWidth <= 767 && e.target.tagName !== 'A') {
        card.classList.toggle('flipped');
      }
    });
  });
});
</script>
<?php
if (isset($con)) {
    $pagecontent_head_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'tag_head' ";
    $pagecontent_head_QR = mysqli_query($con, $pagecontent_head_SL);
    if ($pagecontent_head_QR && mysqli_num_rows($pagecontent_head_QR) > 0) {
        $pagecontent_head = mysqli_fetch_array($pagecontent_head_QR);
        if (!empty($pagecontent_head['pagecontent_review'])) {
            $head_review = html_entity_decode(htmlspecialchars_decode($pagecontent_head['pagecontent_review']));
            $head_review = str_replace("&#39;", "'", $head_review);
            echo $head_review;
        }
    }
}
?>

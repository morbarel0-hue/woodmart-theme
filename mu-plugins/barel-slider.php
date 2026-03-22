<?php
/**
 * Plugin Name: Barel Hero Slider
 * Description: Full-width hero slider for homepage
 * Version: 5.0
 */
if (!defined('ABSPATH')) exit;

/* ── CSS ── */
add_action('wp_head', function () {
    if (!is_front_page()) return;
    ?>
<style id="barel-slider-css">
#barel-hero-slider {
    position: relative;
    width: 100vw;
    margin-right: calc(-50vw + 50%);
    overflow: hidden;
    height: 560px;
    background: #111;
    display: block;
    box-sizing: border-box;
}
@media (max-width: 768px) {
    #barel-hero-slider { height: auto; }
}
.bhs-track {
    display: flex;
    width: 100%;
    height: 100%;
    transition: transform 0.6s ease;
    will-change: transform;
}
.bhs-slide {
    position: relative;
    min-width: 100%;
    height: 100%;
    overflow: hidden;
    flex-shrink: 0;
}
.bhs-slide img {
    width: 100%;
    height: 560px;
    object-fit: cover;
    display: block;
    margin: 0;
    padding: 0;
}
@media (max-width: 768px) {
    .bhs-slide img { height: auto; min-height: 220px; }
}

/* ── CTA Button ── */
.bhs-cta {
    position: absolute;
    bottom: 56px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 5;
    display: inline-block;
    background: #e63030;
    color: #fff;
    font-family: Heebo, Arial, sans-serif;
    font-size: 16px;
    font-weight: 600;
    padding: 12px 32px;
    border-radius: 4px;
    text-decoration: none;
    white-space: nowrap;
    transition: background 0.2s;
    cursor: pointer;
    border: none;
}
.bhs-cta:hover { background: #b71c1c; color: #fff; text-decoration: none; }
@media (max-width: 768px) {
    .bhs-cta { bottom: 48px; font-size: 14px; padding: 10px 22px; }
}

/* ── Arrows ── */
.bhs-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.45);
    color: #fff;
    border: none;
    cursor: pointer;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    font-size: 24px;
    line-height: 48px;
    text-align: center;
    z-index: 10;
    padding: 0;
    transition: background 0.2s;
}
.bhs-arrow:hover { background: rgba(0,0,0,0.75); }
.bhs-prev { left: 16px; }
.bhs-next { right: 16px; }

/* ── Dots ── */
.bhs-dots {
    position: absolute;
    bottom: 16px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
    z-index: 10;
}
.bhs-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(255,255,255,0.5);
    border: none;
    cursor: pointer;
    padding: 0;
    transition: background 0.2s;
}
.bhs-dot.active { background: #fff; }

/* ── Kill side gaps ── */
.wd-page-content,
.website-wrapper,
body.home .wd-content-layout,
body.home #main-content,
body.home .entry-content,
body.home .elementor-section-wrap,
body.home .e-con-inner,
body.home .elementor-top-section:first-child {
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
}
body.home .elementor-section.elementor-section-stretched {
    margin-left: 0 !important;
    margin-right: 0 !important;
}
</style>
    <?php
}, 5);

/* ── HTML + JS ── */
add_action('wp_footer', function () {
    if (!is_front_page()) return;
    ?>
<div id="barel-hero-slider" style="display:none">
    <div class="bhs-track">

        <div class="bhs-slide">
            <img src="https://barelofir.co.il/wp-content/uploads/sliders/drills_desktop.jpg"
                 alt="מקדחות ומברגות" width="1920" height="560" loading="eager" />
            <a href="/shop" class="bhs-cta">לרכישה עכשיו</a>
        </div>

        <div class="bhs-slide">
            <img src="https://barelofir.co.il/wp-content/uploads/sliders/washers_desktop.jpg"
                 alt="מכונות שטיפה" width="1920" height="560" loading="lazy" />
            <a href="/shop" class="bhs-cta">לרכישה עכשיו</a>
        </div>

        <div class="bhs-slide">
            <img src="https://barelofir.co.il/wp-content/uploads/sliders/signet_desktop.jpg"
                 alt="כלי גינון" width="1920" height="560" loading="lazy" />
            <a href="/shop" class="bhs-cta">לרכישה עכשיו</a>
        </div>

    </div>
    <button class="bhs-arrow bhs-prev" aria-label="הקודם">&#8249;</button>
    <button class="bhs-arrow bhs-next" aria-label="הבא">&#8250;</button>
    <div class="bhs-dots">
        <button class="bhs-dot active" data-idx="0" aria-label="שקופית 1"></button>
        <button class="bhs-dot" data-idx="1" aria-label="שקופית 2"></button>
        <button class="bhs-dot" data-idx="2" aria-label="שקופית 3"></button>
    </div>
</div>

<script id="barel-slider-js">
(function () {
    var slider = document.getElementById('barel-hero-slider');
    if (!slider) return;

    /* Place slider at top of page content */
    var candidates = ['.wd-page-content', '#main-content', '.main-page-wrapper', 'main', '#page'];
    var placed = false;
    for (var i = 0; i < candidates.length; i++) {
        var el = document.querySelector(candidates[i]);
        if (el) {
            el.insertBefore(slider, el.firstChild);
            placed = true;
            break;
        }
    }
    if (!placed) document.body.insertBefore(slider, document.body.firstChild);
    slider.style.display = 'block';

    var track = slider.querySelector('.bhs-track');
    var dots  = slider.querySelectorAll('.bhs-dot');
    var btnP  = slider.querySelector('.bhs-prev');
    var btnN  = slider.querySelector('.bhs-next');
    var total = slider.querySelectorAll('.bhs-slide').length;
    var cur   = 0;
    var timer;
    var rtl   = document.dir === 'rtl' || document.documentElement.getAttribute('dir') === 'rtl';

    function goTo(n) {
        cur = (n + total) % total;
        var pct = rtl ? -(cur * 100) : (cur * 100);
        track.style.transform = 'translateX(' + pct + '%)';
        dots.forEach(function (d, i) { d.classList.toggle('active', i === cur); });
    }
    function startTimer() {
        clearInterval(timer);
        timer = setInterval(function () { goTo(cur + (rtl ? -1 : 1)); }, 5000);
    }

    btnP.addEventListener('click', function () { goTo(cur + (rtl ? 1 : -1)); startTimer(); });
    btnN.addEventListener('click', function () { goTo(cur + (rtl ? -1 : 1)); startTimer(); });
    dots.forEach(function (d) {
        d.addEventListener('click', function () { goTo(+d.dataset.idx); startTimer(); });
    });
    slider.addEventListener('mouseenter', function () { clearInterval(timer); });
    slider.addEventListener('mouseleave', startTimer);

    goTo(0);
    startTimer();
})();
</script>
    <?php
}, 1);

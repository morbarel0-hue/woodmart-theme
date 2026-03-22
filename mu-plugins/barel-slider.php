<?php
/**
 * Plugin Name: Barel Hero Slider & Products
 * Description: Hero slider on homepage + new products grid+slider
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

// ──────────────────────────────────────────────────────────────
// HERO SLIDER
// ──────────────────────────────────────────────────────────────

add_action('wp_head', 'barel_slider_css');
function barel_slider_css() {
    if (!is_front_page()) return;
    ?>
<style>
/* ── Hero Slider ── */
#barel-hero-slider {
    position: relative;
    width: 100%;
    height: 620px;
    overflow: hidden;
    direction: rtl;
    background: #000;
}
#barel-hero-slider .bs-slide {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    opacity: 0;
    transition: opacity 0.7s ease;
}
#barel-hero-slider .bs-slide.active {
    opacity: 1;
    z-index: 1;
}
#barel-hero-slider .bs-slide picture,
#barel-hero-slider .bs-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
/* Arrows */
.bs-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background: rgba(0,0,0,0.45);
    color: #fff;
    border: none;
    width: 48px; height: 48px;
    border-radius: 50%;
    font-size: 22px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: background 0.2s;
    line-height: 1;
}
.bs-arrow:hover { background: rgba(227,0,15,0.8); }
.bs-arrow-right { right: 18px; }
.bs-arrow-left  { left: 18px; }
/* Dots */
.bs-dots {
    position: absolute;
    bottom: 16px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    display: flex;
    gap: 8px;
}
.bs-dot {
    width: 12px; height: 12px;
    border-radius: 50%;
    background: rgba(255,255,255,0.5);
    border: none;
    cursor: pointer;
    transition: background 0.2s;
}
.bs-dot.active { background: #fff; }

@media (max-width: 767px) {
    #barel-hero-slider {
        height: auto;
        min-height: 200px;
    }
    #barel-hero-slider .bs-slide img {
        height: auto;
        min-height: 200px;
    }
    .bs-arrow { width: 36px; height: 36px; font-size: 16px; }
}

/* ── New Products Section ── */
#barel-new-products {
    direction: rtl;
    padding: 40px 20px;
    max-width: 1400px;
    margin: 0 auto;
}
#barel-new-products h2 {
    font-size: 2rem;
    margin-bottom: 30px;
    color: #222;
    font-weight: 700;
}
.barel-products-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}
.barel-product-card {
    background: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    transition: box-shadow 0.2s, transform 0.2s;
}
.barel-product-card:hover {
    box-shadow: 0 6px 24px rgba(0,0,0,0.12);
    transform: translateY(-3px);
}
.barel-product-card img {
    width: 100%;
    height: 200px;
    object-fit: contain;
    padding: 10px;
    background: #fafafa;
}
.barel-product-card .bpc-title {
    font-size: 0.95rem;
    font-weight: 600;
    padding: 10px 12px 4px;
    color: #222;
    min-height: 48px;
}
.barel-product-card .bpc-price {
    font-size: 1.1rem;
    font-weight: 700;
    color: #e3000f;
    padding: 4px 12px;
}
.barel-product-card .bpc-btn {
    display: block;
    margin: 10px 12px 14px;
    padding: 9px 0;
    background: #222;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 0.9rem;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s;
}
.barel-product-card .bpc-btn:hover { background: #e3000f; color: #fff; }

/* Slider row */
.barel-slider-heading {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 16px;
    color: #222;
}
.barel-products-slider-wrap {
    position: relative;
}
.barel-products-slider {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding-bottom: 10px;
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.barel-products-slider::-webkit-scrollbar { display: none; }
.barel-products-slider .barel-product-card {
    min-width: 220px;
    max-width: 220px;
    flex-shrink: 0;
}
.bps-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 5;
    background: rgba(0,0,0,0.5);
    color: #fff;
    border: none;
    width: 42px; height: 42px;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: background 0.2s;
}
.bps-arrow:hover { background: #e3000f; }
.bps-arrow-right { right: -18px; }
.bps-arrow-left  { left: -18px; }

@media (max-width: 767px) {
    .barel-products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .bps-arrow-right { right: 0; }
    .bps-arrow-left  { left: 0; }
}
</style>
    <?php
}

// Output slider HTML at top of homepage content
add_filter('the_content', 'barel_prepend_homepage_slider', 99);
add_action('wp_footer', 'barel_hero_slider_js');

function barel_prepend_homepage_slider($content) {
    if (!is_front_page()) return $content;
    static $done = false;
    if ($done) return $content;
    $done = true;

    ob_start();
    barel_render_hero_slider();
    barel_render_new_products();
    $prepend = ob_get_clean();
    return $prepend . $content;
}

// Also hook into wp_body_open / genesis / woodmart hooks for better placement
add_action('wp_body_open', 'barel_hero_slider_body_open', 5);
function barel_hero_slider_body_open() {
    // This fires too early; actual output via loop hooks below
}

// For Woodmart / WooCommerce / page builders, also hook into loop hooks
add_action('woodmart_before_page_wrapper', 'barel_output_homepage_blocks', 5);
function barel_output_homepage_blocks() {
    if (!is_front_page()) return;
    barel_render_hero_slider();
    barel_render_new_products();
}

function barel_render_hero_slider() {
    $base = 'https://barelofir.co.il/wp-content/uploads/sliders/';
    $slides = [
        ['name' => 'drills',   'desktop' => 'drills_desktop.jpg',   'mobile' => 'drills_mobile.jpg'],
        ['name' => 'washers',  'desktop' => 'washers_desktop.jpg',  'mobile' => 'washers_mobile.jpg'],
        ['name' => 'signet',   'desktop' => 'signet_desktop.jpg',   'mobile' => 'signet_mobile.jpg'],
    ];
    ?>
<div id="barel-hero-slider" dir="rtl">
    <?php foreach ($slides as $i => $slide): ?>
    <div class="bs-slide <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
        <picture>
            <source media="(min-width: 768px)" srcset="<?php echo esc_url($base . $slide['desktop']); ?>">
            <img src="<?php echo esc_url($base . $slide['mobile']); ?>"
                 alt="<?php echo esc_attr($slide['name']); ?>"
                 loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>">
        </picture>
    </div>
    <?php endforeach; ?>

    <button class="bs-arrow bs-arrow-right" aria-label="הבא">&#8250;</button>
    <button class="bs-arrow bs-arrow-left"  aria-label="הקודם">&#8249;</button>

    <div class="bs-dots">
        <?php for ($i = 0; $i < count($slides); $i++): ?>
        <button class="bs-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-dot="<?php echo $i; ?>"></button>
        <?php endfor; ?>
    </div>
</div>
    <?php
}

function barel_render_new_products() {
    $args = [
        'post_type'      => 'product',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'posts_per_page' => 20,
        'post_status'    => 'publish',
    ];
    $products = get_posts($args);
    if (empty($products)) return;

    $first4  = array_slice($products, 0, 4);
    $rest    = array_slice($products, 4);

    ?>
<div id="barel-new-products" dir="rtl">
    <h2>מוצרים חדשים</h2>
    <div class="barel-products-grid">
        <?php foreach ($first4 as $p): barel_product_card($p); endforeach; ?>
    </div>

    <?php if (!empty($rest)): ?>
    <div class="barel-slider-heading">עוד מוצרים חדשים</div>
    <div class="barel-products-slider-wrap">
        <button class="bps-arrow bps-arrow-right" aria-label="הבא">&#8250;</button>
        <div class="barel-products-slider" id="bps-track">
            <?php foreach ($rest as $p): barel_product_card($p); endforeach; ?>
        </div>
        <button class="bps-arrow bps-arrow-left" aria-label="הקודם">&#8249;</button>
    </div>
    <?php endif; ?>
</div>
    <?php
}

function barel_product_card($post) {
    $product = wc_get_product($post->ID);
    if (!$product) return;
    $title = get_the_title($post->ID);
    $price = $product->get_price_html();
    $img   = get_the_post_thumbnail_url($post->ID, 'woocommerce_thumbnail');
    if (!$img) $img = wc_placeholder_img_src();
    $url   = get_permalink($post->ID);
    $cart_url = $product->is_purchasable() ? esc_url(wc_get_cart_url() . '?add-to-cart=' . $post->ID) : esc_url($url);
    ?>
<div class="barel-product-card">
    <a href="<?php echo esc_url($url); ?>">
        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
    </a>
    <div class="bpc-title"><?php echo esc_html($title); ?></div>
    <div class="bpc-price"><?php echo $price; ?></div>
    <a href="<?php echo $cart_url; ?>" class="bpc-btn">הוסף לסל</a>
</div>
    <?php
}

function barel_hero_slider_js() {
    if (!is_front_page()) return;
    ?>
<script>
(function(){
    var slider = document.getElementById('barel-hero-slider');
    if (!slider) return;
    var slides = slider.querySelectorAll('.bs-slide');
    var dots   = slider.querySelectorAll('.bs-dot');
    var total  = slides.length;
    var current = 0;
    var timer;

    function goTo(n) {
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = (n + total) % total;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    function startAuto() {
        clearInterval(timer);
        timer = setInterval(next, 5000);
    }

    slider.querySelector('.bs-arrow-right').addEventListener('click', function(){ next(); startAuto(); });
    slider.querySelector('.bs-arrow-left').addEventListener('click',  function(){ prev(); startAuto(); });

    dots.forEach(function(dot) {
        dot.addEventListener('click', function(){
            goTo(parseInt(this.getAttribute('data-dot')));
            startAuto();
        });
    });

    slider.addEventListener('mouseenter', function(){ clearInterval(timer); });
    slider.addEventListener('mouseleave', startAuto);

    startAuto();

    // Products slider arrows
    var track = document.getElementById('bps-track');
    if (track) {
        var wrap = track.closest('.barel-products-slider-wrap');
        wrap.querySelector('.bps-arrow-right').addEventListener('click', function(){
            track.scrollBy({ left: -240, behavior: 'smooth' });
        });
        wrap.querySelector('.bps-arrow-left').addEventListener('click', function(){
            track.scrollBy({ left: 240, behavior: 'smooth' });
        });
    }
})();
</script>
    <?php
}

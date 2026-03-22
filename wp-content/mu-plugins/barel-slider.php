<?php
/**
 * Plugin Name: Barel Hero Slider & New Products
 * Description: Hero slider on homepage + new products grid/slider section
 * Version: 2.0
 */

if (!defined('ABSPATH')) exit;

add_action('wp_head', 'barel_slider_css', 5);
function barel_slider_css() {
    if (!is_front_page()) return;
    ?>
<style id="barel-slider-style">
#barel-hero-slider {
    position: relative; width: 100%; overflow: hidden;
    background: #000; z-index: 100; margin-top: 0; direction: rtl;
}
.bhs-track { display: flex; transition: transform 0.5s ease; will-change: transform; }
.bhs-slide { min-width: 100%; flex-shrink: 0; }
.bhs-slide picture { display: block; width: 100%; }
.bhs-slide img { width: 100%; height: 620px; object-fit: cover; display: block; }
.bhs-arrow {
    position: absolute; top: 50%; transform: translateY(-50%); z-index: 10;
    background: rgba(255,255,255,0.25); color: #fff; border: none;
    width: 44px; height: 44px; border-radius: 50%; font-size: 20px;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    transition: background 0.2s; backdrop-filter: blur(4px);
}
.bhs-arrow:hover { background: rgba(227,0,15,0.8); }
.bhs-prev { right: 15px; }
.bhs-next { left: 15px; }
.bhs-dots {
    position: absolute; bottom: 15px; left: 50%; transform: translateX(-50%);
    z-index: 10; display: flex; gap: 8px;
}
.bhs-dot {
    width: 10px; height: 10px; border-radius: 50%;
    background: rgba(255,255,255,0.5); border: none; cursor: pointer; padding: 0;
    transition: background 0.2s;
}
.bhs-dot.active { background: #fff; }
@media (max-width: 767px) {
    .bhs-slide img { height: auto; }
    .bhs-arrow { width: 36px; height: 36px; font-size: 15px; }
}
#barel-new-products {
    direction: rtl; padding: 40px 20px; max-width: 1400px; margin: 0 auto; box-sizing: border-box;
}
#barel-new-products h2 { font-size: 2rem; margin-bottom: 30px; color: #222; font-weight: 700; }
.barel-products-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; margin-bottom: 40px; }
.barel-product-card {
    background: #fff; border: 1px solid #e5e5e5; border-radius: 8px; overflow: hidden;
    text-align: center; transition: box-shadow 0.2s, transform 0.2s; display: flex; flex-direction: column;
}
.barel-product-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.12); transform: translateY(-3px); }
.bpc-img-link { display: block; background: #fafafa; }
.barel-product-card img { width: 100%; height: 200px; object-fit: contain; padding: 10px; display: block; }
.bpc-body { padding: 10px 12px 14px; display: flex; flex-direction: column; flex: 1; }
.bpc-title {
    font-size: 0.95rem; font-weight: 600; color: #222; min-height: 44px;
    margin-bottom: 6px; text-decoration: none; display: block; line-height: 1.4;
}
.bpc-title:hover { color: #e3000f; }
.bpc-price { font-size: 1.1rem; font-weight: 700; color: #e3000f; margin-bottom: 10px; }
.bpc-price ins { text-decoration: none; }
.bpc-btn {
    display: block; padding: 9px 0; background: #e3000f; color: #fff;
    border: none; border-radius: 5px; font-size: 0.9rem; cursor: pointer;
    text-decoration: none; transition: background 0.2s; margin-top: auto; text-align: center;
}
.bpc-btn:hover { background: #b80000; color: #fff; }
.barel-more-heading { font-size: 1.4rem; font-weight: 700; margin-bottom: 16px; color: #222; }
.barel-products-slider-wrap { position: relative; padding: 0 50px; }
.barel-products-slider {
    display: flex; gap: 20px; overflow-x: auto; scroll-behavior: smooth;
    padding-bottom: 10px; -ms-overflow-style: none; scrollbar-width: none;
}
.barel-products-slider::-webkit-scrollbar { display: none; }
.barel-products-slider .barel-product-card { min-width: 220px; max-width: 220px; flex-shrink: 0; }
.bps-arr {
    position: absolute; top: 50%; transform: translateY(-50%); z-index: 5;
    background: rgba(0,0,0,0.5); color: #fff; border: none;
    width: 42px; height: 42px; border-radius: 50%; font-size: 20px;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    transition: background 0.2s; padding: 0;
}
.bps-arr:hover { background: #e3000f; }
.bps-right { right: 0; } .bps-left { left: 0; }
@media (max-width: 767px) {
    .barel-products-grid { grid-template-columns: repeat(2,1fr); }
    .barel-products-slider-wrap { padding: 0 40px; }
}
</style>
    <?php
}

add_action('wp_body_open', 'barel_homepage_output', 5);
function barel_homepage_output() {
    if (!is_front_page()) return;
    static $done = false; if ($done) return; $done = true;
    barel_render_hero_slider();
    barel_render_new_products();
}

add_action('woodmart_before_page_wrapper', 'barel_homepage_output_wd', 5);
function barel_homepage_output_wd() {
    if (!is_front_page()) return;
    static $done_wd = false; if ($done_wd) return; $done_wd = true;
    barel_render_hero_slider();
    barel_render_new_products();
}

add_filter('the_content', 'barel_prepend_slider_to_content', 99);
function barel_prepend_slider_to_content($content) {
    if (!is_front_page()) return $content;
    static $done_c = false; if ($done_c) return $content; $done_c = true;
    ob_start();
    barel_render_hero_slider();
    barel_render_new_products();
    return ob_get_clean() . $content;
}

function barel_render_hero_slider() {
    $base = 'https://barelofir.co.il/wp-content/uploads/sliders/';
    $slides = array(
        array('desktop' => $base.'drills_desktop.jpg',  'mobile' => $base.'drills_mobile.jpg',  'alt' => '\u05de\u05e7\u05d3\u05d7\u05d5\u05ea'),
        array('desktop' => $base.'washers_desktop.jpg', 'mobile' => $base.'washers_mobile.jpg', 'alt' => '\u05de\u05db\u05d5\u05e0\u05d5\u05ea \u05db\u05d1\u05d9\u05e1\u05d4'),
        array('desktop' => $base.'signet_desktop.jpg',  'mobile' => $base.'signet_mobile.jpg',  'alt' => '\u05d7\u05ea\u05de\u05d5\u05ea'),
    );
    $alts = array(
        json_decode('"\u05de\u05e7\u05d3\u05d7\u05d5\u05ea"'),
        json_decode('"\u05de\u05db\u05d5\u05e0\u05d5\u05ea \u05db\u05d1\u05d9\u05e1\u05d4"'),
        json_decode('"\u05d7\u05ea\u05de\u05d5\u05ea"'),
    );
    echo '<div id="barel-hero-slider" class="barel-hero-slider" dir="rtl">';
    echo '<div class="bhs-track" id="bhs-track">';
    $i = 0;
    foreach ($slides as $slide) {
        $loading = $i === 0 ? 'eager' : 'lazy';
        echo '<div class="bhs-slide">';
        echo '<picture>';
        echo '<source media="(max-width: 767px)" srcset="' . esc_url($slide['mobile']) . '">';
        echo '<img src="' . esc_url($slide['desktop']) . '" alt="' . esc_attr($alts[$i]) . '" loading="' . $loading . '">';
        echo '</picture></div>';
        $i++;
    }
    echo '</div>';
    echo '<button class="bhs-arrow bhs-prev" aria-label="prev">&#10094;</button>';
    echo '<button class="bhs-arrow bhs-next" aria-label="next">&#10095;</button>';
    echo '<div class="bhs-dots">';
    for ($j = 0; $j < 3; $j++) {
        $active = $j === 0 ? ' active' : '';
        echo '<button class="bhs-dot' . $active . '" data-idx="' . $j . '"></button>';
    }
    echo '</div></div>';
}

function barel_render_new_products() {
    if (!function_exists('wc_get_product')) return;
    $products = get_posts(array(
        'post_type' => 'product', 'orderby' => 'date', 'order' => 'DESC',
        'posts_per_page' => 20, 'post_status' => 'publish',
    ));
    if (empty($products)) return;
    $first4 = array_slice($products, 0, 4);
    $rest   = array_slice($products, 4);
    $title_new  = json_decode('"\u05de\u05d5\u05e6\u05e8\u05d9\u05dd \u05d7\u05d3\u05e9\u05d9\u05dd"');
    $title_more = json_decode('"\u05e2\u05d5\u05d3 \u05de\u05d5\u05e6\u05e8\u05d9\u05dd \u05d7\u05d3\u05e9\u05d9\u05dd"');
    echo '<div id="barel-new-products" dir="rtl">';
    echo '<h2>' . esc_html($title_new) . '</h2>';
    echo '<div class="barel-products-grid">';
    foreach ($first4 as $p) barel_product_card($p);
    echo '</div>';
    if (!empty($rest)) {
        echo '<div class="barel-more-heading">' . esc_html($title_more) . '</div>';
        echo '<div class="barel-products-slider-wrap">';
        echo '<button class="bps-arr bps-right" id="bps-prev">&#10094;</button>';
        echo '<div class="barel-products-slider" id="bps-track">';
        foreach ($rest as $p) barel_product_card($p);
        echo '</div>';
        echo '<button class="bps-arr bps-left" id="bps-next">&#10095;</button>';
        echo '</div>';
    }
    echo '</div>';
}

function barel_product_card($post_obj) {
    $product = wc_get_product($post_obj->ID);
    if (!$product) return;
    $title   = get_the_title($post_obj->ID);
    $price   = $product->get_price_html();
    $img     = get_the_post_thumbnail_url($post_obj->ID, 'woocommerce_thumbnail');
    if (!$img) $img = wc_placeholder_img_src();
    $url     = get_permalink($post_obj->ID);
    $add_lbl = json_decode('"\u05d4\u05d5\u05e1\u05e3 \u05dc\u05e1\u05dc"');
    $btn_url = ($product->is_purchasable() && $product->is_in_stock())
        ? esc_url(home_url('/?add-to-cart=' . $post_obj->ID))
        : esc_url($url);
    echo '<div class="barel-product-card">';
    echo '<a href="' . esc_url($url) . '" class="bpc-img-link">';
    echo '<img src="' . esc_url($img) . '" alt="' . esc_attr($title) . '" loading="lazy">';
    echo '</a>';
    echo '<div class="bpc-body">';
    echo '<a href="' . esc_url($url) . '" class="bpc-title">' . esc_html($title) . '</a>';
    echo '<div class="bpc-price">' . wp_kses_post($price) . '</div>';
    echo '<a href="' . $btn_url . '" class="bpc-btn">' . esc_html($add_lbl) . '</a>';
    echo '</div></div>';
}

add_action('wp_footer', 'barel_slider_js', 20);
function barel_slider_js() {
    if (!is_front_page()) return;
    ?>
<script id="barel-slider-js">
(function(){
    'use strict';
    var heroSlider = document.getElementById('barel-hero-slider');
    if (heroSlider) {
        var track = document.getElementById('bhs-track');
        var dots = heroSlider.querySelectorAll('.bhs-dot');
        var total = 3;
        var current = 0;
        var timer;
        function goTo(n) {
            current = ((n % total) + total) % total;
            track.style.transform = 'translateX(' + (current * 100) + '%)';
            dots.forEach(function(d, i){ d.classList.toggle('active', i === current); });
        }
        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }
        function startAuto() { clearInterval(timer); timer = setInterval(next, 5000); }
        heroSlider.querySelector('.bhs-prev').addEventListener('click', function(){ prev(); startAuto(); });
        heroSlider.querySelector('.bhs-next').addEventListener('click', function(){ next(); startAuto(); });
        dots.forEach(function(dot){
            dot.addEventListener('click', function(){
                goTo(parseInt(this.getAttribute('data-idx'), 10)); startAuto();
            });
        });
        heroSlider.addEventListener('mouseenter', function(){ clearInterval(timer); });
        heroSlider.addEventListener('mouseleave', startAuto);
        track.style.transform = 'translateX(0)';
        startAuto();
    }
    var bpsTrack = document.getElementById('bps-track');
    if (bpsTrack) {
        var bpsPrev = document.getElementById('bps-prev');
        var bpsNext = document.getElementById('bps-next');
        if (bpsPrev) bpsPrev.addEventListener('click', function(){ bpsTrack.scrollBy({left:-240,behavior:'smooth'}); });
        if (bpsNext) bpsNext.addEventListener('click', function(){ bpsTrack.scrollBy({left:240,behavior:'smooth'}); });
    }
})();
</script>
    <?php
}

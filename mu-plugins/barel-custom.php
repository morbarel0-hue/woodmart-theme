<?php
/**
 * Plugin Name: Barel Custom Design
 * Description: Complete site redesign - KSP/SuperPharm style Hebrew RTL ecommerce
 * Version: 2.0
 * Author: Barel Dev
 */
if (!defined('ABSPATH')) exit;

// ─── 1. Enqueue Heebo font + main CSS ─────────────────────────────────────────
add_action('wp_head', function() {
    // Heebo Google Font
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;700;900&display=swap" rel="stylesheet">';
    echo '<style id="barel-main-css">';
?>
/* ─── BAREL MAIN STYLES ─── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html, body {
  font-family: 'Heebo', Arial, sans-serif !important;
  direction: rtl;
  background: #FFFFFF;
  color: #333333;
  font-size: 14px;
  line-height: 1.5;
}

/* ─── ANNOUNCEMENT BAR ─── */
.barel-announce-bar {
  background: #1a1a1a;
  color: #FFFFFF;
  text-align: center;
  padding: 8px 20px;
  font-size: 13px;
  font-weight: 400;
  letter-spacing: 0.3px;
}
.barel-announce-bar a { color: #FFD700; text-decoration: none; }

/* ─── GLOBAL CONTAINER ─── */
.barel-container, .site-container-custom {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 20px;
}

/* ─── HEADER OVERRIDES ─── */
#site-header, .woodmart-header, .site-header, header.header-main {
  background: #FFFFFF !important;
  border-bottom: 2px solid #e5e5e5 !important;
  box-shadow: 0 1px 4px rgba(0,0,0,0.08) !important;
  position: sticky !important;
  top: 0 !important;
  z-index: 1000 !important;
}
.woodmart-header-main, .header-main {
  min-height: 70px !important;
  display: flex !important;
  align-items: center !important;
}

/* Logo */
.site-logo, .woodmart-logo, .logo-wrap img, header .logo img {
  max-height: 55px !important;
  width: auto !important;
}

/* ─── NAV BAR ─── */
#woodmart-sticky-header .woodmart-navigation,
.woodmart-navigation, nav.main-navigation, .site-navigation,
#site-navigation, .main-nav {
  background: #1a1a1a !important;
}
.woodmart-navigation a, nav.main-navigation a, .site-navigation a, .main-nav a,
#woodmart-sticky-header .woodmart-navigation a {
  color: #FFFFFF !important;
  font-family: 'Heebo', Arial, sans-serif !important;
  font-size: 14px !important;
  font-weight: 500 !important;
  padding: 12px 16px !important;
  display: inline-block !important;
  text-decoration: none !important;
  transition: background 0.2s, color 0.2s !important;
}
.woodmart-navigation a:hover, nav.main-navigation a:hover, .site-navigation a:hover {
  background: #CC0000 !important;
  color: #FFFFFF !important;
}
/* Dropdown */
.woodmart-navigation .sub-menu, nav.main-navigation .sub-menu {
  background: #FFFFFF !important;
  border: 1px solid #e5e5e5 !important;
  border-top: 2px solid #CC0000 !important;
  min-width: 200px !important;
  box-shadow: 0 4px 12px rgba(0,0,0,0.12) !important;
}
.woodmart-navigation .sub-menu a, nav.main-navigation .sub-menu a {
  color: #333333 !important;
  background: transparent !important;
  padding: 10px 16px !important;
  font-weight: 400 !important;
  border-bottom: 1px solid #f0f0f0 !important;
}
.woodmart-navigation .sub-menu a:hover, nav.main-navigation .sub-menu a:hover {
  background: #f5f5f5 !important;
  color: #CC0000 !important;
}

/* ─── HOMEPAGE SLIDER ─── */
.barel-slider-wrap {
  position: relative;
  width: 100%;
  max-width: 1280px;
  margin: 0 auto 24px;
  overflow: hidden;
  background: #1a1a1a;
  border-radius: 0;
}
.barel-slider {
  display: flex;
  transition: transform 0.5s cubic-bezier(0.4,0,0.2,1);
  width: 100%;
}
.barel-slide {
  min-width: 100%;
  display: none;
  position: relative;
}
.barel-slide.active { display: block; }
.barel-slide img {
  width: 100%;
  height: auto;
  max-height: 400px;
  object-fit: cover;
  display: block;
}
.barel-slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0,0,0,0.5);
  color: #fff;
  border: none;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  font-size: 28px;
  cursor: pointer;
  z-index: 10;
  line-height: 1;
  transition: background 0.2s;
}
.barel-slider-btn:hover { background: #CC0000; }
.barel-prev { right: 16px; }
.barel-next { left: 16px; }
.barel-dots {
  position: absolute;
  bottom: 12px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 8px;
}
.barel-dot {
  width: 10px; height: 10px;
  border-radius: 50%;
  background: rgba(255,255,255,0.5);
  cursor: pointer;
  transition: background 0.2s;
}
.barel-dot.active { background: #FFFFFF; }

/* ─── SECTIONS ─── */
.barel-section {
  max-width: 1280px;
  margin: 0 auto 32px;
  padding: 0 20px;
}
.barel-section-title {
  font-family: 'Heebo', Arial, sans-serif !important;
  font-size: 22px !important;
  font-weight: 700 !important;
  color: #1a1a1a !important;
  margin-bottom: 20px !important;
  padding-bottom: 10px !important;
  border-bottom: 3px solid #CC0000 !important;
  display: inline-block !important;
}

/* ─── CATEGORY GRID ─── */
.barel-cat-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 16px;
}
.barel-cat-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px 10px;
  background: #FFFFFF;
  border: 1px solid #e5e5e5;
  border-radius: 8px;
  text-decoration: none;
  color: #333333;
  transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
  text-align: center;
}
.barel-cat-card:hover {
  border-color: #CC0000;
  box-shadow: 0 4px 16px rgba(204,0,0,0.12);
  transform: translateY(-2px);
  color: #CC0000;
}
.barel-cat-icon {
  font-size: 36px;
  margin-bottom: 10px;
  line-height: 1;
}
.barel-cat-name {
  font-size: 13px;
  font-weight: 500;
  line-height: 1.3;
}

/* ─── TRUST BAR ─── */
.barel-trust-bar {
  background: #f5f5f5;
  border-top: 1px solid #e5e5e5;
  border-bottom: 1px solid #e5e5e5;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 40px;
  padding: 16px 20px;
  margin-bottom: 32px;
}
.barel-trust-item {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 500;
  color: #444;
}
.barel-trust-icon { font-size: 20px; }

/* ─── CTA SECTION ─── */
.barel-cta-section {
  background: #1a1a1a;
  color: #FFFFFF;
  text-align: center;
  padding: 48px 20px;
  margin-top: 40px;
}
.barel-cta-section h2 {
  font-family: 'Heebo', Arial, sans-serif !important;
  font-size: 28px !important;
  font-weight: 700 !important;
  margin-bottom: 12px !important;
  color: #FFFFFF !important;
}
.barel-cta-section p {
  font-size: 16px;
  color: #cccccc;
  margin-bottom: 24px;
}
.barel-cta-btn {
  display: inline-block;
  background: #CC0000;
  color: #FFFFFF;
  padding: 14px 36px;
  border-radius: 4px;
  font-size: 16px;
  font-weight: 700;
  text-decoration: none;
  transition: background 0.2s;
}
.barel-cta-btn:hover { background: #aa0000; color: #fff; }

/* ─── PRODUCT CARDS ─── */
.woocommerce ul.products li.product,
.woodmart-products .product-item,
ul.products li.product {
  border: 1px solid #e5e5e5 !important;
  border-radius: 8px !important;
  overflow: hidden !important;
  transition: box-shadow 0.2s, transform 0.2s !important;
  background: #fff !important;
}
.woocommerce ul.products li.product:hover,
ul.products li.product:hover {
  box-shadow: 0 4px 20px rgba(0,0,0,0.12) !important;
  transform: translateY(-3px) !important;
}
.woocommerce ul.products li.product .button,
ul.products li.product .button,
.woocommerce a.button, .woocommerce button.button {
  background: #CC0000 !important;
  color: #FFFFFF !important;
  border-radius: 4px !important;
  font-family: 'Heebo', Arial, sans-serif !important;
  font-weight: 600 !important;
  transition: background 0.2s !important;
  border: none !important;
}
.woocommerce ul.products li.product .button:hover,
.woocommerce a.button:hover, .woocommerce button.button:hover {
  background: #aa0000 !important;
}
.woocommerce ul.products li.product .price,
ul.products li.product .price {
  color: #CC0000 !important;
  font-weight: 700 !important;
  font-size: 16px !important;
}
.woocommerce span.onsale {
  background: #CC0000 !important;
  color: #FFFFFF !important;
  border-radius: 4px !important;
  font-family: 'Heebo', Arial, sans-serif !important;
}

/* ─── FOOTER ─── */
.site-footer, #colophon, footer.footer-main, .woodmart-footer {
  background: #1a1a1a !important;
  color: #cccccc !important;
  font-family: 'Heebo', Arial, sans-serif !important;
}
.site-footer a, footer a { color: #cccccc !important; }
.site-footer a:hover, footer a:hover { color: #CC0000 !important; }
.site-footer h3, footer h3, .footer-widget-title {
  color: #FFFFFF !important;
  font-family: 'Heebo', Arial, sans-serif !important;
  font-weight: 700 !important;
}

/* ─── GLOBAL FONT OVERRIDE ─── */
body, p, a, span, div, li, td, th, input, button, select, textarea,
h1, h2, h3, h4, h5, h6 {
  font-family: 'Heebo', Arial, sans-serif !important;
}

/* ─── WOOCOMMERCE FORM FIXES ─── */
.woocommerce input[type="text"],
.woocommerce input[type="email"],
.woocommerce input[type="search"],
.woocommerce textarea,
.woocommerce select,
input[type="text"], input[type="email"], input[type="search"],
input[type="password"], textarea, select {
  font-family: 'Heebo', Arial, sans-serif !important;
  direction: rtl !important;
  border: 1px solid #e5e5e5 !important;
  border-radius: 4px !important;
  padding: 10px 14px !important;
}
.woocommerce input[type="text"]:focus,
.woocommerce input[type="email"]:focus,
input:focus, select:focus, textarea:focus {
  border-color: #CC0000 !important;
  outline: none !important;
  box-shadow: 0 0 0 2px rgba(204,0,0,0.1) !important;
}

/* ─── SEARCH BAR ─── */
.woodmart-search-form, .search-form,
header .search-form, .site-search {
  direction: rtl !important;
}
.woodmart-search-form input, .search-form input[type="search"] {
  border-radius: 4px 0 0 4px !important;
  border: 1px solid #e5e5e5 !important;
  padding: 10px 16px !important;
  font-family: 'Heebo', Arial, sans-serif !important;
}
.woodmart-search-form button, .search-form button[type="submit"] {
  background: #CC0000 !important;
  color: #fff !important;
  border: none !important;
  border-radius: 0 4px 4px 0 !important;
  padding: 10px 18px !important;
  cursor: pointer !important;
}

/* ─── MOBILE RESPONSIVE ─── */
@media (max-width: 1024px) {
  .barel-cat-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 768px) {
  .barel-cat-grid { grid-template-columns: repeat(3, 1fr); gap: 10px; }
  .barel-trust-bar { flex-wrap: wrap; gap: 16px; }
  .barel-cat-icon { font-size: 28px; }
  .barel-cat-name { font-size: 12px; }
  .barel-section-title { font-size: 18px !important; }
  .barel-slider-btn { width: 36px; height: 36px; font-size: 22px; }
}
@media (max-width: 480px) {
  .barel-cat-grid { grid-template-columns: repeat(2, 1fr); }
  .barel-trust-bar { display: none; }
}

/* ─── WOODMART SPECIFIC OVERRIDES ─── */
.woodmart-header .woodmart-logo-wrap { display: flex; align-items: center; }
.woodmart-cart-button, .woodmart-account-button { color: #333333 !important; }
.woodmart-cart-button:hover, .woodmart-account-button:hover { color: #CC0000 !important; }
.woodmart-cart-count { background: #CC0000 !important; color: #fff !important; }

/* Fix WoodMart header height */
.woodmart-header-main .container { max-width: 1280px !important; }

<?php echo '</style>'; }, 1);

// ─── 2. Announcement bar ──────────────────────────────────────────────────────
add_action('wp_body_open', function() {
    echo '<div class="barel-announce-bar">';
    echo '&#128666; משלוח חינם בקנייה מעל &#8362;299 &nbsp;|&nbsp; &#128222; שירות לקוחות מקצועי &nbsp;|&nbsp; &#9989; אחריות יצרן מלאה';
    echo '</div>';
}, 1);

// ─── 3. Logo JS fix ───────────────────────────────────────────────────────────
add_action('wp_footer', function() {
?>
<script id="barel-logo-fix">
(function(){
  var logoUrl = 'https://barelofir.co.il/wp-content/uploads/2026/03/barel-logo.svg';
  function fixLogo() {
    var imgs = document.querySelectorAll('header img, .site-logo img, .woodmart-logo img, .logo img, img[class*="logo"]');
    imgs.forEach(function(img){
      var src = (img.src || '').toLowerCase();
      if (src.indexOf('mega') > -1 || src.indexOf('electric') > -1 || src.indexOf('logo') > -1) {
        if (src.indexOf('barel') === -1) {
          img.src = logoUrl;
          img.srcset = logoUrl;
          img.alt = 'בר-אל אספקה טכנית';
          img.style.maxHeight = '55px';
          img.style.width = 'auto';
        }
      }
    });
    // Also fix background-image logos
    var anchors = document.querySelectorAll('a[class*="logo"], .site-branding a');
    anchors.forEach(function(a){
      var bg = window.getComputedStyle(a).backgroundImage;
      if (bg && bg !== 'none' && bg.indexOf('barel') === -1) {
        a.style.backgroundImage = 'url(' + logoUrl + ')';
      }
    });
  }
  document.addEventListener('DOMContentLoaded', fixLogo);
  window.addEventListener('load', fixLogo);
  setTimeout(fixLogo, 500);
  setTimeout(fixLogo, 1500);
})();
</script>
<?php
}, 20);

// ─── 4. Hebrew translations JS ───────────────────────────────────────────────
add_action('wp_footer', function() {
?>
<script id="barel-hebrew-translations">
(function(){
  var translations = {
    'Add to cart': 'הוסף לסל',
    'In stock': 'במלאי',
    'Out of stock': 'אזל המלאי',
    'Login': 'התחברות',
    'Register': 'הרשמה',
    'My account': 'החשבון שלי',
    'Cart': 'סל קניות',
    'Search': 'חיפוש',
    'Shop': 'החנות',
    'Sale!': 'מבצע!',
    'Read more': 'פרטים נוספים',
    'Continue shopping': 'המשך קניות',
    'Checkout': 'לתשלום',
    'Place order': 'בצע הזמנה',
    'Update cart': 'עדכן סל',
    'Apply coupon': 'החל קופון',
    'Coupon code': 'קוד קופון',
    'Your cart is currently empty.': 'הסל שלך ריק.',
    'Remove this item': 'הסר פריט',
    'Product quantity': 'כמות',
    'Loading': 'טוען...',
    'Select options': 'בחר אפשרויות',
    'View cart': 'לצפייה בסל'
  };

  function translateNode(node) {
    if (node.nodeType === 3) { // Text node
      var text = node.textContent.trim();
      if (translations[text]) {
        node.textContent = node.textContent.replace(text, translations[text]);
      }
    } else if (node.nodeType === 1) {
      var val = node.getAttribute('value') || node.getAttribute('placeholder') || '';
      if (val && translations[val]) {
        if (node.getAttribute('value')) node.setAttribute('value', translations[val]);
        if (node.getAttribute('placeholder')) node.setAttribute('placeholder', translations[val]);
      }
      // aria-label
      var aria = node.getAttribute('aria-label') || '';
      if (aria && translations[aria]) node.setAttribute('aria-label', translations[aria]);
      Array.from(node.childNodes).forEach(translateNode);
    }
  }

  function runTranslations() {
    translateNode(document.body);
  }

  document.addEventListener('DOMContentLoaded', runTranslations);
  window.addEventListener('load', runTranslations);
  // Also run after AJAX (WooCommerce cart updates)
  document.addEventListener('ajaxComplete', function(){ setTimeout(runTranslations, 300); });
  jQuery && jQuery(document).on('updated_cart_totals added_to_cart', function(){ setTimeout(runTranslations, 300); });
})();
</script>
<?php
}, 25);

// ─── 5. Slider JS ─────────────────────────────────────────────────────────────
add_action('wp_footer', function() {
  if (!is_front_page() && !is_page(2024)) return;
?>
<script id="barel-slider-js">
var barelCurrentSlide = 0;
var barelSlides, barelDots, barelTimer;

function barelGoTo(n) {
  if (!barelSlides || !barelSlides.length) return;
  barelSlides[barelCurrentSlide].classList.remove('active');
  if (barelDots && barelDots[barelCurrentSlide]) barelDots[barelCurrentSlide].classList.remove('active');
  barelCurrentSlide = (n + barelSlides.length) % barelSlides.length;
  barelSlides[barelCurrentSlide].classList.add('active');
  if (barelDots && barelDots[barelCurrentSlide]) barelDots[barelCurrentSlide].classList.add('active');
}
function barelSlide(dir) {
  barelGoTo(barelCurrentSlide + dir);
  clearInterval(barelTimer);
  barelTimer = setInterval(function(){ barelSlide(1); }, 5000);
}
document.addEventListener('DOMContentLoaded', function(){
  barelSlides = document.querySelectorAll('.barel-slide');
  barelDots = document.querySelectorAll('.barel-dot');
  if (barelSlides.length) {
    barelTimer = setInterval(function(){ barelSlide(1); }, 5000);
    // Pause on hover
    var wrap = document.getElementById('barelSlider');
    if (wrap) {
      wrap.addEventListener('mouseenter', function(){ clearInterval(barelTimer); });
      wrap.addEventListener('mouseleave', function(){ barelTimer = setInterval(function(){ barelSlide(1); }, 5000); });
    }
  }
});
</script>
<?php
}, 30);

// ─── 6. Schema Markup ─────────────────────────────────────────────────────────
add_action('wp_head', function() {
  if (!is_front_page()) return;
  $schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'HardwareStore',
    'name' => 'בר-אל אספקה טכנית',
    'description' => 'כלי עבודה, חשמל, אינסטלציה, צבע ועוד — ציוד טכני מקצועי',
    'url' => 'https://barelofir.co.il',
    'logo' => 'https://barelofir.co.il/wp-content/uploads/2026/03/barel-logo.svg',
    'image' => 'https://barelofir.co.il/wp-content/uploads/2026/03/barel-logo.svg',
    'priceRange' => '₪₪',
    'currenciesAccepted' => 'ILS',
    'paymentAccepted' => 'Cash, Credit Card',
    'address' => array(
      '@type' => 'PostalAddress',
      'addressCountry' => 'IL',
      'addressLocality' => 'ישראל'
    ),
    'sameAs' => array()
  );
  echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}, 5);

// ─── 7. Set proper nav menu location ─────────────────────────────────────────
add_filter('wp_nav_menu_args', function($args) {
  // Force menu 116 for primary locations
  if (isset($args['theme_location']) && in_array($args['theme_location'], array('primary', 'main_nav', 'primary_menu', 'header_menu'))) {
    $args['menu'] = 116;
  }
  return $args;
});

// ─── 8. Disable Elementor on front page ──────────────────────────────────────
add_filter('elementor/frontend/builder_content_data', function($data, $post_id) {
  if ($post_id == 2024) return array();
  return $data;
}, 10, 2);

// ─── 9. Fix RTL for WooCommerce ───────────────────────────────────────────────
add_filter('locale', function($locale) {
  return 'he_IL';
});
add_action('after_setup_theme', function() {
  load_textdomain('woocommerce', WP_LANG_DIR . '/plugins/woocommerce-he_IL.mo');
});

<?php
/**
 * Plugin Name: Barel UI Fixes
 * Description: Slider full-width, hide green top bar, logo swap, My Account Hebrew
 * Version: 1.0
 */
if (!defined('ABSPATH')) exit;

/* ══════════════════════════════════════════════════════════════
   CSS fixes
   ══════════════════════════════════════════════════════════════ */
add_action('wp_head', function () { ?>
<style id="barel-ui-fixes">

/* ── 1. Slider full width — no white gaps ── */
#barel-hero-slider,
.bhs-track,
.bhs-slide,
.bhs-slide picture,
.bhs-slide img {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    display: block !important;
    box-sizing: border-box !important;
}
#barel-hero-slider { overflow: hidden !important; }

/* Remove any padding from main content wrapper that causes white edges */
.wd-page-content.main-page-wrapper,
.website-wrapper,
body.home .wd-content-layout,
body.home #main-content {
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    max-width: 100% !important;
}

/* Elementor full-width section fix */
body.home .elementor-section.elementor-section-stretched {
    margin-left: 0 !important;
    margin-right: 0 !important;
}

/* ── 2. Hide green top bar (exact WoodMart class) ── */
.whb-row.whb-top-bar,
.whb-top-bar,
.wd-top-bar,
.whb-6l5y1eay522jehk73pi2 {
    display: none !important;
}

/* ── 3. Force barel logo — hide WoodMart default logo ── */
/* If WoodMart still shows wood-logo-dark.svg, hide it and show ours */
img[src*="wood-logo-dark"],
img[src*="woodmart/images/wood-logo"] {
    content: url('https://barelofir.co.il/wp-content/uploads/2026/03/barel-logo.svg') !important;
    max-width: 180px !important;
    height: auto !important;
}

/* ── 4. My Account — Hebrew text via CSS ── */
/* Target the My Account link text in header */
.wd-header-my-account .wd-tools-element-label,
.whb-header .woodmart-header-my-account-label,
a.wd-my-account-link .wd-tools-element-label,
.woodmart-wishlist-label,
header .header-account .wd-tools-element-label {
    font-size: 0 !important; /* hide original text */
}
.wd-header-my-account .wd-tools-element-label::before,
a.wd-my-account-link .wd-tools-element-label::before {
    content: "החשבון שלי" !important;
    font-size: 13px !important;
}

</style>
<?php
}, 5);

/* ══════════════════════════════════════════════════════════════
   PHP: Change "My Account" menu item text
   ══════════════════════════════════════════════════════════════ */
// Filter nav menu items to rename "My Account"
add_filter('wp_nav_menu_items', function ($items, $args) {
    $items = str_replace('>My account<', '>החשבון שלי<', $items);
    $items = str_replace('>My Account<', '>החשבון שלי<', $items);
    return $items;
}, 10, 2);

// Filter the WooCommerce "My Account" page title
add_filter('the_title', function ($title) {
    if ($title === 'My account' || $title === 'My Account') {
        return 'החשבון שלי';
    }
    return $title;
});

// Filter WooCommerce account endpoint labels
add_filter('woocommerce_account_menu_items', function ($items) {
    return $items; // Keep WooCommerce items as-is (already in Hebrew if RTL set up)
});

/* ══════════════════════════════════════════════════════════════
   PHP: Remove top bar via Woodmart hook
   ══════════════════════════════════════════════════════════════ */
// Try to remove the top bar row via Woodmart's header builder filter
add_filter('woodmart_header_builder_row_output', function ($output, $row_id, $row_data) {
    // If this row contains "ADD ANYTHING HERE", suppress it
    if (isset($row_data['content']) && is_string(serialize($row_data['content']))) {
        $serialized = serialize($row_data['content']);
        if (strpos($serialized, 'ADD ANYTHING') !== false || $row_id === 'top-bar') {
            return '';
        }
    }
    return $output;
}, 10, 3);

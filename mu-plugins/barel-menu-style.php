<?php
/**
 * Plugin Name: Barel Menu Style
 * Description: Main nav styling + hide all secondary menus
 * Version: 2.0
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () { ?>
<style id="barel-menu-css">

/* ══ Hide all other nav elements except main header nav ══ */
#barel-mega-nav,
.wd-nav-sticky,
.wd-sticky-nav,
.wd-nav-vertical {
    display: none !important;
}

/* ══ Main header nav bar — dark background ══ */
.wd-header-nav,
.whb-row.whb-main-nav {
    background: #222 !important;
    box-shadow: 0 2px 6px rgba(0,0,0,.35) !important;
    margin-bottom: 0 !important;
}

/* Force nav container full width */
.wd-header-nav .container,
.wd-header-nav .wd-entry-content {
    max-width: 100% !important;
    padding: 0 20px !important;
}

/* ══ Top-level menu items ══ */
.wd-nav-header > li > a.woodmart-nav-link,
.wd-nav-main > li > a.woodmart-nav-link {
    color: #fff !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    padding: 0 16px !important;
    height: 48px !important;
    line-height: 48px !important;
    display: flex !important;
    align-items: center !important;
    white-space: nowrap !important;
    border-bottom: 3px solid transparent !important;
    transition: border-color .15s, background .15s !important;
    text-decoration: none !important;
}

.wd-nav-header > li > a.woodmart-nav-link:hover,
.wd-nav-header > li.current-menu-item > a.woodmart-nav-link,
.wd-nav-header > li.current-menu-ancestor > a.woodmart-nav-link,
.wd-nav-main > li > a.woodmart-nav-link:hover {
    background: rgba(255,255,255,.07) !important;
    border-bottom-color: #e3000f !important;
    color: #fff !important;
}

/* ══ Dropdown panel ══ */
.wd-nav-header .wd-dropdown,
.wd-nav-main .wd-dropdown,
.wd-nav-header .sub-menu,
.wd-nav-main .sub-menu {
    background: #fff !important;
    border-top: 3px solid #e3000f !important;
    border-radius: 0 0 4px 4px !important;
    box-shadow: 0 6px 24px rgba(0,0,0,.14) !important;
    min-width: 200px !important;
    padding: 6px 0 !important;
    direction: rtl !important;
}

/* Dropdown items */
.wd-nav-header .wd-dropdown li a,
.wd-nav-main .wd-dropdown li a,
.wd-nav-header .sub-menu li a,
.wd-nav-main .sub-menu li a {
    color: #222 !important;
    font-size: 13.5px !important;
    padding: 10px 18px !important;
    display: block !important;
    border-bottom: 1px solid #f5f5f5 !important;
    transition: color .12s, padding-right .12s !important;
    text-decoration: none !important;
    line-height: 1.4 !important;
}

.wd-nav-header .wd-dropdown li:last-child a,
.wd-nav-main .sub-menu li:last-child a {
    border-bottom: none !important;
}

.wd-nav-header .wd-dropdown li a:hover,
.wd-nav-main .sub-menu li a:hover {
    color: #e3000f !important;
    border-right: 3px solid #e3000f !important;
    padding-right: 15px !important;
    background: #fff9f9 !important;
}

/* ══ Caret arrow color ══ */
.wd-nav-header .wd-arrow,
.wd-nav-main .wd-arrow {
    color: rgba(255,255,255,.7) !important;
    fill: rgba(255,255,255,.7) !important;
}

/* ══ Mobile nav (≤ 1024px) ══ */
@media (max-width: 1024px) {
    /* Show mobile nav, hide desktop nav */
    .wd-nav-header { display: none !important; }

    /* Mobile hamburger button — white */
    .wd-nav-opener,
    .woodmart-hamburger,
    .mobile-nav-opener {
        color: #fff !important;
        background: #222 !important;
    }

    /* Mobile nav items */
    .wd-nav-mobile > li > a,
    .mobile-pages-menu > li > a {
        color: #222 !important;
        padding: 12px 16px !important;
        border-bottom: 1px solid #eee !important;
        font-size: 15px !important;
    }

    .wd-nav-mobile .sub-menu,
    .mobile-pages-menu .sub-menu {
        background: #f9f9f9 !important;
        border-right: 3px solid #e3000f !important;
    }

    .wd-nav-mobile .sub-menu li a,
    .mobile-pages-menu .sub-menu li a {
        color: #333 !important;
        padding: 10px 24px !important;
        font-size: 13.5px !important;
    }
}

/* ══ Clear gap between nav and slider ══ */
.whb-row.whb-main-nav + *,
.wd-header-nav + * {
    margin-top: 0 !important;
}

</style>
<?php
}, 8);

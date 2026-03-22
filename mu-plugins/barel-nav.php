<?php
/**
 * Plugin Name: Barel Nav Style
 * Description: Main menu styling — desktop horizontal + mobile hamburger
 * Version: 1.0
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () { ?>
<style id="barel-nav-css">

/* ══════════════════════════════════════════════════════
   Hide everything except the Woodmart main header nav
   ══════════════════════════════════════════════════════ */
#barel-mega-nav,
.wd-nav-sticky,
.wd-sticky-nav,
.wd-side-nav,
nav.wd-nav-vertical { display: none !important; }

/* ══════════════════════════════════════════════════════
   Desktop — horizontal nav bar (#222 bg)
   ══════════════════════════════════════════════════════ */
.wd-header-nav { background: #222 !important; }

/* Nav row full width */
.wd-header-nav .container,
.wd-header-nav .wd-entry-content { max-width: 100% !important; padding: 0 24px !important; }

/* Top-level links */
.wd-nav-main > li > a.woodmart-nav-link,
.wd-nav-header > li > a.woodmart-nav-link {
    color: #fff !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    padding: 0 16px !important;
    height: 48px !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 5px !important;
    border-bottom: 3px solid transparent !important;
    transition: background .15s, border-color .15s !important;
    white-space: nowrap !important;
    text-decoration: none !important;
}

/* Hover / active */
.wd-nav-main > li:hover > a.woodmart-nav-link,
.wd-nav-main > li.current-menu-item > a.woodmart-nav-link,
.wd-nav-main > li.current-menu-ancestor > a.woodmart-nav-link,
.wd-nav-header > li:hover > a.woodmart-nav-link {
    background: rgba(255,255,255,.07) !important;
    border-bottom-color: #e3000f !important;
    color: #fff !important;
}

/* ▼ Caret on items with children */
.wd-nav-main > li.menu-item-has-children > a.woodmart-nav-link::after,
.wd-nav-header > li.menu-item-has-children > a.woodmart-nav-link::after {
    content: "▼" !important;
    font-size: 9px !important;
    opacity: .65 !important;
    margin-right: 2px !important; /* RTL */
    display: inline-block !important;
    transition: transform .2s !important;
}
.wd-nav-main > li.menu-item-has-children:hover > a.woodmart-nav-link::after,
.wd-nav-header > li.menu-item-has-children:hover > a.woodmart-nav-link::after {
    transform: rotate(180deg) !important;
    opacity: 1 !important;
}

/* Woodmart built-in arrow icon — hide (we use CSS ::after) */
.wd-nav-main .wd-arrow,
.wd-nav-header .wd-arrow { display: none !important; }

/* ── Dropdown panel ── */
.wd-nav-main .wd-dropdown,
.wd-nav-header .wd-dropdown,
.wd-nav-main .sub-menu,
.wd-nav-header .sub-menu {
    background: #fff !important;
    border-top: 3px solid #e3000f !important;
    border-radius: 0 0 4px 4px !important;
    box-shadow: 0 6px 24px rgba(0,0,0,.14) !important;
    min-width: 210px !important;
    padding: 4px 0 !important;
    direction: rtl !important;
}

/* Dropdown items */
.wd-nav-main .sub-menu li a,
.wd-nav-header .sub-menu li a,
.wd-nav-main .wd-dropdown li a,
.wd-nav-header .wd-dropdown li a {
    color: #222 !important;
    font-size: 13.5px !important;
    padding: 10px 18px !important;
    display: block !important;
    border-bottom: 1px solid #f5f5f5 !important;
    transition: color .12s, padding-right .12s, background .12s !important;
    text-decoration: none !important;
    background: #fff !important;
}
.wd-nav-main .sub-menu li:last-child a,
.wd-nav-header .sub-menu li:last-child a { border-bottom: none !important; }

/* Dropdown hover */
.wd-nav-main .sub-menu li a:hover,
.wd-nav-header .sub-menu li a:hover,
.wd-nav-main .wd-dropdown li a:hover,
.wd-nav-header .wd-dropdown li a:hover {
    color: #e3000f !important;
    background: #fff9f9 !important;
    padding-right: 22px !important;
    border-right: 3px solid #e3000f !important;
}

/* ══════════════════════════════════════════════════════
   Mobile (≤ 1024px) — hamburger + accordion
   ══════════════════════════════════════════════════════ */
@media (max-width: 1024px) {

    /* Keep desktop nav hidden on mobile — use Woodmart mobile nav */
    .wd-nav-main,
    .wd-nav-header { display: none !important; }

    /* Hamburger button style */
    .woodmart-hamburger,
    .wd-nav-opener,
    button.wd-mob-nav-opener {
        background: #222 !important;
        color: #fff !important;
        border: none !important;
        padding: 10px 14px !important;
        border-radius: 4px !important;
        font-size: 20px !important;
        cursor: pointer !important;
        line-height: 1 !important;
    }

    /* Mobile nav panel */
    .wd-nav-mobile,
    .mobile-pages-menu {
        background: #fff !important;
        direction: rtl !important;
    }

    /* Mobile top-level items */
    .wd-nav-mobile > li > a,
    .mobile-pages-menu > li > a {
        color: #222 !important;
        font-size: 15px !important;
        font-weight: 600 !important;
        padding: 14px 18px !important;
        border-bottom: 1px solid #eee !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        text-decoration: none !important;
    }

    /* Expand arrow on mobile parent items */
    .wd-nav-mobile > li.menu-item-has-children > a::after,
    .mobile-pages-menu > li.menu-item-has-children > a::after {
        content: "▼" !important;
        font-size: 11px !important;
        color: #999 !important;
        transition: transform .2s !important;
    }
    .wd-nav-mobile > li.menu-item-has-children.wd-active > a::after,
    .mobile-pages-menu > li.menu-item-has-children.open > a::after {
        transform: rotate(180deg) !important;
    }

    /* Mobile sub-menu */
    .wd-nav-mobile .sub-menu,
    .mobile-pages-menu .sub-menu {
        background: #f9f9f9 !important;
        border-right: 3px solid #e3000f !important;
        padding: 4px 0 !important;
    }
    .wd-nav-mobile .sub-menu li a,
    .mobile-pages-menu .sub-menu li a {
        color: #444 !important;
        font-size: 13.5px !important;
        padding: 10px 24px !important;
        border-bottom: 1px solid #eee !important;
        display: block !important;
        text-decoration: none !important;
    }
    .wd-nav-mobile .sub-menu li a:hover,
    .mobile-pages-menu .sub-menu li a:hover {
        color: #e3000f !important;
        background: #fff5f5 !important;
    }
}

/* ══ Separator between nav and hero slider ══ */
.wd-header-nav { margin-bottom: 0 !important; border-bottom: none !important; }
#barel-hero-slider { margin-top: 0 !important; }

</style>
<?php
}, 8);

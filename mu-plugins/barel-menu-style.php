<?php
/**
 * Plugin Name: Barel Menu Style
 * Description: Woodmart primary nav styling - dark bg, RTL, red hover
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

add_action('wp_head', 'barel_menu_style_css', 99);
function barel_menu_style_css() {
    ?>
<style>
/* ── Barel Primary Nav Styling ── */
.woodmart-navigation,
.main-nav,
#site-navigation,
.primary-navigation,
.wd-header-nav,
nav.woodmart-navigation,
header .navigation-wrap {
    background: #222 !important;
}
.woodmart-navigation .menu,
.main-nav .menu,
.wd-nav,
.wd-header-nav > ul {
    background: #222;
    padding: 0;
    margin: 0;
    direction: rtl;
}
/* Top-level items */
.woodmart-navigation .menu > li > a,
.main-nav .menu > li > a,
.wd-nav > li > a,
.wd-header-nav > ul > li > a,
.site-header-main nav ul li a {
    color: #fff !important;
    font-weight: 500;
    padding: 14px 18px;
    display: block;
    text-decoration: none;
    transition: color 0.2s, border-bottom 0.2s;
    font-size: 0.95rem;
    letter-spacing: 0.02em;
    border-bottom: 3px solid transparent;
}
.woodmart-navigation .menu > li > a:hover,
.main-nav .menu > li > a:hover,
.wd-nav > li > a:hover,
.wd-header-nav > ul > li > a:hover,
.site-header-main nav ul li a:hover {
    color: #e3000f !important;
    border-bottom-color: #e3000f !important;
}
/* Dropdown sub-menu */
.woodmart-navigation .menu li ul,
.main-nav .menu li ul,
.wd-nav li .sub-menu,
.wd-header-nav > ul > li > ul {
    background: #fff !important;
    box-shadow: 0 4px 18px rgba(0,0,0,0.13);
    border-top: 3px solid #e3000f;
    min-width: 200px;
    border-radius: 0 0 6px 6px;
    direction: rtl;
}
.woodmart-navigation .menu li ul li a,
.main-nav .menu li ul li a,
.wd-nav li .sub-menu li a {
    color: #222 !important;
    padding: 10px 18px;
    font-size: 0.9rem;
    border-bottom: 1px solid #f0f0f0;
    display: block;
}
.woodmart-navigation .menu li ul li a:hover,
.main-nav .menu li ul li a:hover,
.wd-nav li .sub-menu li a:hover {
    color: #e3000f !important;
    background: #fef5f5 !important;
}

/* ── Mobile hamburger ── */
.wd-hamburger,
.woodmart-hamburger,
.mobile-nav-icon,
button.menu-toggle {
    display: flex;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
    padding: 10px;
    background: none;
    border: none;
}
.wd-hamburger span,
.woodmart-hamburger span,
button.menu-toggle span {
    display: block;
    width: 26px;
    height: 2px;
    background: #fff;
    transition: transform 0.3s, opacity 0.3s;
    border-radius: 2px;
}
.wd-hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
.wd-hamburger.active span:nth-child(2) { opacity: 0; }
.wd-hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

@media (max-width: 991px) {
    .wd-nav > li > a,
    .woodmart-navigation .menu > li > a {
        border-bottom: 1px solid #333 !important;
        padding: 12px 16px;
    }
    .woodmart-navigation .menu li ul,
    .wd-nav li .sub-menu {
        position: static !important;
        box-shadow: none;
        border-top: none;
        background: #2a2a2a !important;
    }
    .woodmart-navigation .menu li ul li a,
    .wd-nav li .sub-menu li a {
        color: #ccc !important;
        padding-right: 32px;
    }
}
</style>
    <?php
}

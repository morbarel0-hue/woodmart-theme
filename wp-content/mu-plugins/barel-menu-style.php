<?php
/**
 * Plugin Name: Barel Menu Style
 * Description: Woodmart primary nav styling - dark bg, RTL, red hover + dropdown
 * Version: 1.1
 */

if (!defined('ABSPATH')) exit;

add_action('wp_head', 'barel_menu_style_css', 99);
function barel_menu_style_css() {
    ?>
<style id="barel-menu-style">
/* Barel Primary Nav */
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
    background: #222; padding: 0; margin: 0; direction: rtl;
}
/* Top-level items */
.woodmart-navigation .menu > li > a,
.main-nav .menu > li > a,
.wd-nav > li > a,
.wd-header-nav > ul > li > a {
    color: #fff !important; font-weight: 500; padding: 14px 18px;
    display: block; text-decoration: none; font-size: 0.95rem;
    letter-spacing: 0.02em; border-bottom: 3px solid transparent;
    transition: color 0.2s, border-bottom 0.2s;
}
.woodmart-navigation .menu > li > a:hover,
.main-nav .menu > li > a:hover,
.wd-nav > li > a:hover {
    color: #e3000f !important; border-bottom-color: #e3000f !important;
}
/* Dropdown sub-menu */
.wd-nav .sub-menu,
.woodmart-navigation .menu li .sub-menu,
.main-nav .sub-menu {
    background: #fff !important;
    border-top: 3px solid #e63030 !important;
    box-shadow: 0 4px 16px rgba(0,0,0,0.12) !important;
    min-width: 220px;
    border-radius: 0 0 6px 6px;
    direction: rtl;
}
.wd-nav .sub-menu li a,
.woodmart-navigation .menu li .sub-menu li a,
.main-nav .sub-menu li a {
    color: #222 !important;
    font-size: 14px !important;
    padding: 10px 20px !important;
    border-bottom: 1px solid #f0f0f0 !important;
    display: block !important;
    transition: all 0.2s ease;
}
.wd-nav .sub-menu li a:hover,
.woodmart-navigation .menu li .sub-menu li a:hover,
.main-nav .sub-menu li a:hover {
    color: #e63030 !important;
    background: #fff9f9 !important;
    border-right: 3px solid #e63030 !important;
    padding-right: 17px !important;
}
/* Hamburger */
.wd-hamburger, .woodmart-hamburger, button.menu-toggle {
    display: flex; flex-direction: column; gap: 5px;
    cursor: pointer; padding: 10px; background: none; border: none;
}
.wd-hamburger span, .woodmart-hamburger span, button.menu-toggle span {
    display: block; width: 26px; height: 2px; background: #fff;
    transition: transform 0.3s, opacity 0.3s; border-radius: 2px;
}
/* Mobile */
@media (max-width: 1024px) {
    .wd-nav .sub-menu { display: none; }
    .wd-nav li.is-open > .sub-menu { display: block; }
    .wd-nav > li > a, .woodmart-navigation .menu > li > a {
        border-bottom: 1px solid #333 !important; padding: 12px 16px;
    }
    .woodmart-navigation .menu li .sub-menu,
    .wd-nav li .sub-menu {
        position: static !important; box-shadow: none; border-top: none;
        background: #2a2a2a !important;
    }
    .woodmart-navigation .menu li .sub-menu li a,
    .wd-nav li .sub-menu li a { color: #ccc !important; padding-right: 32px; }
}
</style>
    <?php
}

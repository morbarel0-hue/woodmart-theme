<?php
/* Plugin Name: Barel Brand Colors */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function() { ?>
<style id="barel-colors">
:root {
    --woodmart-primary-color: #CC0000 !important;
    --woodmart-nav-bg: #CC0000 !important;
}
.woodmart-navigation,
.main-nav,
.wd-header-row-bg,
.whb-row.whb-main-header,
[class*="bg-primary"],
.woodmart-bg-primary { background-color: #CC0000 !important; }
.woodmart-color-primary,
a:hover,
.woodmart-primary-color { color: #CC0000 !important; }
.woodmart-btn,
.button,
input[type="submit"],
.add_to_cart_button { background-color: #CC0000 !important; border-color: #CC0000 !important; }
</style>
<?php }, 10);

<?php
/* Plugin Name: Barel Logo CSS */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function() { ?>
<style id="barel-logo-css">
.woodmart-logo img,
.site-logo img,
.woodmart-logo-wrap img,
header .logo img,
.wd-header-logo img {
    height: 80px !important;
    width: auto !important;
    max-width: none !important;
}
@media (max-width: 768px) {
    .woodmart-logo img,
    .site-logo img,
    .woodmart-logo-wrap img,
    header .logo img,
    .wd-header-logo img {
        height: 50px !important;
    }
}
</style>
<?php }, 10);

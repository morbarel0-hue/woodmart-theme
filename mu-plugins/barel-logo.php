<?php
/* Plugin Name: Barel Logo CSS */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function() { ?>
<style id=barel-logo-css>
.site-logo img,
.woodmart-logo img,
.wd-header-logo img,
.wd-main-logo img,
img.custom-logo,
.whb-header .custom-logo {
    height: 65px !important;
    width: auto !important;
    max-width: none !important;
}
@media (max-width: 768px) {
    .site-logo img,
    .woodmart-logo img,
    .wd-header-logo img,
    img.custom-logo {
        height: 45px !important;
    }
}
</style>
<?php }, 10);

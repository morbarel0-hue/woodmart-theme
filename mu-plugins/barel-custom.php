<?php
/* Plugin Name: Bar-El Design v3 */
if(!defined('ABSPATH'))exit;

add_action('template_redirect',function(){
  if(is_front_page()){
    remove_filter('the_content','wpautop');
    remove_filter('the_content','wptexturize');
  }
});

add_shortcode('barel_homepage','barel_hp');
function barel_hp(){ob_start();
$cats=[
  ['&#9889;','כלי עבודה חשמליים','%d7%9b%d7%9c%d7%99-%d7%a2%d7%91%d7%95%d7%93%d7%94-%d7%97%d7%a9%d7%9e%d7%9c%d7%99%d7%99%d7%9d'],
  ['&#128295;','כלי עבודה ידניים','%d7%9b%d7%9c%d7%99-%d7%a2%d7%91%d7%95%d7%93%d7%94-%d7%99%d7%93%d7%a0%d7%99%d7%99%d7%9d'],
  ['&#128161;','חשמל ואלקטרוניקה','%d7%97%d7%a9%d7%9e%d7%9c-%d7%95%d7%90%d7%9c%d7%a7%d7%98%d7%a8%d7%95%d7%a0%d7%99%d7%a7%d7%94'],
  ['&#128296;','אינסטלציה','%d7%90%d7%99%d7%a0%d7%a1%d7%98%d7%9c%d7%a6%d7%99%d7%94'],
  ['&#127912;','צבע ואביזרים','%d7%a6%d7%91%d7%a2%d7%99%d7%9d'],
  ['&#128297;','פרזול','%d7%a4%d7%a8%d7%96%d7%95%d7%9c'],
  ['&#128294;','תאורה','%d7%aa%d7%90%d7%95%d7%a8%d7%94'],
  ['&#127807;','גינון','%d7%92%d7%99%d7%a0%d7%95%d7%9f'],
  ['&#129529;','ניקיון','%d7%a0%d7%99%d7%a7%d7%99%d7%95%d7%9f'],
  ['&#128703;','אביזרי אמבטיה','%d7%90%d7%91%d7%99%d7%96%d7%a8%d7%99-%d7%90%d7%9e%d7%91%d7%98%d7%99%d7%94'],
  ['&#128279;','דבקים וסיליקונים','%d7%93%d7%91%d7%a7%d7%99%d7%9d'],
  ['&#128027;','הדברה','%d7%94%d7%93%d7%91%d7%a8%d7%94'],
];
echo '<div id="b-hp">';
echo '<div class="b-trust"><div class="b-wrap"><div class="b-ti"><span>&#128666;</span><span>משלוח חינם מעל &#8362;299</span></div><div class="b-ti"><span>&#9989;</span><span>מוצרים מקוריים</span></div><div class="b-ti"><span>&#128295;</span><span>מומחים לשירותך</span></div><div class="b-ti"><span>&#128179;</span><span>תשלום מאובטח</span></div></div></div>';
echo '<section class="b-cats"><div class="b-wrap"><h2 class="b-title">קטגוריות</h2><div class="b-cgrid">';
foreach($cats as $c){echo '<a href="/product-category/'.$c[2].'/" class="b-cc"><span class="b-ci">'.$c[0].'</span><span class="b-cn">'.$c[1].'</span></a>';}
echo '</div></div></section>';
echo '<section class="b-prods"><div class="b-wrap"><h2 class="b-title">מוצרים חדשים</h2>';
echo do_shortcode('[recent_products per_page="8" columns="4" orderby="date" order="DESC"]');
echo '</div></section>';
echo '<section class="b-cta"><div class="b-wrap"><h2>ציוד טכני מקצועי במקום אחד</h2><p>2,352+ מוצרים, מחירים תחרותיים, משלוח מהיר לכל הארץ</p><a href="/shop/" class="b-btn-r">לכל המוצרים &#8592;</a></div></section>';
echo '</div>';
return ob_get_clean();}

add_action('wp_head','b_head',5);
function b_head(){
echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;700;900&display=swap" rel="stylesheet">';
echo '<style id="barel-css">
*,*::before,*::after{box-sizing:border-box}
html,body{font-family:"Heebo",Arial,sans-serif!important;direction:rtl;background:#fff;color:#333;font-size:14px;line-height:1.5}
a{text-decoration:none;color:inherit}
.b-wrap{max-width:1280px;margin:0 auto;padding:0 20px}
.b-trust{background:#1a1a1a;padding:13px 0;border-bottom:2px solid #CC0000}
.b-trust .b-wrap{display:flex;justify-content:center;gap:36px;flex-wrap:wrap}
.b-ti{color:#ccc;font-size:.85rem;display:flex;align-items:center;gap:7px}
.b-ti span:first-child{font-size:1.1rem}
.b-cats{padding:36px 0;background:#f7f7f7}
.b-title{font-size:1.3rem;font-weight:700;color:#1a1a1a;margin:0 0 22px;text-align:center;position:relative}
.b-title::after{content:"";display:block;width:48px;height:3px;background:#CC0000;margin:8px auto 0}
.b-cgrid{display:grid;grid-template-columns:repeat(6,1fr);gap:12px}
.b-cc{background:#fff;border:1px solid #e5e5e5;border-radius:8px;padding:18px 10px;text-align:center;display:flex;flex-direction:column;align-items:center;gap:8px;color:#333!important;transition:all .2s;cursor:pointer}
.b-cc:hover{border-color:#CC0000;box-shadow:0 3px 14px rgba(204,0,0,.13);transform:translateY(-2px)}
.b-ci{font-size:1.9rem;line-height:1;display:block}
.b-cn{font-size:.78rem;font-weight:600;color:#333;line-height:1.3;display:block}
.b-prods{padding:36px 0;background:#fff}
.b-prods ul.products{display:grid!important;grid-template-columns:repeat(4,1fr)!important;gap:16px!important;list-style:none!important;padding:0!important;margin:0!important}
.b-prods li.product{background:#fff;border:1px solid #e5e5e5;border-radius:8px;overflow:hidden;transition:box-shadow .2s;padding:0!important;margin:0!important}
.b-prods li.product:hover{box-shadow:0 4px 16px rgba(0,0,0,.1)}
.b-prods .woocommerce-loop-product__title{font-size:.9rem;font-weight:600;padding:8px 12px 4px;margin:0}
.b-prods .price{color:#CC0000!important;font-weight:700;padding:0 12px 4px;display:block}
.b-prods a.button,.b-prods a.add_to_cart_button{background:#CC0000!important;color:#fff!important;border:none!important;padding:8px 12px!important;border-radius:4px!important;font-size:.82rem!important;font-weight:600!important;margin:4px 12px 12px!important;display:block!important;text-align:center!important;transition:background .2s!important}
.b-prods a.button:hover{background:#aa0000!important}
.b-cta{background:linear-gradient(135deg,#1a1a1a 0%,#CC0000 100%);padding:48px 0;text-align:center;color:#fff}
.b-cta h2{font-size:1.6rem;font-weight:700;margin:0 0 10px;color:#fff}
.b-cta p{color:rgba(255,255,255,.85);margin:0 0 20px}
.b-btn-r{background:#fff;color:#CC0000!important;padding:11px 26px;border-radius:4px;font-weight:700;display:inline-block;transition:all .2s}
.b-btn-r:hover{background:#CC0000;color:#fff!important}
span.onsale{background:#CC0000!important;border-radius:4px!important}
.whb-row-header-bottom,.whb-row-header-bottom .whb-inner-row{background:#1a1a1a!important;border-top:none!important}
.whb-row-header-bottom .main-nav>ul>li>a,.main-nav.navigation-style-text>ul>li>a,.main-nav>ul>li>a{color:#fff!important;font-weight:500;font-size:.9rem;padding:0 14px;line-height:60px;display:block;border-bottom:3px solid transparent;transition:color .2s,border-color .2s;white-space:nowrap}
.main-nav>ul>li>a:hover,.main-nav>ul>li.current-menu-item>a,.main-nav>ul>li.current-menu-ancestor>a{color:#fff!important;border-bottom-color:#CC0000!important}
.main-nav .sub-menu{background:#fff!important;border-top:3px solid #CC0000!important;box-shadow:0 6px 20px rgba(0,0,0,.15)!important;min-width:180px!important;right:0!important;left:auto!important;z-index:9999!important}
.main-nav .sub-menu li a{color:#333!important;padding:9px 16px!important;font-size:.85rem!important;line-height:1.4!important;border:none!important;display:block}
.main-nav .sub-menu li a:hover{background:#f5f5f5!important;color:#CC0000!important;border:none!important}
.whb-sticky-header .whb-row-header-bottom,.wd-sticky-bar .whb-row-header-bottom{background:#1a1a1a!important}
@media(max-width:1024px){.b-cgrid{grid-template-columns:repeat(4,1fr)}}
@media(max-width:768px){.b-cgrid{grid-template-columns:repeat(3,1fr)}.b-prods ul.products{grid-template-columns:repeat(2,1fr)!important}.b-trust .b-wrap{gap:14px}}
@media(max-width:480px){.b-cgrid{grid-template-columns:repeat(2,1fr)}}
</style>';}

add_action('wp_footer','b_foot',99);
function b_foot(){
echo '<script>(function(){var n="https://barelofir.co.il/wp-content/uploads/logo_transparent.png";function f(){document.querySelectorAll(".site-logo img,.wd-logo img,.wd-main-logo img").forEach(function(i){if(i.src.indexOf("mega-electronics")!==-1||i.src.indexOf("wood-logo")!==-1){i.src=n;i.style.maxWidth="200px";i.style.height="auto";}});}document.readyState==="loading"?document.addEventListener("DOMContentLoaded",f):f();})();</script>';
echo '<script type="application/ld+json">{"@context":"https://schema.org","@type":"HardwareStore","name":"\u05d1\u05e8-\u05d0\u05dc \u05d0\u05e1\u05e4\u05e7\u05d4 \u05d8\u05db\u05e0\u05d9\u05ea","url":"https://barelofir.co.il","currenciesAccepted":"ILS"}</script>';
}

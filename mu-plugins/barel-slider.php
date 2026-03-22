<?php
/* Plugin Name: Barel Slider */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function() {
    if (!is_front_page()) return; ?>
    <style>
    * { box-sizing: border-box; }
    body { overflow-x: hidden !important; }
    #barel-slider { position: relative; width: 100%; overflow: hidden; background: #111; }
    #barel-slider .bslide { display: none; position: relative; width: 100%; }
    #barel-slider .bslide.on { display: block; }
    #barel-slider .bslide img { width: 100%; height: 560px; object-fit: cover; display: block; }
    #barel-slider .bslide-btn { position: absolute; bottom: 28px; left: 50%; transform: translateX(-50%); background: #e63030; color: #fff; padding: 12px 36px; font-size: 16px; font-family: Heebo,Arial,sans-serif; font-weight: 700; border-radius: 4px; text-decoration: none; white-space: nowrap; z-index: 5; }
    #barel-slider .bslide-btn:hover { background: #b71c1c; color: #fff; text-decoration: none; }
    #barel-slider .barr { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.45); color: #fff; border: none; font-size: 28px; padding: 10px 15px; cursor: pointer; z-index: 5; }
    #barel-slider .barr-r { right: 12px; }
    #barel-slider .barr-l { left: 12px; }
    #barel-slider .bdots { position: absolute; bottom: 10px; width: 100%; text-align: center; z-index: 5; }
    #barel-slider .bdot { display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.5); margin: 0 4px; cursor: pointer; border: none; }
    #barel-slider .bdot.on { background: #fff; }
    @media(max-width:767px) { #barel-slider .bslide img { height: auto; } }
    /* Fix side gaps */
    body.home .site-content > .container,
    body.home .woodmart-content-container,
    body.home #main-content > .container { padding-left: 0 !important; padding-right: 0 !important; max-width: 100% !important; }
    </style>
    <?php
});

add_action('wp_body_open', function() {
    if (!is_front_page()) return;
    $b = 'https://barelofir.co.il/wp-content/uploads/sliders/';
    $slides = [
        [$b.'drills_desktop.jpg',  $b.'drills_mobile.jpg',  'מברגות אימפקט'],
        [$b.'washers_desktop.jpg', $b.'washers_mobile.jpg', 'מכונות שטיפה Hunter'],
        [$b.'signet_desktop.jpg',  $b.'signet_mobile.jpg',  'מוצרי Signet'],
    ];
    echo '<div id="barel-slider">';
    foreach ($slides as $i => $s) {
        $on = $i === 0 ? ' on' : '';
        echo '<div class="bslide'.$on.'">';
        echo '<picture>';
        echo '<source media="(max-width:767px)" srcset="'.$s[1].'">';
        echo '<img src="'.$s[0].'" alt="'.$s[2].'" '.($i===0?'':'loading="lazy"').'>';
        echo '</picture>';
        echo '<a href="/shop" class="bslide-btn">לרכישה עכשיו</a>';
        echo '</div>';
    }
    echo '<button class="barr barr-r" onclick="bs(-1)">&#10095;</button>';
    echo '<button class="barr barr-l" onclick="bs(1)">&#10094;</button>';
    echo '<div class="bdots">';
    foreach ($slides as $i => $s) echo '<button class="bdot'.($i===0?' on':'').'" onclick="bg('.$i.')"></button>';
    echo '</div></div>';
    echo '<script>
    var bc=0,bt=3,bi;
    function bshow(n){bc=(n+bt)%bt;document.querySelectorAll("#barel-slider .bslide").forEach(function(s,i){s.className="bslide"+(i==bc?" on":"");});document.querySelectorAll("#barel-slider .bdot").forEach(function(d,i){d.className="bdot"+(i==bc?" on":"");});}
    function bs(d){bshow(bc+d);clearInterval(bi);bi=setInterval(function(){bshow(bc+1);},5000);}
    function bg(n){bshow(n);clearInterval(bi);bi=setInterval(function(){bshow(bc+1);},5000);}
    bi=setInterval(function(){bshow(bc+1);},5000);
    </script>';
});

<?php
/* Plugin Name: Barel Slider */
if (!defined('ABSPATH')) exit;

add_shortcode('barel_slider', function() {
    $b = 'https://barelofir.co.il/wp-content/uploads/sliders/';
    $slides = [
        [$b.'drills_desktop.jpg',  $b.'drills_mobile.jpg',  'מברגות אימפקט'],
        [$b.'washers_desktop.jpg', $b.'washers_mobile.jpg', 'מכונות שטיפה Hunter'],
        [$b.'signet_desktop.jpg',  $b.'signet_mobile.jpg',  'מוצרי Signet'],
    ];
    ob_start(); ?>
    <style>
    body { overflow-x: hidden !important; }
    .site-content, #content, .woodmart-content-container { max-width: 100% !important; }
    #bs{position:relative;width:100%;overflow:hidden;margin:0;padding:0;line-height:0;}
    #bs .sl{display:none;position:relative;}
    #bs .sl.on{display:block;}
    #bs .sl img{width:100%;height:560px;object-fit:cover;display:block;}
    #bs .sb{position:absolute;bottom:28px;left:50%;transform:translateX(-50%);background:#e63030;color:#fff;padding:12px 36px;font-size:16px;font-family:Heebo,Arial,sans-serif;font-weight:700;border-radius:4px;text-decoration:none;z-index:5;white-space:nowrap;}
    #bs .sb:hover{background:#b71c1c;color:#fff;}
    #bs .ar{position:absolute;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.45);color:#fff;border:none;font-size:28px;padding:10px 15px;cursor:pointer;z-index:5;}
    #bs .ar-r{right:12px;}#bs .ar-l{left:12px;}
    #bs .dots{position:absolute;bottom:8px;width:100%;text-align:center;z-index:5;}
    #bs .dot{display:inline-block;width:10px;height:10px;border-radius:50%;background:rgba(255,255,255,0.5);margin:0 4px;cursor:pointer;border:none;}
    #bs .dot.on{background:#fff;}
    @media(max-width:767px){#bs .sl img{height:auto;max-height:70vw;}}
    </style>
    <div id="bs">
    <?php foreach ($slides as $i => $s): ?>
    <div class="sl<?= $i===0?' on':'' ?>">
        <picture><source media="(max-width:767px)" srcset="<?= $s[1] ?>"><img src="<?= $s[0] ?>" alt="<?= $s[2] ?>"<?= $i>0?' loading="lazy"':'' ?>></picture>
        <a href="/shop" class="sb">לרכישה עכשיו</a>
    </div>
    <?php endforeach; ?>
    <button class="ar ar-r" onclick="bsl(-1)">&#10095;</button>
    <button class="ar ar-l" onclick="bsl(1)">&#10094;</button>
    <div class="dots"><?php foreach($slides as $i=>$s) echo '<button class="dot'.($i===0?' on':'').'" onclick="bsg('.$i.')"></button>'; ?></div>
    </div>
    <script>
    var bc=0,bt=3,bi=setInterval(function(){bsg(bc+1);},5000);
    function bshow(n){bc=(n+bt)%bt;document.querySelectorAll('#bs .sl').forEach(function(s,i){s.className='sl'+(i==bc?' on':'');});document.querySelectorAll('#bs .dot').forEach(function(d,i){d.className='dot'+(i==bc?' on':'');});}
    function bsl(d){bshow(bc+d);clearInterval(bi);bi=setInterval(function(){bsg(bc+1);},5000);}
    function bsg(n){bshow(n);clearInterval(bi);bi=setInterval(function(){bsg(bc+1);},5000);}
    </script>
    <?php
    return ob_get_clean();
});

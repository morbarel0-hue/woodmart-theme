<?php
/**
 * Plugin Name: Bar-El Custom Footer
 * Description: Custom footer override for Bar-El — replaces Woodmart footer entirely
 * Version: 1.0
 */
if (!defined('ABSPATH')) exit;

// Hide original Woodmart footer via CSS, output new footer before </body>
add_action('wp_head', 'barel_footer_hide_css', 1);
function barel_footer_hide_css() {
    echo '<style id="barel-footer-hide">
.site-footer, #footer, footer.site-footer { display: none !important; }
#barel-footer {
    background: #1a1a1a; color: #fff;
    font-family: "Heebo", Arial, sans-serif; direction: rtl;
    padding: 56px 0 0; border-top: 3px solid #CC0000;
}
#barel-footer a { color: #ccc; text-decoration: none; transition: color .2s; }
#barel-footer a:hover { color: #fff; }
.bf-container { max-width: 1280px; margin: 0 auto; padding: 0 20px; }
.bf-cols { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; padding-bottom: 40px; }
.bf-col h3 { color: #fff; font-size: 1rem; font-weight: 700; margin: 0 0 18px; padding-bottom: 10px; border-bottom: 2px solid #CC0000; display: inline-block; }
.bf-col ul { list-style: none; padding: 0; margin: 0; }
.bf-col ul li { margin-bottom: 8px; font-size: .88rem; color: #ccc; }
.bf-col ul li a { color: #ccc; }
.bf-col ul li a:hover { color: #fff; }
.bf-logo { max-width: 160px; height: auto; margin-bottom: 16px; filter: brightness(0) invert(1); }
.bf-company-name { font-size: 1.3rem; font-weight: 900; color: #fff; margin: 0 0 10px; line-height: 1.2; }
.bf-desc { font-size: .85rem; color: #aaa; line-height: 1.6; margin: 0 0 16px; }
.bf-contact-item { display: flex; align-items: flex-start; gap: 8px; margin-bottom: 7px; font-size: .88rem; color: #ccc; line-height: 1.4; }
.bf-contact-item svg { flex-shrink: 0; margin-top: 2px; }
.bf-social { display: flex; flex-direction: column; gap: 12px; margin-top: 8px; }
.bf-social-link { display: flex; align-items: center; gap: 10px; color: #ccc !important; font-size: .88rem; transition: color .2s; }
.bf-social-link:hover { color: #fff !important; }
.bf-social-link svg { width: 24px; height: 24px; flex-shrink: 0; }
.bf-bottom { border-top: 1px solid #333; padding: 20px 0; text-align: center; }
.bf-seo-text { font-size: .75rem; color: #999; line-height: 1.6; margin: 0 0 8px; }
.bf-copyright { font-size: .78rem; color: #777; margin: 0; }
.bf-branches { background: #111; padding: 32px 0; border-top: 1px solid #2a2a2a; }
.bf-branches-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; max-width: 800px; margin: 0 auto; }
.bf-branch-card { background: #1e1e1e; border: 1px solid #2d2d2d; border-radius: 8px; padding: 20px 24px; border-right: 3px solid #CC0000; }
.bf-branch-name { font-size: 1rem; font-weight: 700; color: #fff; margin: 0 0 6px; }
.bf-branch-address { font-size: .85rem; color: #aaa; margin: 0; line-height: 1.5; }
.bf-branches-title { text-align: center; font-size: 1.1rem; font-weight: 700; color: #fff; margin: 0 0 24px; }
.bf-branches-title::after { content: ""; display: block; width: 40px; height: 2px; background: #CC0000; margin: 8px auto 0; }
@media (max-width: 900px) { .bf-cols { grid-template-columns: 1fr 1fr; gap: 28px; } }
@media (max-width: 600px) { .bf-cols { grid-template-columns: 1fr; gap: 24px; } .bf-branches-grid { grid-template-columns: 1fr; } }
</style>';
}

add_action('wp_footer', 'barel_custom_footer_output', 5);
function barel_custom_footer_output() {
?>
<section class="bf-branches" id="barel-branches" aria-label="×¡× ××¤× ××¨-××">
    <div class="bf-container">
        <h2 class="bf-branches-title">××¡× ××¤×× ×©×× ×</h2>
        <div class="bf-branches-grid">
            <div class="bf-branch-card">
                <p class="bf-branch-name">×¡× ××£ ×¨××ª ××©×¨××</p>
                <p class="bf-branch-address">×¨××× ××¨×××¤××××¨ 10, ×¨××ª ××©×¨××</p>
            </div>
            <div class="bf-branch-card">
                <p class="bf-branch-name">×¡× ××£ ×××¨×</p>
                <p class="bf-branch-address">×¨××× ×¨×××©××× 10, ×××¨×</p>
            </div>
        </div>
    </div>
</section>

<footer id="barel-footer" role="contentinfo">
    <div class="bf-container">
        <div class="bf-cols">
            <div class="bf-col">
                <img src="https://barelofir.co.il/wp-content/uploads/2026/03/barel-logo.svg" alt="××¨-×× ××¡×¤×§× ××× ××ª" class="bf-logo" onerror="this.style.display='none'">
                <p class="bf-company-name">××¨-×× ××¡×¤×§× ××× ××ª</p>
                <p class="bf-desc">×¡×¤×§ ××××× ×©× ××× ×¢××××, ××©××, ××× ×¡×××¦××, ×¤×¨××× ××¦××¢ ××× ××× ××©××¤××¥ ×××©×¨××.</p>
                <div class="bf-contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#CC0000" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>×¨××× ××¨×××¤××××¨ 10, ×¨××ª ××©×¨××</span>
                </div>
                <div class="bf-contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#CC0000" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 8V5z"/></svg>
                    <span>09-XXXXXXX</span>
                </div>
            </div>
            <div class="bf-col">
                <h3>×§××©××¨×× ×©××××©×××</h3>
                <ul>
                    <li><a href="/">××£ ××××ª</a></li>
                    <li><a href="/shop/">×××¦×¨××</a></li>
                    <li><a href="/product-category/%d7%9b%d7%9c%d7%99-%d7%a2%d7%91%d7%95%d7%93%d7%94/">×§××××¨×××ª</a></li>
                    <li><a href="/our-contacts/">×¦××¨ ×§×©×¨</a></li>
                    <li><a href="/delivery-return-2/">××©××××× ×××××¨××ª</a></li>
                    <li><a href="/my-account/">×××©××× ×©××</a></li>
                </ul>
            </div>
            <div class="bf-col">
                <h3>×§××××¨×××ª ×¨××©×××ª</h3>
                <ul>
                    <li><a href="/product-category/%d7%9b%d7%9c%d7%99-%d7%a2%d7%91%d7%95%d7%93%d7%94/">××× ×¢××××</a></li>
                    <li><a href="/product-category/%d7%97%d7%a9%d7%9e%d7%9c-%d7%95%d7%90%d7%9c%d7%a7%d7%98%d7%a8%d7%95%d7%a0%d7%99%d7%a7%d7%94/">××©×× ××××§××¨×× ××§×</a></li>
                    <li><a href="/product-category/%d7%90%d7%99%d7%a0%d7%a1%d7%98%d7%9c%d7%a6%d7%99%d7%94/">××× ×¡×××¦××</a></li>
                    <li><a href="/product-category/%d7%a4%d7%a8%d7%96%d7%95%d7%9c/">×¤×¨×××</a></li>
                    <li><a href="/product-category/%d7%a6%d7%91%d7%a2%d7%99%d7%9d/">×¦××¢ ××××××¨××</a></li>
                    <li><a href="/product-category/%d7%92%d7%99%d7%a0%d7%95%d7%9f/">××× ××</a></li>
                </ul>
            </div>
            <div class="bf-col">
                <h3>×¢×§×× ×××¨×× ×</h3>
                <div class="bf-social">
                    <a href="https://www.facebook.com/p/%D7%91%D7%A8%D7%90%D7%9C-%D7%90%D7%95%D7%A4%D7%99%D7%A8-%D7%97%D7%95%D7%9E%D7%A8%D7%99-%D7%91%D7%A0%D7%99%D7%99%D7%9F-100090536043491/" target="_blank" rel="noopener noreferrer" class="bf-social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        ×¤×××¡×××§
                    </a>
                    <a href="https://www.instagram.com/barelofir_home/" target="_blank" rel="noopener noreferrer" class="bf-social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        ××× ×¡×××¨×
                    </a>
                    <a href="https://www.tiktok.com/@barelofir" target="_blank" rel="noopener noreferrer" class="bf-social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        ×××§×××§
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bf-bottom">
        <div class="bf-container">
            <p class="bf-seo-text">××¨-×× ××¡×¤×§× ××× ××ª â ×¡×¤×§ ××××× ×©× ××× ×¢××××, ××©××, ××× ×¡×××¦××, ×¤×¨××× ××¦××¢ ×××©×¨××. ×©× × ×¡× ××¤××: ×¨××ª ××©×¨×× ××××¨×. ××©××× ××× ×××¨×¥.</p>
            <p class="bf-copyright">Â© 2025 ××¨-×× ××¡×¤×§× ××× ××ª. ×× ×××××××ª ×©×××¨××ª.</p>
        </div>
    </div>
</footer>
<?php
}

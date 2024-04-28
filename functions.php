<?php
/**
 * Root function Silohon SEO
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


define( 'SL_NAME', 'Silohon SEO' );
define( 'SL_VER', '2.1.0' );
define( 'SL_URI', 'https://github.com/akbarsilohon/silohon-seo.git' );
define( 'SL_AUTHOR', 'Nur Akbar' );
define( 'SL_AUTHOR_URI', 'https://github.com/akbarsilohon' );

define( 'SLURI', get_template_directory_uri());
define( 'SLDIR', get_template_directory());
function SLPART( $filename ){
    return get_template_part( $filename );
}


// require function =============================
// ==============================================
require_once SLDIR . '/include/function/theme.php';
require_once SLDIR . '/include/function/remove-action.php';
require_once SLDIR . '/include/function/theme-script.php';
require_once SLDIR . '/include/function/widgets.php';
require_once SLDIR . '/include/function/thumbnails.php';


// Admin function ===============================
// ==============================================
require_once SLDIR . '/include/admin/load.php';


// Shortcode ====================================
// ==============================================
require_once SLDIR . '/include/code/shortcode.php';


// Page Builder =================================
// ==============================================
require SLDIR . '/include/build/load-admin.php';
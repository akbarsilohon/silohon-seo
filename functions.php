<?php
/**
 * Root function Silohon SEO
 * @package silohon-seo
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


define( 'SL_NAME', 'Silohon SEO' );
define( 'SL_VER', '1.0.1' );
define( 'SL_URI', 'https://github.com/akbarsilohon/silohon-seo.git' );
define( 'SL_AUTHOR', 'Nur Akbar' );
define( 'SL_AUTHOR_URI', 'https://github.com/akbarsilohon' );

define( 'SLURI', get_template_directory_uri());
define( 'SLDIR', get_template_directory());
function SLPART( $filename ){
    $part = get_tempate_part( $filename );
    return $part;
}


// require function =============================
// ==============================================
require_once SLDIR . '/include/function/theme.php';
require_once SLDIR . '/include/function/remove-action.php';


// Admin function ===============================
// ==============================================
require_once SLDIR . '/include/admin/load.php';
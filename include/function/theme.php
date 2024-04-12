<?php
/**
 * Theme Function
 * Silohon SEO Wordpress Theme
 * @package silohon-seo
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


// Setup Theme ===============================
// ===========================================
add_action( 'after_setup_theme', 'sls_setup_theme' );
function sls_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'silohon-seo' ),
        'footer'    =>  __( 'Footer Menu', 'silohon-seo' )
    ));

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'responsive-embeds' );
}

// Meta Robot =================================
// ============================================
add_filter( 'wp_robots', 'sls_robots' );
function sls_robots( $robots ){
    $robots = array(
        'index'                 =>  true,
        'follow'                =>  true,
        'max-image-preview'     =>  'large',
        'max-snippet'           =>  '-1',
        'max-video-preview'     =>  '-1'
    );

    return $robots;
}


// Favicon ============================
// ====================================
$icon = get_site_icon_url();
if(empty( $icon )){
    add_action( 'wp_head', 'sls_default_icon' );
    add_action( 'admin_head', 'sls_default_icon' );
}
function sls_default_icon(){
    $defIcon = SLURI . '/asset/img/site/seo-favicon.png'; ?>
    <link rel="shortcut icon" href="<?php echo esc_url( $defIcon ); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo esc_url( $defIcon ); ?>">
    <?php
}
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

// Render Organization Schema ==========
// =====================================
$og = get_option( 'sls_g_settings' )['og'];
if( !empty( $og ) && $og === 'true' ){
    add_action( 'wp_head', 'sls_render_organization_schema' );
}

function sls_render_organization_schema(){
    $ogName = get_option( 'sls_g_settings' )['ogName'];
    $ogUrl = get_option( 'sls_g_settings' )['ogUrl'];
    $ogSameAs = get_option( 'sls_g_settings' )['ogSameAs'];
    $ogImage = get_option( 'sls_g_settings' )['ogImage'];
    $ogLogo = get_option( 'sls_g_settings' )['ogLogo'];
    $ogDesc = get_option( 'sls_g_settings' )['ogDesc'];
    $ogEmail = get_option( 'sls_g_settings' )['ogEmail'];
    $ogTel = get_option( 'sls_g_settings' )['ogTel'];
    $ogStreet = get_option( 'sls_g_settings' )['ogStreet'];
    $ogLocality = get_option( 'sls_g_settings' )['ogLocality'];
    $ogCountry = get_option( 'sls_g_settings' )['ogCountry'];
    $ogRegion = get_option( 'sls_g_settings' )['ogRegion'];
    $ogPostal = get_option( 'sls_g_settings' )['ogPostal'];
    $ogVat = get_option( 'sls_g_settings' )['ogVat'];
    $ogIso = get_option( 'sls_g_settings' )['ogIso']; ?>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "<?php echo $ogName; ?>",
            "url": "<?php echo $ogUrl; ?>",
            "sameAs": [ "<?php echo $ogSameAs; ?>" ],
            "image": "<?php echo $ogImage; ?>",
            "logo": "<?php echo $ogLogo; ?>",
            "description": "<?php echo $ogDesc; ?>",
            "email": "<?php echo $ogEmail; ?>",
            "telephone": "<?php echo $ogTel; ?>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?php echo $ogStreet; ?>",
                "addressLocality": "<?php echo $ogLocality; ?>",
                "addressCountry": "<?php echo $ogCountry; ?>",
                "addressRegion": "<?php echo $ogRegion; ?>",
                "postalCode": "<?php echo $ogPostal; ?>"
            },
            "vatID": "<?php echo $ogVat; ?>",
            "iso6523Code": "<?php echo $ogIso; ?>"
        }
    </script>

    <?php
}
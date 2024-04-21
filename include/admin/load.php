<?php
/**
 * Admin core Silohon SEO Wordpress Theme
 * 
 * Silohon SEO
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


// Create Admin Menu ===================================
// =====================================================
add_action( 'admin_menu', 'sls_admin_menu' );
function sls_admin_menu(){

    // General setting ------------------
    add_menu_page( SL_NAME, SL_NAME, 'manage_options', 'sls', 'sls_general', 'dashicons-superhero', 1 );
    add_submenu_page( 'sls', SL_NAME, 'General', 'manage_options', 'sls', 'sls_general' );

    // Single post ----------------------
    add_submenu_page( 'sls', 'Article Setting', 'Article', 'manage_options', 'sls-single-post', 'sls_single_post' );

    // Ads ------------------------------
    add_submenu_page( 'sls', 'Insert ADS', 'Insert ADS', 'manage_options', 'sls-ads', 'sls_ads' );

    // Insert header Footer -------------
    add_submenu_page( 'sls', 'Header & Footer', 'Header & Footer', 'manage_options', 'sls-header-footer', 'sls_header_footer' );

    // Color settings ------------------
    add_submenu_page( 'sls', 'Color', 'Color', 'manage_options', 'sls-color', 'sls_render_color' );
}



// Panel Admin Menu ====================================
// =====================================================
// General ---------------
function sls_general(){ ?>

    <div class="sls_container">
        <h1 class="sls_heading">General Settings</h1>

        <div class="sls_setting-info"><?php settings_errors(); ?></div>

        <form action="options.php" method="post" class="sls_form">
            <?php settings_fields( 'sls-settings-group' ); ?>
            <?php do_settings_sections( 'sls' ); ?>
            <?php submit_button('Save Change'); ?>
        </form>
    </div>

<?php
}

// Single post ------------
function sls_single_post(){ ?>

    <div class="sls_container">
        <h1 class="sls_heading">Post Settings</h1>

        <div class="sls_setting-info"><?php settings_errors(); ?></div>

        <form action="options.php" method="post" class="sls_form">
            <?php settings_fields( 'sls-article-group' ); ?>
            <?php do_settings_sections( 'sls-single-post' ); ?>
            <?php submit_button('Save Change'); ?>
        </form>
    </div>

<?php
}

// Ads --------------------
function sls_ads(){ ?>

    <div class="sls_container">
        <h1 class="sls_heading">Insert ADS</h1>

        <div class="sls_setting-info"><?php settings_errors(); ?></div>

        <form action="options.php" method="post" class="sls_form">
            <?php settings_fields( 'sls-ads-group' ); ?>
            <?php do_settings_sections( 'sls-ads' ); ?>
            <?php submit_button('Save Change'); ?>
        </form>
    </div>

<?php
}

// Insert Header & Footer -------
function sls_header_footer(){ ?>

    <div class="sls_container">
        <h1 class="sls_heading">Insert Header & Footer</h1>

        <div class="sls_setting-info"><?php settings_errors(); ?></div>

        <form action="options.php" method="post" class="sls_form">
            <?php settings_fields( 'sls-hnf-group' ); ?>
            <?php do_settings_sections( 'sls-header-footer' ); ?>
            <?php submit_button('Save Change'); ?>
        </form>
    </div>

<?php
}


// Color settings ----------------
function sls_render_color(){ ?>

    <div class="sls_container">
        <h1 class="sls_heading">Custom Color</h1>

        <div class="sls_setting-info"><?php settings_errors(); ?></div>

        <form action="options.php" method="post" class="sls_form">
            <?php settings_fields( 'sls-color-group' ); ?>
            <?php do_settings_sections( 'sls-color' ); ?>
            <?php submit_button('Save Change'); ?>
        </form>
    </div>

<?php
}


// Register Settings ===================================
// =====================================================
add_action( 'admin_init', 'sls_admin_init' );
function sls_admin_init(){
    require_once SLDIR . '/include/admin/handler/general-save.php';
    require_once SLDIR . '/include/admin/handler/article-save.php';
    require_once SLDIR . '/include/admin/handler/ads-save.php';
    require_once SLDIR . '/include/admin/handler/header-footer-save.php';
    require_once SLDIR . '/include/admin/handler/color-save.php';
}


// Create link css & Js for admin ======================
// =====================================================
add_action( 'admin_enqueue_scripts', 'sls_admin_enqueue_scripts' );
function sls_admin_enqueue_scripts(){
    wp_enqueue_media();
    wp_enqueue_style( 'sls-admin-style', SLURI . '/include/admin/asset/admin-css.css', array(), fileatime( SLDIR . '/include/admin/asset/admin-css.css'), 'all' );

    // JQuery -------
    wp_enqueue_script( 'sls-admin-js', SLURI . '/include/admin/asset/admin-js.js', array(), fileatime( SLDIR . '/include/admin/asset/admin-js.js'), true );
}



/**
 * Add Action print css to head
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

add_action('wp_head', 'sls_load_root_css_color');
function sls_load_root_css_color(){ 
    // Background color
    $bgColor = !empty(get_option('sls_color')['body-background']) ? get_option('sls_color')['body-background'] : '#ffffff';

    // Header
    $headerBg = !empty(get_option('sls_color')['header-bg']) ? get_option('sls_color')['header-bg'] : '#ffffff';
    $headerLink = !empty(get_option('sls_color')['header-link']) ? get_option('sls_color')['header-link'] : '#000000';
    $headerHov = !empty(get_option('sls_color')['header-hover']) ? get_option('sls_color')['header-hover'] : '#e81010';

    // Post
    $postJudul = !empty(get_option('sls_color')['post-title']) ? get_option('sls_color')['post-title'] : '#000000';
    $postHover = !empty(get_option('sls_color')['post-hover']) ? get_option('sls_color')['post-hover'] : '#e81010';
    $postMeta = !empty(get_option('sls_color')['post-meta']) ? get_option('sls_color')['post-meta'] : '#e81010';
    $postExcerpt = !empty(get_option('sls_color')['post-excerpt']) ? get_option('sls_color')['post-excerpt'] : '#666666';

    // Article
    $articleHeading = !empty(get_option('sls_color')['article-heading']) ? get_option('sls_color')['article-heading'] : '#000000';
    $articleText = !empty(get_option('sls_color')['article-text']) ? get_option('sls_color')['article-text'] : '#666666';
    $articleLink = !empty(get_option('sls_color')['article-link']) ? get_option('sls_color')['article-link'] : '#e81010';
    $articleHover = !empty(get_option('sls_color')['article-hover']) ? get_option('sls_color')['article-hover'] : '#ff0000';

    // Footer
    $fooTopBg = !empty(get_option('sls_color')['foo-top-bg']) ? get_option('sls_color')['foo-top-bg'] : '#333333';
    $foooTopLink = !empty(get_option('sls_color')['foo-top-link']) ? get_option('sls_color')['foo-top-link'] : '#ffffff';
    $fooTopHov = !empty(get_option('sls_color')['foo-top-hover']) ? get_option('sls_color')['foo-top-hover'] : '#999999';
    $fooBotBg = !empty(get_option('sls_color')['foo-bot-bg']) ? get_option('sls_color')['foo-bot-bg'] : '#000000';
    $fooBotText = !empty(get_option('sls_color')['foo-bot-text']) ? get_option('sls_color')['foo-bot-text'] : '#ffffff';
    $fooBotLink = !empty(get_option('sls_color')['foo-bot-link']) ? get_option('sls_color')['foo-bot-link'] : '#e81010';
    
    echo '<style>:root{--bg-color:'.$bgColor.';--header-bg:'.$headerBg.';--header-link:'.$headerLink.';--header-hover:'.$headerHov.';--post-judul:'.$postJudul.';--post-judul-hover:'.$postHover.';--post-meta:'.$postMeta.';--post-excerpt:'.$postExcerpt.';--article-heading:'.$articleHeading.';--article-text:'.$articleText.';--article-link:'.$articleLink.';--article-hover:'.$articleHover.';--foo-top-bg:'.$fooTopBg.';--foo-top-link:'.$foooTopLink.';--foo-top-hover:'.$fooTopHov.';--foo-bot-bg:'.$fooBotBg.';--foo-bot-text:'.$fooBotText.';--foo-bot-link:'.$fooBotLink.';}</style>';
}
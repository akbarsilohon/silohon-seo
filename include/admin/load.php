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
        <h1 class="sls_heading">Single Post Settings</h1>

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


// Action color to header ==============
add_action( 'wp_head', 'sls_add_custom_color' );
function sls_add_custom_color(){
    // Main
    $mainColor = !empty(get_option('sls_color')['main']) ? get_option('sls_color')['main'] : '#e74b2c';
    $backgroundColor = !empty(get_option('sls_color')['bakgroud']) ? get_option('sls_color')['bakgroud'] : '#ffffff';

    // Navbar
    $navBgColor = !empty(get_option('sls_color')['nav-bg']) ? get_option('sls_color')['nav-bg'] : '#ffffff';
    $navLink = !empty(get_option('sls_color')['nav-link']) ? get_option('sls_color')['nav-link'] : '#e74b2c';
    $navHover = !empty(get_option('sls_color')['nav-hover']) ? get_option('sls_color')['nav-hover'] : '#f5866f';

    // Single Post
    $pColor = !empty(get_option('sls_color')['p-text']) ? get_option('sls_color')['p-text'] : '#606060';
    $pLink = !empty(get_option('sls_color')['p-link']) ? get_option('sls_color')['p-link'] : '#e74b2c';
    $pHover = !empty(get_option('sls_color')['p-hover']) ? get_option('sls_color')['p-hover'] : '#e74b2c';

    // Footer
    $fooBg = !empty(get_option('sls_color')['foo-bg']) ? get_option('sls_color')['foo-bg'] : '#000000';
    $fooText = !empty(get_option('sls_color')['foo-text']) ? get_option('sls_color')['foo-text'] : '#ffffff';
    $fooLink = !empty(get_option('sls_color')['foo-link']) ? get_option('sls_color')['foo-link'] : '#e74b2c';
    $fooHover = !empty(get_option('sls_color')['foo-hover']) ? get_option('sls_color')['foo-hover'] : '#e74b2c';
    ?>

    <style>:root{--main-color: <?php echo $mainColor; ?>; --bg-color: <?php echo $backgroundColor; ?>; --nav-bg: <?php echo $navBgColor; ?>; --foo-bg: <?php echo $fooBg; ?>; --nav-link: <?php echo $navLink; ?>; --nav-hover: <?php echo $navHover ?>; --p-color: <?php echo $pColor; ?>; --p-link: <?php echo $pLink; ?>; --p-hover: <?php echo $pHover; ?>; --foo-text: <?php echo $fooText; ?>; --foo-link: <?php echo $fooLink; ?>; --foo-hover: <?php echo $fooHover; ?>; }</style>

<?php
}
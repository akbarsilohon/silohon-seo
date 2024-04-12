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


// Register Settings ===================================
// =====================================================
add_action( 'admin_init', 'sls_admin_init' );
function sls_admin_init(){
    require_once SLDIR . '/include/admin/handler/general-save.php';
    require_once SLDIR . '/include/admin/handler/article-save.php';
    require_once SLDIR . '/include/admin/handler/ads-save.php';
    require_once SLDIR . '/include/admin/handler/header-footer-save.php';
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
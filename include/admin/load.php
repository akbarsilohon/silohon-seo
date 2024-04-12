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
    add_submenu_page( 'sls', 'Single Post', 'Single Post', 'manage_options', 'sls-single-post', 'sls_single_post' );

    // Ads ------------------------------
    add_submenu_page( 'sls', 'Insert ADS', 'Insert ADS', 'manage_options', 'sls-ads', 'sls_ads' );

    // Insert header Footer -------------
    add_submenu_page( 'sls', 'Header & Footer', 'Header & Footer', 'manage_options', 'sls-header-footer', 'sls_header_footer' );
}


// General ---------------
function sls_general(){

}

// Single post ------------
function sls_single_post(){

}

// Ads --------------------
function sls_ads(){

}

// Insert Header & Footer -------
function sls_header_footer(){

}
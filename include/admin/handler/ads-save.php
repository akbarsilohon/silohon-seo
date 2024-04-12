<?php
/**
 * File for handler Insert Ads Code
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

add_settings_section( 'sls-ads-section', null, null, 'sls-ads' );
register_setting( 'sls-ads-group', 'sls_ads_set' );

// After Header ===============================
// ============================================
add_settings_field( 'sls-header-ads', 'After Navbar', 'sls_after_navbar_render', 'sls-ads', 'sls-ads-section');
function sls_after_navbar_render(){

$headerAds = get_option('sls_ads_set')['header']; ?>

<textarea name="sls_ads_set[header]" cols="30" rows="6"><?php echo $headerAds ?></textarea>

<?php
}


// Footer ads ==================================
// =============================================
add_settings_field( 'sls-footer-ads', 'Footer Ads', 'sls_footer_ads_render', 'sls-ads', 'sls-ads-section' );
function sls_footer_ads_render(){

$footerAds = get_option('sls_ads_set')['footer']; ?>

<textarea name="sls_ads_set[footer]" cols="30" rows="6"><?php echo $footerAds ?></textarea>

<?php
}


// Before Content ==============================
// =============================================
add_settings_field( 'sls-before-content-ads', 'Before Content', 'sls_before_content_ads_render', 'sls-ads', 'sls-ads-section' );
function sls_before_content_ads_render(){

$beforeContent = get_option('sls_ads_set')['before_content']; ?>

<textarea name="sls_ads_set[before_content]" cols="30" rows="6"><?php echo $beforeContent ?></textarea>

<?php
}


// After Content ==============================
// =============================================
add_settings_field( 'sls-after-content-ads', 'After Content', 'sls_after_content_ads_render', 'sls-ads', 'sls-ads-section' );
function sls_after_content_ads_render(){

$afterContent = get_option('sls_ads_set')['after_content']; ?>

<textarea name="sls_ads_set[after_content]" cols="30" rows="6"><?php echo $afterContent ?></textarea>

<?php
}


// Shortcode 1 =================================
// =============================================
add_settings_field( 'sls-shortcode-1-ads', 'Shortcode 1', 'sls_shortcode_1_ads_render', 'sls-ads', 'sls-ads-section' );
function sls_shortcode_1_ads_render(){

$sc1 = get_option('sls_ads_set')['sc1']; ?>

<textarea name="sls_ads_set[sc1]" cols="30" rows="6"><?php echo $sc1 ?></textarea>

<?php
}



// Shortcode 1 =================================
// =============================================
add_settings_field( 'sls-shortcode-2-ads', 'Shortcode 2', 'sls_shortcode_2_ads_render', 'sls-ads', 'sls-ads-section' );
function sls_shortcode_2_ads_render(){

$sc2 = get_option('sls_ads_set')['sc2']; ?>

<textarea name="sls_ads_set[sc2]" cols="30" rows="6"><?php echo $sc2 ?></textarea>

<?php
}
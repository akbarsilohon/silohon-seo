<?php
/**
 * File for handler Insert HTML Code to Header & Footer
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

add_settings_section( 'sls-hnf-section', null, null, 'sls-header-footer' );
register_setting( 'sls-hnf-group', 'sls_hnf' );

// Insert Coding to header =============
// =====================================
add_settings_field( 'sls-insert-header', 'Insert HTML Header', 'sls_insert_header_render', 'sls-header-footer', 'sls-hnf-section' );
function sls_insert_header_render(){
$headerHtmL = get_option('sls_hnf')['header']; ?>

<textarea name="sls_hnf[header]" cols="30" rows="6"><?php echo $headerHtmL ?></textarea>

<?php
}



// Insert Coding to footer =============
// =====================================
add_settings_field( 'sls-insert-footer', 'Insert HTML Footer', 'sls_insert_footer_render', 'sls-header-footer', 'sls-hnf-section' );
function sls_insert_footer_render(){
$footerHtmL = get_option('sls_hnf')['footer']; ?>

<textarea name="sls_hnf[footer]" cols="30" rows="6"><?php echo $footerHtmL ?></textarea>

<?php
}
<?php
/**
 * File for handler Custom Color
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


add_settings_section( 'sls-color-1', null, null, 'sls-color' );
add_settings_section( 'sls-color-2', '<h2 class="slsSection">Header</h2>', null, 'sls-color' );
add_settings_section( 'sls-color-3', '<h2 class="slsSection">Posts</h2>', null, 'sls-color' );
add_settings_section( 'sls-color-4', '<h2 class="slsSection">Article</h2>', null, 'sls-color' );
add_settings_section( 'sls-color-5', '<h2 class="slsSection">Footer</h2>', null, 'sls-color' );
register_setting( 'sls-color-group', 'sls_color' );

/**
 * Main Color Setting
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */
add_settings_field( 'sls-bg', 'Body Background: ', function(){

    $options = get_option('sls_color')['body-background'];
    $color = !empty($options) ? $options : '#ffffff';

    echo '<input type="color" name="sls_color[body-background]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-1');


/**
 * Header Color Settings
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

// --header-bg: #ffffff; ==============================
add_settings_field( 'sls-header-bg', 'Background: ', function(){

    $options = get_option('sls_color')['header-bg'];
    $color = !empty( $options ) ? $options : '#ffffff';

    echo '<input type="color" name="sls_color[header-bg]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-2');


// --header-link: #000000; ============================
add_settings_field( 'sls-header-link', 'Link: ', function(){

    $options = get_option('sls_color')['header-link'];
    $color = !empty( $options ) ? $options : '#000000';

    echo '<input type="color" name="sls_color[header-link]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-2');


// --header-hover: #e81010; ===========================
add_settings_field( 'sls-header-hover', 'Hover: ', function(){

    $options = get_option('sls_color')['header-hover'];
    $color = !empty( $options ) ? $options : '#e81010';

    echo '<input type="color" name="sls_color[header-hover]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-2');


/**
 * Posts Color settings
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */
// --post-judul: #000000; ==============================
add_settings_field( 'sls-post-judul', 'Title: ', function(){

    $options = get_option('sls_color')['post-title'];
    $color = !empty($options) ? $options : '#000000';

    echo '<input type="color" name="sls_color[post-title]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-3' );


// --post-judul-hover: #e81010; ========================
add_settings_field( 'sls-post-hover', 'Hover: ', function(){

    $options = get_option('sls_color')['post-hover'];
    $color = !empty($options) ? $options : '#e81010';

    echo '<input type="color" name="sls_color[post-hover]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-3' );


// --post-meta: #e81010; ===============================
add_settings_field( 'sls-post-meta', 'Meta: ', function(){

    $options = get_option('sls_color')['post-meta'];
    $color = !empty($options) ? $options : '#e81010';

    echo '<input type="color" name="sls_color[post-meta]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-3' );


// --post-excerpt: #666666; ============================
add_settings_field( 'sls-post-excerpt', 'Excerpt: ', function(){

    $options = get_option('sls_color')['post-excerpt'];
    $color = !empty($options) ? $options : '#666666';

    echo '<input type="color" name="sls_color[post-excerpt]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-3' );


/**
 * Article Color settings
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */
// --article-heading: #000000; =========================
add_settings_field( 'sls-article-heading', 'Heading: ', function(){

    $options = get_option('sls_color')['article-heading'];
    $color = !empty($options) ? $options : '#000000';

    echo '<input type="color" name="sls_color[article-heading]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-4' );


// --article-text: #666666; ============================
add_settings_field( 'sls-article-text', 'Text: ', function(){

    $options = get_option('sls_color')['article-text'];
    $color = !empty($options) ? $options : '#666666';

    echo '<input type="color" name="sls_color[article-text]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-4' );


// --article-link: #e81010; ============================
add_settings_field( 'sls-article-link', 'Link: ', function(){

    $options = get_option('sls_color')['article-link'];
    $color = !empty($options) ? $options : '#e81010';

    echo '<input type="color" name="sls_color[article-link]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-4' );


// --article-hover: #ff0000; ===========================
add_settings_field( 'sls-article-hover', 'Hover: ', function(){

    $options = get_option('sls_color')['article-hover'];
    $color = !empty($options) ? $options : '#ff0000';

    echo '<input type="color" name="sls_color[article-hover]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-4' );


/**
 * Footer Color settings
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */
// --foo-top-bg: #333333; ==============================
add_settings_field( 'sls-foo-top-bg', 'Top Background: ', function(){

    $options = get_option('sls_color')['foo-top-bg'];
    $color = !empty($options) ? $options : '#333333';

    echo '<input type="color" name="sls_color[foo-top-bg]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-5' );


// --foo-top-link: #ffffff; ============================
add_settings_field( 'sls-foo-top-link', 'Top Link: ', function(){

    $options = get_option('sls_color')['foo-top-link'];
    $color = !empty($options) ? $options : '#ffffff';

    echo '<input type="color" name="sls_color[foo-top-link]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-5' );


// --foo-top-hover: #999999; ===========================
add_settings_field( 'sls-foo-top-hover', 'Top Hover: ', function(){

    $options = get_option('sls_color')['foo-top-hover'];
    $color = !empty($options) ? $options : '#999999';

    echo '<input type="color" name="sls_color[foo-top-hover]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-5' );


// --foo-bot-bg: #000000; ==============================
add_settings_field( 'sls-foo-bot-bg', 'Bottom Background: ', function(){

    $options = get_option('sls_color')['foo-bot-bg'];
    $color = !empty($options) ? $options : '#000000';

    echo '<input type="color" name="sls_color[foo-bot-bg]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-5' );


// --foo-bot-text: #ffffff; ============================
add_settings_field( 'sls-foo-bot-text', 'Bottom Text: ', function(){

    $options = get_option('sls_color')['foo-bot-text'];
    $color = !empty($options) ? $options : '#ffffff';

    echo '<input type="color" name="sls_color[foo-bot-text]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-5' );


// --foo-bot-link: #e81010; ============================
add_settings_field( 'sls-foo-bot-link', 'Bottom Link: ', function(){

    $options = get_option('sls_color')['foo-bot-link'];
    $color = !empty($options) ? $options : '#e81010';

    echo '<input type="color" name="sls_color[foo-bot-link]" value="'. $color .'"/>';

}, 'sls-color', 'sls-color-5' );
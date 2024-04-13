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


add_settings_section( 'sls-color-section', null, null, 'sls-color' );
add_settings_section( 'sls-color-2', '<h2 class="slsSection">Header</h2>', null, 'sls-color' );
add_settings_section( 'sls-color-3', '<h2 class="slsSection">Single Post</h2>', null, 'sls-color' );
add_settings_section( 'sls-color-4', '<h2 class="slsSection">Footer Color</h2>', null, 'sls-color' );
register_setting( 'sls-color-group', 'sls_color' );


// Main color =============================
add_settings_field( 'sls-main-color', 'Main Color: ', function(){

    $main = get_option('sls_color')['main'];
    $mainColor = !empty($main) ? $main : '#e74b2c';
    echo '<input type="color" name="sls_color[main]" value="'. $mainColor .'"/>';

}, 'sls-color', 'sls-color-section' );


// Backgroud Color =========================
add_settings_field( 'sls-bg-color', 'Backgoud Color: ', function(){

    $bg = get_option('sls_color')['bakgroud'];
    $backgroundColor = !empty( $bg ) ? $bg : '#ffffff';
    echo '<input type="color" name="sls_color[bakgroud]" value="'. $backgroundColor .'"/>';

}, 'sls-color', 'sls-color-section' );



// Navbar Background ========================
add_settings_field( 'sls-nav-bg', 'Header Backgroud: ', function(){

    $navBg = get_option('sls_color')['nav-bg'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#ffffff';
    echo '<input type="color" name="sls_color[nav-bg]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-2' );


// Navbar Link ========================
add_settings_field( 'sls-nav-link', 'Navbar Link Color: ', function(){

    $navBg = get_option('sls_color')['nav-link'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#e74b2c';
    echo '<input type="color" name="sls_color[nav-link]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-2' );


// Navbar Hover ========================
add_settings_field( 'sls-nav-hover', 'Navbar Link Hover: ', function(){

    $navBg = get_option('sls_color')['nav-hover'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#f5866f';
    echo '<input type="color" name="sls_color[nav-hover]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-2' );



// Text Paragraf ========================
add_settings_field( 'sls-p-text', 'Paragraf Color: ', function(){

    $navBg = get_option('sls_color')['p-text'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#606060';
    echo '<input type="color" name="sls_color[p-text]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-3' );


// Text Paragraf ========================
add_settings_field( 'sls-p-link', 'Link in Paragraf: ', function(){

    $navBg = get_option('sls_color')['p-link'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#e74b2c';
    echo '<input type="color" name="sls_color[p-link]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-3' );


// Text Paragraf ========================
add_settings_field( 'sls-p-hover', 'Link Hover Paragraf: ', function(){

    $navBg = get_option('sls_color')['p-hover'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#e74b2c';
    echo '<input type="color" name="sls_color[p-hover]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-3' );


// Footer Bg ========================
add_settings_field( 'sls-foo-bg', 'Footer Background: ', function(){

    $navBg = get_option('sls_color')['foo-bg'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#000000';
    echo '<input type="color" name="sls_color[foo-bg]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-4' );



// Footer text ========================
add_settings_field( 'sls-foo-text', 'Footer Text: ', function(){

    $navBg = get_option('sls_color')['foo-text'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#ffffff';
    echo '<input type="color" name="sls_color[foo-text]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-4' );


// Footer Link ========================
add_settings_field( 'sls-foo-link', 'Footer Link: ', function(){

    $navBg = get_option('sls_color')['foo-link'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#e74b2c';
    echo '<input type="color" name="sls_color[foo-link]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-4' );


// Footer Link ========================
add_settings_field( 'sls-foo-hover', 'Link Hover: ', function(){

    $navBg = get_option('sls_color')['foo-hover'];
    $navBgColor = !empty( $navBg ) ? $navBg : '#e74b2c';
    echo '<input type="color" name="sls_color[foo-hover]" value="'. $navBgColor .'"/>';

}, 'sls-color', 'sls-color-4' );
<?php
/**
 * Header file
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */ ?>

<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php $htmlHeader = get_option('sls_hnf')['header'];
    if( !empty( $htmlHeader ) ){
        echo $htmlHeader;
    } ?>

    <?php wp_head(); ?>

    <?php 
    /**
     * DNS Prefeer
     * 
     * @package silohon-seo
     */
    $thisUrl = get_bloginfo( 'url' );
    $tagReplace = array( 'https://', 'http://' );
    $replaceTo = '//';
    $fixReplace = str_replace( $tagReplace, $replaceTo, $thisUrl );
    
    echo '<link rel="dns-prefetch" href="'. $fixReplace .'"/>';
    ?>
</head>
<body <?php body_class(); ?>>


<?php
/**
 * Controll Css & JavaScript for Theme
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


add_action( 'wp_enqueue_scripts', 'sls_wp_enqueue_scripts' );
function sls_wp_enqueue_scripts(){
    /**
     * Main Css For header & Footer Only
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    wp_enqueue_style( 
        'sls-css-main',
        SLURI . '/asset/css/main.css',
        array(),
        fileatime( SLDIR . '/asset/css/main.css'),
        'all'
    );

    /**
     * Homepage Css Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if( is_home() ){
        wp_enqueue_style( 
            'sls-home-style', 
            SLURI . '/asset/css/home.css',
            array(), fileatime( SLDIR . '/asset/css/home.css'),
            'all'
        );
    }

    /**
     * Author CSS Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if(is_author()){
        wp_enqueue_style( 
            'sls-author-style', 
            SLURI . '/asset/css/author.css', 
            array(), fileatime( SLDIR . '/asset/css/author.css'), 
            'all'
        );
    }


    /**
     * Category CSS Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if(is_category()){
        wp_enqueue_style( 
            'sls-cat-style', 
            SLURI . '/asset/css/category.css', 
            array(), fileatime( SLDIR . '/asset/css/category.css'), 
            'all'
        );
    }



    /**
     * Tag CSS Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if(is_tag()){
        wp_enqueue_style( 
            'sls-tag-style', 
            SLURI . '/asset/css/tag.css', 
            array(), fileatime( SLDIR . '/asset/css/tag.css'), 
            'all'
        );
    }


    /**
     * Main js for fronted
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    wp_enqueue_script( 
        'sls-main-js',
        SLURI . '/asset/js/main.js',
        [], fileatime( SLDIR . '/asset/js/main.js'),
        true
    );

}
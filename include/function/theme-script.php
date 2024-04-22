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
     * Arthive date CSS Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if(is_date()){
        wp_enqueue_style( 
            'sls-date-style', 
            SLURI . '/asset/css/date.css', 
            array(), fileatime( SLDIR . '/asset/css/date.css'), 
            'all'
        );
    }


    /**
     * Single Post CSS Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if(is_single()){
        wp_enqueue_style( 
            'sls-single-style', 
            SLURI . '/asset/css/single.css', 
            array(), fileatime( SLDIR . '/asset/css/single.css'), 
            'all'
        );
    }

    /**
     * Searche Result CSS Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if(is_search()){
        wp_enqueue_style( 
            'sls-search-style', 
            SLURI . '/asset/css/search.css', 
            array(), fileatime( SLDIR . '/asset/css/search.css'), 
            'all'
        );
    }


    /**
     * 404 CSS Silohon SEO Wordpress Theme
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if(is_404()){
        wp_enqueue_style( 
            'sls-404-style', 
            SLURI . '/asset/css/no-found.css', 
            array(), fileatime( SLDIR . '/asset/css/no-found.css'), 
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
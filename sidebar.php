<?php
/**
 * Sidebar file Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */ ?>

<aside class="slsSidebar">
    <?php 
        /**
         * For homepage only
         * 
         * @package silohon-seo
         */
        if( is_home() || is_page()){
            if(is_active_sidebar('home')){
                dynamic_sidebar( 'home' );
            }
        }


        /**
         * For Archive only
         * 
         * @package silohon-seo
         */

        else if( is_archive()){
            if( is_active_sidebar( 'archive' )){
                dynamic_sidebar( 'archive' );
            }
        }


        /**
         * For Singular only
         * 
         * @package silohon-seo
         */
        else if( is_single()){
            if( is_active_sidebar( 'single' )){
                dynamic_sidebar( 'single' );
            }
        }
    ?>
</aside>
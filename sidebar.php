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
        if( is_home()){
            if(is_active_sidebar('home')){
                dynamic_sidebar( 'home' );
            }
        }
    ?>
</aside>
<?php
/**
 * Single Page Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

get_header();

$get_meta = get_post_custom( $post->ID );
if(!empty($get_meta['sls_page_builderss'])){

    /**
     * For hero looping data
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */
    if( !empty( $get_meta['sls_hero'][0])){
        SLPART('views/template/custom/hero');
    }

    /**
     * Multi style
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */ ?>
    <div class="container">
        <div class="slsPartisi">
            <div class="partisi_inner">
                <?php 
                /**
                 * Call Ads Before Post
                 * 
                 * @package silohon-seo
                 */
                $adsPost = get_option('sls_ads_set')['before_content'];
                if(!empty($adsPost)){
                    echo '<div class="my-ads">';
                    echo $adsPost;
                    echo '</div>';
                }
                
                SLPART('views/template/custom/builder'); ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>

    <?php
} else{
    /**
     * Normalis page
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */

    echo get_the_title();

}

get_footer();
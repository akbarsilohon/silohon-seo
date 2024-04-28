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
     */ ?>

    <div class="slsSingle container">
        <div class="singleContent">
            <article id="post-<?php the_ID(); ?>" class="slsArticle">
                <div class="assetTop">
                    <?php the_title('<h2 class="slsHeading">', '</h2>'); ?>
                    <?php 
                        $options_img = get_option('sls_article_settings')['thumbnail'];
                        if( has_post_thumbnail() && $options_img === 'show'){
                            the_post_thumbnail( 'full', array(
                                'loading'           =>  'lazy',
                                'class'             =>  'sls_single-thumbnail'
                            ));
                        }
                    ?>
                </div>

                <div class="slsContent">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>

        <?php get_sidebar(); ?>
    </div>

<?php
}

get_footer();
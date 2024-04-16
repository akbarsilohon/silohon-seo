<?php
/**
 * Index file Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

get_header();

if( have_posts()){
    /**
     * If this blog have the posts
     * 
     * render this
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */ ?>

    <div class="slsBlog container">
        <div class="slsContent">
            <?php

                /**
                 * Looping the Post
                 * 
                 * @package silohon-seo
                 */
                while(have_posts()){
                    the_post(); ?>

                    <article class="<?php echo sls_check_thumbnails( get_the_ID() ); ?>" id="post-<?php the_ID(); ?>">
                        <?php if( has_post_thumbnail()){ ?>
                            <a href="<?php the_permalink(); ?>" class="slsUri-thum">
                                <?php
                                $size = !empty(get_option('sls_article_settings')['thumb_size']) ? get_option('sls_article_settings')['thumb_size'] : 'full';
                                the_post_thumbnail( $size, array(
                                    'class'         =>  'slsThum-img',
                                    'loading'       =>  'lazy'
                                ));
                                ?>
                            </a>
                            <?php
                        } ?>

                        <div class="slsContent-body">
                            <div class="slsContent-meta">
                                <?php  sls_cat_with_link(); ?>
                                <span class="sparator">/</span>
                                <span class="slsDate"><?php the_time('d, m, Y'); ?></span>
                            </div>

                            <a href="<?php echo the_permalink(); ?>" class="slsContent-heading">
                                <?php the_title( '<h2 class="slsContent-title">', '</h2>' ); ?>
                            </a>

                            <?php echo the_excerpt(); ?>
                        </div>
                    </article>

                    <?php
                }

            ?>

            <div class="sls_pagination">
                <?php 
                    echo paginate_links(
                        array(
                            'mid_size'          =>  1
                        )
                    );
                ?>
            </div>
        </div>

        <?php get_sidebar('home'); ?>
    </div>

<?php
} else{
    /**
     * Get empy file in views folder
     * 
     * @package silohon-seo
     * 
     * @link https://github.com/akbarsilohon/silohon-seo.git
     */

    SLPART( 'views/empty' );
}

get_footer();
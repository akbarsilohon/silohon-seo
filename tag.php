<?php
/**
 * Looping Tags Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

get_header();

if( have_posts()){
    /**
     * If Tag have Posts
     * 
     * Render This page
     * 
     * @package silohon-seo
     */ ?>

    <div class="slsBlog container">
        <div class="slsContent">

            <div class="sectionCat">
                <span class="sectionSpan"><?php echo single_tag_title(); ?></span>
            </div>

            <?php 
            
            while(have_posts()){
                the_post(); ?>

                    <article class="<?php echo sls_check_thumbnails( get_the_ID() ); ?>" id="post-<?php the_ID(); ?>">
                        <?php sls_generate_thumbnail_index(get_the_ID()); ?>

                        <div class="slsContent-body">
                            <div class="slsContent-meta">
                                <a href="<?php echo get_author_posts_url(get_the_author_ID()); ?>" title="<?php echo get_the_author_meta( 'display_name', get_the_author_ID() ); ?>" class="slsCatlink">
                                    <?php echo get_the_author_meta( 'display_name', get_the_author_ID() ); ?>
                                </a>
                                <span class="sparator">/</span>
                                <span class="slsDate"><?php the_time('d, m, Y'); ?></span>
                            </div>

                            <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" class="slsContent-heading">
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

        <?php get_sidebar('archive'); ?>
    </div>

    <?php

} else{
    SLPART( 'views/empty' );
}

get_footer();
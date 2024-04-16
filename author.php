<?php
/**
 * Author page Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

get_header();

if(have_posts()){
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
            <div class="author-box">
                <?php echo get_avatar( get_the_author_ID(), 150, null, get_the_author_nickname()); ?>
                <div class="bodyBox">
                    <?php
                        echo '<h2 class="authorName">'. get_the_author_meta( 'display_name', get_the_author_ID() ) .'</h2>';
                        if( !empty(get_the_author_meta( 'url', get_the_author_ID()))){ ?>
                            <a href="<?php echo get_the_author_meta( 'url', get_the_author_ID()); ?>" class="authorUri">About Me</a>
                            <?php
                        }

                        if(!empty(get_the_author_meta( 'description', get_the_author_ID()))){ ?>
                            <p class="authorDesc"><?php echo get_the_author_meta( 'description', get_the_author_ID()); ?></p>
                            <?php
                        }
                    ?>
                </div>
            </div>

            <?php 
            
            while(have_posts()){
                the_post(); ?>

                <article class="<?php echo sls_check_thumbnails( get_the_ID() ); ?>" id="post-<?php the_ID(); ?>">
                    <?php
                        if( has_post_thumbnail()){ ?>
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
                        }
                    ?>

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

        <?php get_sidebar('archive'); ?>
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
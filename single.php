<?php
/**
 * Shortcode silohon
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

get_header(); ?>

<div class="slsSingle container">
    <div class="singleContent">
        <!-- Article -->
        <article id="post-<?php the_ID(); ?>" class="slsArticle" itemscope itemtype="https://schema.org/NewsArticle">
            <div class="assetTop">
                <div class="catSpan">
                    <?php sls_cat_with_link(); ?>
                </div>
                <?php the_title('<h2 class="slsHeading" itemprop="headline">', '</h2>'); ?>

                <!-- Meta SEO -->
                <meta itemprop="image" content="<?php echo get_the_post_thumbnail_url( null, 'thumbnail' ) ?>" />
                <meta itemprop="image" content="<?php echo get_the_post_thumbnail_url( null, 'medium' ) ?>" />
                <meta itemprop="image" content="<?php echo get_the_post_thumbnail_url( null, 'large' ) ?>" />
                <meta itemprop="image" content="<?php echo get_the_post_thumbnail_url( null, 'full' ) ?>" />
                <meta itemprop="datePublished" content="<?php the_time('c'); ?>">
                <meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>">

                <div class="authorMeta">
                    <?php 
                        $ids = get_post_field( 'post_author', get_the_ID());
                        $names = get_the_author_meta( 'display_name', $ids );
                        $web = get_author_posts_url( $ids );
                        $avatar = get_avatar_url( $ids, array('size' => 150));

                        echo '<img width="150" height="150" class="slsAuth_img" src="'. $avatar .'">';
                    ?>
                    <div class="bodyMeta">
                        <a href="<?php echo $web . get_the_author_nickname( $ids ); ?>" class="slsUthUri">
                            By: <span class="slsAuthName"> <?php echo $names; ?></span>
                        </a>
                        <span class="dates"><?php echo the_time('F D Y'); ?></span>
                    </div>

                    <div style="display: none;" itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <meta itemprop="url" content="<?php echo $web; ?>">
                        <meta itemprop="name" content="<?php echo $names; ?>">
                    </div>
                </div>

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

        <!-- Tags -->

        <!-- Related Posts -->

        <!-- Comments -->
    </div>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
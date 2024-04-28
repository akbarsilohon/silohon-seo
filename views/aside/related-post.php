<?php
/**
 * Render related posts with their thumbnails
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

$count = !empty(get_option('sls_article_settings')['recount']) ? get_option('sls_article_settings')['recount'] : 4;
$relateds = get_posts(
    array(
        'category__in'          =>  wp_get_post_categories($post->ID),
        'numberposts'           =>  $count,
        'post__not_in'          =>  array($post->ID),
        'orderby'               =>  'rand'
    )
);

if( $relateds ) : ?>

    <aside class="slsRels">
        <div class="spanRel">
            <span class="relT">Related</span>
        </div>

        <div class="slsInner_rels">
            <?php foreach( $relateds as $post ) : ?>
                <?php setup_postdata( $post ); ?>
                <div class="inner_rel">
                    <a href="<?php echo the_permalink(); ?>" class="relTHumUri">
                        <?php generate_squar_thumnails(get_the_ID(), null); ?>
                    </a>
                    <div class="relBody">
                        <span class="metaDate">Post On: <?php echo the_time('F D Y'); ?></span>
                        <a href="<?php echo the_permalink(); ?>" class="relTitle">
                            <?php echo the_title( '<h3 class="relH3">', '</h3>' ); ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </aside>

<?php
endif;
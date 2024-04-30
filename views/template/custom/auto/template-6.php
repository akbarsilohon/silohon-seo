<?php
/**
 * Partisi
 * 
 * Style Template 6
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

global $post, $data;
$category_id = $data['cat'];

$args = array(
    'posts_per_page'        =>  $data['count'],
    'post_type'             =>  'post',
    'post_status'           =>  'publish',
    'no_found_rows'         =>  true,
    'ignore_sticky_posts'   =>  true,
    'cat'                   =>  $category_id
);

if( !empty( $data['order'] ) && $data['order'] == 'rand' ){
    $args['orderby'] = 'rand';
}

$style6 = new WP_Query( $args );
$CatName = get_the_category_by_ID( $category_id ); ?>

<section class="sls_section">
    <div class="aside_judulBox">
        <span class="asideTitle"><?php echo $CatName; ?></span>
    </div>

    <?php if($style6->have_posts()) : ?>
        <div class="sls_block">
            <?php while($style6->have_posts()) :
                $style6->the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" class="sls_grid-2-330">
                        <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" class="dataUrl">
                            <?php generate_squar_thumnails(get_the_ID(), 'sls-imgfull mg1'); ?>
                        </a>
                        <div class="sls_grid-body">
                            <div class="sls_grid-meta">
                                <span class="grid_author">By: <span><?php the_author(); ?></span></span>
                                <span class="grid_sparat">/</span>
                                <span class="grid_date">On: <?php echo the_time('F D Y'); ?></span>
                            </div>
                            <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" class="dataUri-title">
                                <?php echo the_title('<h2 class="grid_title">', '</h2>'); ?>
                            </a>
                            <?php the_excerpt(); ?>
                        </div>
                    </article>

            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>

<?php
wp_reset_postdata();
wp_reset_query();
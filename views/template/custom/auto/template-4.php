<?php
/**
 * Partisi
 * 
 * Style Template 4
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

$style4 = new WP_Query( $args );
$CatName = get_the_category_by_ID( $category_id ); ?>

<section class="sls_section">
    <div class="aside_judulBox">
        <span class="asideTitle"><?php echo $CatName; ?></span>
    </div>

    <?php if($style4->have_posts()) : ?>

        <div class="sls_grid-2">
            <?php while($style4->have_posts()) : $style4->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" class="sls_block" style="margin-bottom:1.5rem;">
                    <a href="<?php echo the_permalink(); ?>" class="dataUrl">
                        <?php generate_squar_thumnails(get_the_ID(), 'sls-imgfull'); ?>
                    </a>
                    <div class="sls_grid-body" style="margin-top:1rem;">
                        <div class="sls_grid-meta">
                            <span class="grid_author">By: <span><?php the_author(); ?></span></span>
                            <span class="grid_sparat">/</span>
                            <span class="grid_date">On: <?php echo the_time('F D Y'); ?></span>
                        </div>
                        <a href="<?php echo the_permalink(); ?>" class="dataUri-title">
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
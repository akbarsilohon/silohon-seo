<?php
/**
 * Partisi
 * 
 * Style Template 1
 * 
 * One on top
 * 
 * Grid to colm on bottom
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

$style1 = new WP_Query( $args );
$CatName = get_the_category_by_ID( $category_id );

$i = 0; ?>

<section class="sls_section">
    <div class="aside_judulBox">
        <span class="asideTitle"><?php echo $CatName; ?></span>
    </div>
</section>

<?php
wp_reset_postdata();
wp_reset_query();
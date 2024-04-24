<?php
/**
 * Section Hero Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

$get_meta = get_post_custom( $post->ID );
if( isset( $get_meta['sls_hero'][0] )){
    $hero = false;
    if( !empty( $get_meta['sls_hero'][0] )){
        $hero = $get_meta['sls_hero'][0];
        if( is_serialized( $hero )){
            $hero = unserialize( $hero );
        }
    }
}

if(!empty($hero) && is_array($hero)){
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'no_found_rows'          => true,
        'ignore_sticky_posts'	 => true
    );

    if( !empty( $hero['cat'] )){
        $args['cat'] = $hero['cat'];
    }

    if( !empty( $hero['order'] ) && $hero['order'] == 'true' ){
        $args['orderby'] = 'rand';
    }

    $hero_query = new WP_Query( $args );

    if ( $hero_query->have_posts() ) :
?>
    <div id="hero-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                <div class="carousel-item">
                    <?php the_title(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
    endif;

    wp_reset_postdata();
    wp_reset_query();
}
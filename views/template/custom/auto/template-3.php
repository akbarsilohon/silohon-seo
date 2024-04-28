<?php
/**
 * Partisi
 * 
 * Style Template 3
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

$style3 = new WP_Query( $args );
$CatName = get_the_category_by_ID( $category_id );

$i = 0; ?>

<section class="sls_section">
    <div class="aside_judulBox">
        <span class="asideTitle"><?php echo $CatName; ?></span>
    </div>

    <?php if($style3->have_posts()){ ?>

        <div class="sls_block">
            <div class="sls_grid-2">
                <?php 
                    $count = $style3->post_count;
                    while( $i < min(2, $count) && $style3->have_posts()){
                        $style3->the_post();
                        $i ++; ?>

                        <article id="post-<?php the_ID(); ?>" class="boxRelative">
                            <a href="<?php echo the_permalink(); ?>" class="urlBox">
                                <?php generate_squar_thumnails(get_the_ID(), 'boxThumbnail'); ?>
                                <div class="body_absolute">
                                    <div class="absolute-meta">
                                        <span class="grid_author">By: <?php the_author(); ?></span>
                                        <span class="grid_sparat">/</span>
                                        <span class="grid_date">On: <?php echo the_time('F D Y'); ?></span>
                                    </div>
                                    <?php echo the_title('<h2 class="grid_title">', '</h2>'); ?>
                                </div>
                            </a>
                        </article>

                        <?php
                    } ?>
            </div>
            <div class="sls_grid-2" style="margin-top:1rem;">
                <?php 
                $i = 0;
                while($style3->have_posts()){
                    $style3->the_post();
                    $i ++; ?>

                    <article id="post-<?php the_ID(); ?>" class="sls_grid-2-90">
                        <a href="<?php echo the_permalink(); ?>" class="dataUrl">
                            <?php generate_squar_thumnails(get_the_ID(), 'sls-imgmedium'); ?>
                        </a>
                        <div class="sls_grid-body">
                            <div class="sls_grid-meta">
                                <span class="grid_author">By: <span><?php the_author(); ?></span></span>
                                <span class="grid_sparat">/</span>
                                <span class="grid_date">On: <?php echo the_time('F D Y'); ?></span>
                            </div>
                            <a href="<?php echo the_permalink(); ?>" class="dataUri-title">
                                <?php echo the_title('<h2 class="grid_title-small">', '</h2>'); ?>
                            </a>
                        </div>
                    </article>

                    <?php
                }
                ?>
            </div>
        </div>

        <?php
    } ?>

</section>

<?php
wp_reset_postdata();
wp_reset_query();
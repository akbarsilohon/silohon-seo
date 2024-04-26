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

    <?php if( $style1->have_posts()){ ?>

        <div class="sls_block">
            <?php
                $count = $style1->post_count;
                while( $i < min( 1, $count ) && $style1->have_posts()){
                    $style1->the_post();
                    $i ++; ?>

                    <article id="post-<?php the_ID(); ?>" class="sls_grid-2-330">
                        <a href="<?php echo the_permalink(); ?>" class="dataUrl">
                            <?php if(has_post_thumbnail()){
                                the_post_thumbnail( 
                                    'full',
                                    array(
                                        'class'     =>  'sls-imgfull mg1',
                                        'loading'   =>  'lazy'
                                    )
                                );
                            } ?>
                        </a>
                        <div class="sls_grid-body">
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

                    <?php
                }

            ?>

            <div class="sls_grid-2">
                <?php
                    $i = 0;
                    while($style1->have_posts()){
                        $style1->the_post();
                        $i ++; ?>

                        <article id="post-<?php the_ID(); ?>" class="sls_grid-2-90">
                            <a href="<?php echo the_permalink(); ?>" class="dataUrl">
                                <?php if(has_post_thumbnail()){
                                    the_post_thumbnail(
                                        'medium',
                                        array(
                                            'class'     => 'sls-imgmedium',
                                            'loading'   =>  'lazy'
                                        )
                                    );
                                } ?>
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
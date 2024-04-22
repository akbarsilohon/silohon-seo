<?php
/**
 * Page Not Found Handler Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

get_header(); ?>


<div class="sls404 container">
    <div class="_404box">
        <h1>404 :(</h1>
        <p>Page not found, please visit another time, or read another article from my blog</p>
    </div>

    <?php
    $Loop404 = new WP_Query(
        array(
            'posts_per_page'        =>  4,
            'orderby'               =>  'rand',
            'post_status'           =>  'publish',
            'post_type'             =>  'post'
        )
    );

    if( $Loop404->have_posts()){ ?>

        <div class="loop404">
            <div class="title404">
                <span class="span404">New Article</span>
            </div>

            <div class="_404_innerloop">
            <?php while($Loop404->have_posts()){
                $Loop404->the_post(); ?>

                <article id="post-<?php the_ID(); ?>" class="_404art">

                    <?php if( has_post_thumbnail()){ ?>
                        <a href="<?php echo the_permalink(); ?>" class="_404thum_uri">
                            <?php the_post_thumbnail(
                                'medium',
                                array(
                                    'class'     =>  '_404thumb',
                                    'loading'   =>  'lazy'
                                )
                            ); ?>
                        </a>
                        <?php
                    } ?>

                    <div class="_404body">
                        <div class="_404meta">
                            <span class="_404cat"><?php sls_cat_without_link(); ?></span>
                            <span class="_404sparator">/</span>
                            <span class="_404dates"><?php echo the_time('F D Y'); ?></span>
                        </div>
                        <a href="<?php echo the_permalink(); ?>" class="_404tit_uri">
                            <?php echo the_title( '<h3 class="_404tit">', '</h3>' ); ?>
                        </a>
                    </div>

                </article>

                <?php
            } ?>
            </div>
        </div>

        <?php
    }

    wp_reset_postdata();
    wp_reset_query();
    ?>
</div>


<?php
get_footer();
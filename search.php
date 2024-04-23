<?php
/**
 * Searche result Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

SLPART( 'views/template/custom-header' );

if(have_posts()){ ?>

    <div class="slsGlo">
        <div class="loopinsearch">
            <?php while(have_posts()){
                the_post(); ?>

                <article id="post-<?php the_ID(); ?>" class="glArticle">
                    <a href="<?php echo the_permalink(); ?>" class="glhead">
                        <div class="glLeft">
                            <?php 
                                $img = get_site_icon_url();
                                $fixImg = !empty($img) ? $img : SLURI . '/asset/img/site/seo-favicon.png';

                                echo '<img width="150" height="150" src="'.$fixImg.'" class="glWeb"/>';
                            ?>
                        </div>
                        <div class="glRight">
                            <span class="glBname"><?php bloginfo( 'name' ); ?></span>
                            <div class="glMeta">
                                <span class="glBlog"><?php echo bloginfo( 'url' ); ?></span>
                                <span class="glSpa">></span>
                                <span class="glCat"><?php sls_cat_without_link() ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="glBody">
                        <a href="<?php echo the_permalink(); ?>" class="glUri">
                            <?php echo the_title( '<h3 class="glTi">', '</h3>' ); ?>
                        </a>
                        <?php the_excerpt(); ?>
                    </div>
                </article>

                <?php
            } ?>

            <div class="moreLoop">
                <span>More Result</span>
            </div>
        </div>

        <div class="spaceEmpty"></div>
    </div>

<?php
}


SLPART( 'views/template/custom-footer' );
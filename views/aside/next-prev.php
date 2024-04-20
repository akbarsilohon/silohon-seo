<?php
/**
 * Render next and previous single post
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

$prev_post = get_previous_post();
$next_post = get_next_post();

if (!empty($prev_post) || !empty($next_post)) : ?>

    <div class="slsSingleNav">
        <?php if (!empty($prev_post)) : ?>
            <div class="slsSingleNavPrev">
                <a href="<?php echo get_permalink($prev_post->ID); ?>">
                    <span class="slsSingleNavLabel"><<</span>
                    <span class="slsSingleNavTitle"><?php echo $prev_post->post_title; ?></span>
                </a>
            </div>
        <?php endif; ?>

        <?php if (!empty($next_post)) : ?>
            <div class="slsSingleNavNext">
                <a href="<?php echo get_permalink($next_post->ID); ?>">
                    <span class="slsSingleNavTitle"><?php echo $next_post->post_title; ?></span>
                    <span class="slsSingleNavLabel">>></span>
                </a>
            </div>
        <?php endif; ?>
    </div>

<?php
endif;

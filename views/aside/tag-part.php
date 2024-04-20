<?php
/**
 * Render tags post
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

// $posttags = get_the_tags();
// if ($posttags) {
//     foreach($posttags as $tag) {
//         echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> '; 
//     }
// }

$slsTags = get_the_tags();
if( $slsTags ) : ?>

    <div class="slsTags">
        <span class="slsSpanTag">Tags:</span>

        <div class="tagInner">
            <?php foreach( $slsTags as $tag ) : ?>

                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="slsTag">#<?php echo $tag->name; ?></a>

            <?php endforeach; ?>
        </div>

    </div>

<?php
endif;
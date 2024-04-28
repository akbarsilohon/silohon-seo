<?php
/**
 * File for handler Single Posts Handler
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


add_settings_section( 'sls-article', '<h2 class="slsSection">Blog</h2>', null, 'sls-single-post' );
add_settings_section( 'sls-article-2', '<h2 class="slsSection">Article</h2>', null, 'sls-single-post' );
register_setting( 'sls-article-group', 'sls_article_settings' );


// =========================================
// Redirect 404 ============================
add_settings_field( 'art-404', 'Reirect 404 to Homepage', function(){
    $nothing404 = get_option('sls_article_settings')['404'];
    $conDition = !empty( $nothing404 ) && $nothing404 === 'true' ? 'checked' : '';
    echo '<input type="checkbox" name="sls_article_settings[404]" value="true" '.$conDition.' />';
}, 'sls-single-post', 'sls-article' );

// Lazyload IMG ==============================
add_settings_field( 'art-lazyload', 'Lazy Load IMG', function(){
    $options = get_option('sls_article_settings')['lazy_load_img'];
    $conDition = !empty($options) && $options === 'true' ? 'checked' : '';

    echo '<input type="checkbox" name="sls_article_settings[lazy_load_img]" value="true" '. $conDition .'/>';

}, 'sls-single-post', 'sls-article' );


// Thumbnails size =============================
// =============================================
add_settings_field( 'art-thum-size', 'Thumbnail Size: ', function(){
    $thumbSize = get_option('sls_article_settings')['thumb_size']; ?>
    <select name="sls_article_settings[thumb_size]">
        <option value="" <?php selected( $thumbSize, '' ); ?>>Default</option>
        <option value="thumbnail" <?php selected( $thumbSize, 'thumbnail' ); ?>>Thumbnail</option>
        <option value="medium" <?php selected( $thumbSize, 'medium' ); ?>>Medium</option>
        <option value="large" <?php selected( $thumbSize, 'large' ); ?>>Large</option>
        <option value="full" <?php selected( $thumbSize, 'full' ); ?>>Full</option>
    </select>
    <?php
}, 'sls-single-post', 'sls-article');


// Excerpt Length ================================
// ===============================================
add_settings_field( 'art-excertpt-length', 'Excerpt Length: ', function(){
    $excerptLength = !empty(get_option('sls_article_settings')['excertpt-length']) ? get_option('sls_article_settings')['excertpt-length'] : 25;
    echo '<input type="number" name="sls_article_settings[excertpt-length]" value="'. $excerptLength .'"/>';
}, 'sls-single-post', 'sls-article');


// Excerpt More ==================================
// ===============================================
add_settings_field( 'art-excerpt-more', 'Excerpt More: ', function(){
    $excMore = !empty(get_option('sls_article_settings')['excertpt-more']) ? get_option('sls_article_settings')['excertpt-more'] : 'Read More';
    echo '<input type="text" name="sls_article_settings[excertpt-more]" value="'. $excMore .'"/>';
}, 'sls-single-post', 'sls-article' );


// Posts Thumbnails ============================
// =============================================
add_settings_field( 'art-thumb', 'Show Thumbnail: ', 'art_thumb_render', 'sls-single-post', 'sls-article-2' );
function art_thumb_render(){
    $thumbnail = get_option('sls_article_settings')['thumbnail']; ?>
    <input type="checkbox" name="sls_article_settings[thumbnail]" value="show" <?php if( $thumbnail === 'show') echo 'checked'; ?> />
    <?php
}


// Protect Content =============================
// =============================================
add_settings_field( 'art-protect', 'Protect Content', 'art_protect_render', 'sls-single-post', 'sls-article-2' );
function art_protect_render(){
    $protect = get_option('sls_article_settings')['protect']; ?>
    <input type="checkbox" name="sls_article_settings[protect]" value="yes" <?php if( $protect === 'yes' ) echo 'checked'; ?>/>
    <?php
}


// Show Tags ===================================
// =============================================
add_settings_field( 'art-tag', 'Show Tags: ', 'art_tag_render', 'sls-single-post', 'sls-article-2' );
function art_tag_render(){
    $tag = get_option('sls_article_settings')['tag']; ?>
    <input type="checkbox" name="sls_article_settings[tag]" value="yes" <?php if( $tag === 'yes' ) echo 'checked'; ?>/>
    <?php
}

// Show Next & Prev Article ====================
// =============================================
add_settings_field( 'art-np', 'Next and Prev Article: ', 'art_np_render', 'sls-single-post', 'sls-article-2' );
function art_np_render(){
    $np = get_option('sls_article_settings')['np']; ?>
    <input type="checkbox" name="sls_article_settings[np]" value="yes" <?php if( $np === 'yes' ) echo 'checked'; ?>/>
    <?php
}


// Related Post ================================
// =============================================
add_settings_field( 'art-rel', 'Show Related Posts: ', 'art_rel_render', 'sls-single-post', 'sls-article-2' );
function art_rel_render(){
    $related = get_option('sls_article_settings')['rel']; ?>
    <input type="checkbox" name="sls_article_settings[rel]" value="yes" <?php if( $related === 'yes' ) echo 'checked'; ?>/>
    <?php
}


// Related Count ===============================
// =============================================
add_settings_field( 'art-recount', 'Related Count: ', 'art_recount_render', 'sls-single-post', 'sls-article-2' );
function art_recount_render(){
    $relCount = get_option('sls_article_settings')['recount']; ?>
    <input type="number" name="sls_article_settings[recount]" value="<?php echo $relCount ?>" />
    <?php
}


// Comments ====================================
// =============================================
add_settings_field( 'art-com', 'Can Comments: ', 'art_com_render', 'sls-single-post', 'sls-article-2' );
function art_com_render(){
    $com = get_option('sls_article_settings')['com']; ?>
    <input type="checkbox" name="sls_article_settings[com]" value="yes" <?php if( $com === 'yes' ) echo 'checked'; ?>/>
    <?php
}
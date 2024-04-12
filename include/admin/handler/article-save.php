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


add_settings_section( 'sls-article', null, null, 'sls-single-post' );
register_setting( 'sls-article-group', 'sls_article_settings' );


// Posts Thumbnails ============================
// =============================================
add_settings_field( 'art-thumb', 'Show Thumbnail: ', 'art_thumb_render', 'sls-single-post', 'sls-article' );
function art_thumb_render(){
    $thumbnail = get_option('sls_article_settings')['thumbnail']; ?>
    <input type="checkbox" name="sls_article_settings[thumbnail]" value="show" <?php if( $thumbnail === 'show') echo 'checked'; ?> />
    <?php
}


// Protect Content =============================
// =============================================
add_settings_field( 'art-protect', 'Protect Content', 'art_protect_render', 'sls-single-post', 'sls-article' );
function art_protect_render(){
    $protect = get_option('sls_article_settings')['protect']; ?>
    <input type="checkbox" name="sls_article_settings[protect]" value="yes" <?php if( $protect === 'yes' ) echo 'checked'; ?>/>
    <?php
}


// Show Next & Prev Article ====================
// =============================================
add_settings_field( 'art-np', 'Next and Prev Article: ', 'art_np_render', 'sls-single-post', 'sls-article' );
function art_np_render(){
    $np = get_option('sls_article_settings')['np']; ?>
    <input type="checkbox" name="sls_article_settings[np]" value="yes" <?php if( $np === 'yes' ) echo 'checked'; ?>/>
    <?php
}


// Show Tags ===================================
// =============================================
add_settings_field( 'art-tag', 'Show Tags: ', 'art_tag_render', 'sls-single-post', 'sls-article' );
function art_tag_render(){
    $tag = get_option('sls_article_settings')['tag']; ?>
    <input type="checkbox" name="sls_article_settings[tag]" value="yes" <?php if( $tag === 'yes' ) echo 'checked'; ?>/>
    <?php
}


// Related Post ================================
// =============================================
add_settings_field( 'art-rel', 'Show Related Posts: ', 'art_rel_render', 'sls-single-post', 'sls-article' );
function art_rel_render(){
    $related = get_option('sls_article_settings')['rel']; ?>
    <input type="checkbox" name="sls_article_settings[rel]" value="yes" <?php if( $related === 'yes' ) echo 'checked'; ?>/>
    <?php
}


// Related Count ===============================
// =============================================
add_settings_field( 'art-recount', 'Related Count: ', 'art_recount_render', 'sls-single-post', 'sls-article' );
function art_recount_render(){
    $relCount = get_option('sls_article_settings')['recount']; ?>
    <input type="number" name="sls_article_settings[recount]" value="<?php echo $relCount ?>" />
    <?php
}


// Comments ====================================
// =============================================
add_settings_field( 'art-com', 'Can Comments: ', 'art_com_render', 'sls-single-post', 'sls-article' );
function art_com_render(){
    $com = get_option('sls_article_settings')['com']; ?>
    <input type="checkbox" name="sls_article_settings[com]" value="yes" <?php if( $com === 'yes' ) echo 'checked'; ?>/>
    <?php
}
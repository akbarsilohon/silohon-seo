<?php
/**
 * Handler post Thumbnails
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

// Check thumbnails ==========================
// ===========================================
function sls_check_thumbnails( $post_id ){
    if(has_post_thumbnail( $post_id )){
        return 'sls-with-thumbnail';
    } else if( !has_post_thumbnail( $post_id ) ){
        $cekKontent = get_the_content( $post_id );
        if(strpos($cekKontent, '<img') === false ){
            return 'sls-without-thumbnail';
        } else{
            return 'sls-with-thumbnail';
        }
    }
}


// Generate Thumbnail for index file =================
// ===================================================
function sls_generate_thumbnail_index( $post_id ){
    $size = !empty(get_option('sls_article_settings')['thumb_size']) ? get_option('sls_article_settings')['thumb_size'] : 'full';

    if(has_post_thumbnail($post_id)){

        $thumbnailIndex .= '<a href="'. get_the_permalink($post_id) .'" class="slsUri-thum">';
        $thumbnailIndex .= get_the_post_thumbnail( $post_id, $size, array('class' => 'slsThum-img', 'loading' => 'lazy') );
        $thumbnailIndex .= '</a>';

    } else{
        $content = get_the_content( null, false, $post_id );
        $first_img = '';
        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $first_img);

        $thumbnailIndex .= '<a href="'. get_the_permalink($post_id) .'" class="slsUri-thum">';
        $thumbnailIndex .= '<img width="200" height="200" src="'.$first_img[1].'" class="slsThum-img" loading="lazy"/>';
        $thumbnailIndex .= '</a>';
    }


    echo $thumbnailIndex;
}



/**
 * Page Builder thumbnails handler
 * 
 * @package silohon-seo
 */
// Carousel thumbnail
function hero_generate_img($post_id){
    $size = !empty(get_option('sls_article_settings')['thumb_size']) ? get_option('sls_article_settings')['thumb_size'] : 'full';

    $heroThumbnail = '';
    if(has_post_thumbnail( $post_id )){
        $heroThumbnail .= get_the_post_thumbnail( $post_id, $size, array(
                'class'         =>  'carousel_img',
                'loading'       =>  'lazy'
            )
        );
    } else{
        $content = get_the_content( null, false, $post_id );
        $heroImage = '';

        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $heroImage);

        $heroThumbnail .= '<img width="350" height="350" src="'.$heroImage[1].'" class="carousel_img" loading="lazy"/>';
    }

    echo $heroThumbnail;
}


/**
 * Generate Thumbnail for section page builder
 * 
 * @package silohon-seo
 */
function generate_squar_thumnails($post_id, $class){
    $size = !empty(get_option('sls_article_settings')['thumb_size']) ? get_option('sls_article_settings')['thumb_size'] : 'full';

    $thumbnailSquard = '';
    if(has_post_thumbnail( $post_id )){
        $thumbnailSquard .= get_the_post_thumbnail(
            $post_id,
            $size,
            array(
                'class'     =>  $class,
                'loading'   =>  'lazy'
            )
        );
    } else{
        $content = get_the_content( null, false, $post_id );
        $squar = '';
        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $squar);

        $thumbnailSquard .= '<img width="200" height="200" src="'.$squar[1].'" class="'.$class.'" loading="lazy"/>';
    }

    echo $thumbnailSquard;
}
<?php
/**
 * Save Page Builder Hander Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

add_action( 'save_post', 'sls_save_builder' );
function sls_save_builder( $post_id ){
    global $post;

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return $post_id;
    }

    /**
     * Checker Builder Active or Not
     * 
     * @package silohon-seo
     */
    $builder = $_POST['sls_page_builderss'];
    if( isset($builder) && !empty($builder)){
        update_post_meta( $post_id, 'sls_page_builderss', 'true' );
    } else{
        delete_post_meta( $post_id, 'sls_page_builderss' );
    }


    /**
     * Update data Post builder
     * 
     * @package silohon-seo
     */
    $buider_data = $_POST['sls_builder_data'];
    if(isset($buider_data) && !empty($buider_data)){
        $data = $buider_data;
        array_walk_recursive( $data, function(&$value){
            $value = sanitize_text_field($value);
        });

        update_post_meta( $post_id, 'sls_data', $data );
    } else{
        delete_post_meta( $post_id, 'sls_data' );
    }


    $hero = $_POST['hero'];
    if(isset($hero) && !empty($hero) && $hero['active'] == 'true' ){
        $hero_data = $hero;
        array_walk_recursive( $hero_data, function(&$value){
            $value = sanitize_text_field($value);
        });

        update_post_meta( $post_id, 'sls_hero', $hero_data );
    } else{
        delete_post_meta( $post_id, 'sls_hero' );
    }


}



/**
 * Editor Handler for classic Editor Only
 * 
 * @package silohon
 */
function is_gutenberg_editing(){
    if(version_compare( $GLOBALS['wp_version'], '5.0-beta', '>' )){
        $current_screen = get_current_screen();
        if($current_screen->is_block_editor()){
            return true;
        }
    }

    return false;
}



/**
 * Adding Meta Boxes Silohon SEO
 * 
 * @package silohon-seo
 */
add_action( 'add_meta_boxes', 'sls_builder_add_metaboxs' );
function sls_builder_add_metaboxs(){
    if(is_gutenberg_editing()){
        add_meta_box( 'is_not_classic_editor', esc_html__( "Can't Call Page Builder", 'silohon-seo' ), null, 'page', 'normal', 'high' );
    } else{
        add_action( 'edit_form_after_title', 'sls_build_page_builder' );
    }
}
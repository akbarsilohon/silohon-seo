<?php
/**
 * Silohon SEO Wordpress Theme
 * 
 * Build Page Builder
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


require SLDIR . '/include/build/handler/save.php';

function sls_build_page_builder(){
    global $post;
    $screen = get_current_screen();

    if( get_post_type( $post->ID ) != 'page' && $screen->post_type != 'page' ){
        return;
    }
    
    $get_meta = get_post_custom( $post->ID );
    if( isset( $get_meta['sls_data'][0])){
        $data = false;
        if( !empty( $get_meta['sls_data'][0] )){
            $data = $get_meta['sls_data'][0];
            if(is_serialized( $data )){
                $data = unserialize( $data );
            }
        }
    }


    $categories_obj = get_categories('hide_empty=0');
	$categories 	= array();
	foreach ($categories_obj as $pn_cat) {
		$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	}

    ?>

    <a href="" class="button button-large <?php if( !empty( $get_meta['sls_page_builderss'])) echo 'button-primary builder-active' ?>" id="is_call_builder">
        <?php 
            if( !empty($get_meta['sls_page_builderss'])){
                echo 'Remove Builder';
            } else{
                echo 'Use Builder';
            }
        ?>
    </a>
    <input type="hidden" name="sls_page_builderss" id="sls_page_builderss" value="<?php if( !empty( $get_meta['sls_page_builderss']) && $get_meta['sls_page_builderss'][0] == 'true' ) echo 'true'; ?>">

    <div id="slsHomeBuilder" <?php if( !empty( $get_meta['sls_page_builderss']) && $get_meta['sls_page_builderss'][0] == 'true' ) echo 'style="display:block;"'; ?>>
        <div class="builderContainer">
            <?php 
            /**
             * Get Hero Options
             * 
             * @package silohon-seo
             */
            require SLDIR . '/include/build/data/hero.php';


            /**
             * Get Style Options
             * 
             * @package silohon-seo
             */
            require SLDIR . '/include/build/data/datas.php';
            
            ?>
        </div>
    </div>

    <?php
}




/**
 * Register script and css
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */
add_action( 'admin_enqueue_scripts', 'sls_call_asset_for_page_builder' );
function sls_call_asset_for_page_builder(){
    wp_enqueue_style( 'sls-builder-css', SLURI . '/include/build/asset/builder.css', [], fileatime( SLDIR . '/include/build/asset/builder.css'), 'all' );

    wp_enqueue_script( 'sls-builder-js', SLURI . '/include/build/asset/builder.js', [], fileatime( SLDIR . '/include/build/asset/builder.js'), true );
}
<?php
/**
 * Auto Swich builder style
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

global $get_meta, $post, $data;

if(isset($get_meta['sls_data'][0])){
    $dataStyle = false;
    if( !empty( $get_meta['sls_data'][0] )){
        $dataStyle = $get_meta['sls_data'][0];
        if( is_serialized( $dataStyle )){
            $dataStyle = unserialize( $dataStyle );
        }
    }
}

if(!empty( $dataStyle ) && is_array( $dataStyle )){
    foreach( $dataStyle as $data ){
        switch( $data['style'] ){

            case 's1':
                SLPART('views/template/custom/auto/template-1');
            break;

            case 's2':
                SLPART('views/template/custom/auto/template-2');
            break;

            case 's3':
                SLPART('views/template/custom/auto/template-3');
            break;

            case 's4':
                SLPART('views/template/custom/auto/template-4');
            break;

            case 's5':
                SLPART('views/template/custom/auto/template-5');
            break;

            case 's6':
                SLPART('views/template/custom/auto/template-6');
            break;

            case 's7':
                SLPART('views/template/custom/auto/template-7');
            break;

        }
    }
}
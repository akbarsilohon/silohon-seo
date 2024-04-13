<?php
/**
 * Shortcode silohon
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


define( 'sls_shortcode_js', SLURI . '/include/code/script.js' );

// Add Shortcode to classic editor =============================
// =============================================================
add_action( 'admin_init', 'sls_register_js_shortcode' );
function sls_register_js_shortcode(){
    global $typenow;

    if( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ){
        return;
    }

    if( get_user_option('rich_editing') === 'true' ){
        add_filter( 'mce_external_plugins', 'sls_mce_external_plugins' );
        add_filter( 'mce_buttons', 'sls_mce_buttons' );
    }

    function sls_mce_external_plugins( $plugin_array ){
        $plugin_array['sls_mce'] = sls_shortcode_js;
        return $plugin_array;
    }

    function sls_mce_buttons( $buttons ){
        array_push( $buttons, 'sls_mce' );

        return $buttons;
    }
}


// Register Shortcode Silohon ==================================
// =============================================================

// Ads 1
add_shortcode( 'sls_ad1', 'sls_ad1_render' );
function sls_ad1_render(){
    $ad1 = get_option('sls_ads_set')['sc1'];
    if( !empty($ad1) ){
        $outputAd1 = '<div class="sls_ads" style="margin:10px 0; width: 100%;">';
        $outputAd1 .= $ad1;
        $outputAd1 .= '</div>';

        return $outputAd1;
    }
}

// Ads 2
add_shortcode( 'sls_ad2', 'sls_ad2_render' );
function sls_ad2_render(){
    $ad2 = get_option('sls_ads_set')['sc2'];
    if( !empty($ad2) ){
        $outputAd2 = '<div class="sls_ads" style="margin:10px 0; width: 100%;">';
        $outputAd2 .= $ad2;
        $outputAd2 .= '</div>';

        return $outputAd2;
    }
}

// faqs
add_shortcode( 'sls_faq', 'sls_faq_render' );
function sls_faq_render( $atts, $content = null ){
    $judul = !empty($atts['title']) ? $atts['title'] : 'FAQs';
    $intro = !empty($atts['intro']) ? '<p class="slsIntro">'. $atts['intro'] .'</p>' : '';

    preg_match_all('/\[question\](.*?)\[\/question\](?:\s*<p>|\s*<\/p>)/s', $content, $question_matches);
    preg_match_all('/\[answer\](.*?)\[\/answer\](?:\s*<p>|\s*<\/p>)/s', $content, $answer_matches);

    $faqHTML = '<h2 class="clsFaq_title">'. $judul .'</h2>';
    $faqHTML .= $intro;

    $faqHTML .= '<style>.slsContainer_faq .fAnsw{display: none;}</style>';

    // Container faqs
    $faqHTML .= '<div class="slsContainer_faq">';

    for( $i = 0; $i < count($question_matches[1]); $i++ ){
        $question = trim($question_matches[1][$i]);
        $answer = trim($answer_matches[1][$i]);

        $faqHTML .= '<div class="faqHeader">';
        $faqHTML .= '<span class="fQuest">'. esc_html( $question ) .'</span>';
        $faqHTML .= '<span id="fToggle">+</span>';
        $faqHTML .= '</div>';
        $faqHTML .= '<p class="fAnsw">'. esc_html( $answer ) .'</p>';
    }

    $faqHTML .= '</div>';

    $faqHTML .= '<script>
        document.addEventListener( "click", function(event){
            var toggleButton = event.target;
            if(toggleButton.id === "fToggle"){
                var answer = toggleButton.parentNode.nextElementSibling;
                if(answer.style.display === "block"){
                    answer.style.display = "none";
                    toggleButton.textContent = "+";
                } else{
                    answer.style.display = "block";
                    toggleButton.textContent = "-";
                }
            }
        });
    </script>';

    return $faqHTML;
}

// Youtube Embed
add_shortcode( 'sls_yt', 'sls_yt_render' );
function sls_yt_render( $atts ){

    $ytOutput = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$atts['ytid'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
    
    return $ytOutput;
}
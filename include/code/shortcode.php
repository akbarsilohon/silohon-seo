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
        $outputAd1 = '<div class="my-ads">';
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
        $outputAd2 = '<div class="my-ads">';
        $outputAd2 .= $ad2;
        $outputAd2 .= '</div>';

        return $outputAd2;
    }
}

// faqs
add_shortcode( 'sls_faq', 'sls_faq_render' );
function sls_faq_render( $atts, $content = null ){
    $judul = !empty($atts['title']) ? $atts['title'] : 'FAQs';
    $intro = !empty($atts['intro']) ? '<p>'. $atts['intro'] .'</p>' : '';

    preg_match_all('/\[question\](.*?)\[\/question\](?:\s*<p>|\s*<\/p>)/s', $content, $question_matches);
    preg_match_all('/\[answer\](.*?)\[\/answer\](?:\s*<p>|\s*<\/p>)/s', $content, $answer_matches);

    $html = '<h2>'. $judul .'</h2>';
    $html .= $intro;

    $html .= '<style>.slsFaqs{margin-bottom:25px}.slsFaqTanya{display:flex;align-items:center;justify-content:space-between;gap:1rem;font-weight:700;padding-bottom:1rem;border-bottom:1px solid var(--article-link);margin-bottom:1rem}.slsFaqTanya .slsQuestion{font-size:18px;color:var(--article-heading);line-height:1.5}.slsFaqTanya #faqToggle{background-color:var(--article-link);color:#fff;padding:5px 10px;cursor:pointer;height:max-content}.slsFaqJawab{font-size:18px;line-height:2;color:var(--article-text);word-wrap:break-word;margin-bottom:1rem;display:none}@media(max-width:560px){.slsFaqJawab,.slsFaqTanya .slsQuestion{font-size:16px}}</style>';

    $html .= '<div class="slsFaqs">';

    for( $i = 0; $i < count($question_matches[1]); $i++ ){
        $question = trim($question_matches[1][$i]);
        $answer = trim($answer_matches[1][$i]);

        $html .= '<div class="slsFaqTanya">';
        $html .= '<span class="slsQuestion">'.esc_html( $question ).'</span>';
        $html .= '<span id="faqToggle">+</span>';
        $html .= '</div>';

        $html .= '<div class="slsFaqJawab">';
        $html .= $answer;
        $html .= '</div>';
    }

    $html .= '</div>';

    $json_ld = array(
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => array()
    );

    for( $i = 0; $i < count($question_matches[1]); $i++ ){
        $question = trim(strip_tags($question_matches[1][$i]));
        $answer = trim(strip_tags($answer_matches[1][$i]));

        $json_ld["mainEntity"][] = array(
            "@type" => "Question",
            "name" => esc_html( $question ),
            "acceptedAnswer" => array(
                "@type" => "Answer",
                "text" => esc_html( $answer )
            )
        );
    }

    $json_ld_string = json_encode($json_ld, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    $html .= '<script type="application/ld+json">' . $json_ld_string . '</script>';

    $html .= '
        <script>
            document.addEventListener( "click", function( event ){
                var toggleButton = event.target;
                if( toggleButton.id === "faqToggle" ){
                    var answer = toggleButton.parentNode.nextElementSibling;
                    if( answer.style.display === "block" ){
                        answer.style.display = "none";
                        toggleButton.textContent = "+";
                    } else{
                        answer.style.display = "block";
                        toggleButton.textContent = "-";
                    }
                }
            });
        </script>
    ';

    return $html;
}

// Youtube Embed
add_shortcode( 'sls_yt', 'sls_yt_render' );
function sls_yt_render( $atts ){
    $vidID = $atts['ytid'];
    $judulVideo = !empty( $atts['title']) ? $atts['title'] : 'Youtube Video Player';

    if( !empty($vidID)){
        $shortCodeYt = '<div style="width: 100%;height: 100%;box-shadow: 6px 6px 10px rgba(0, 0, 0, .3);margin-bottom: 25px;">';
        $shortCodeYt .= '<div style="position: relative;padding-bottom: 56.15%;height: 0;overflow: hidden;">';
        $shortCodeYt .= '<iframe
                    style="position: absolute;top: 0;left: 0;width: 100%;height: 100%; border: 0;"
                    loading="lazy"
                    srcdoc="<style>
                        *{padding:0;margin:0;overflow:hidden}body,html{height:100%}img{position:absolute;width:100%;height:auto;top:0;bottom:0;margin:auto}svg{filter:drop-shadow(1px 1px 6px hsl(206.5, 70.7%, 8%));transition:250ms ease-in-out}body:hover svg{filter:drop-shadow(1px 1px 6px hsl(206.5, 0%, 10%);)}svg {
                            position: absolute;
                            width: 50px;
                            height: auto;
                            left: 50%;
                            top: 50%;
                            transform: translate(-50%, -50%);
                        }
                    </style>
                    <a href=\'https://www.youtube.com/embed/'. $vidID .'?autoplay=1\'>
                        <img src=\'https://i.ytimg.com/vi/'. $vidID .'/sddefault.jpg\' alt=\''. $judulVideo .'\'>
                        <svg width=\'64px\' height=\'64px\' viewBox=\'0 -3 20 20\' version=\'1.1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' fill=\'#e74b2c\'>
                            <g id=\'SVGRepo_bgCarrier\' stroke-width=\'0\'></g>
                            <g id=\'SVGRepo_tracerCarrier\' stroke-linecap=\'round\' stroke-linejoin=\'round\'></g>
                            <g id=\'SVGRepo_iconCarrier\'>
                                <title>youtube [#e74b2c]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id=\'Page-1\' stroke=\'none\' stroke-width=\'1\' fill=\'none\' fill-rule=\'evenodd\'> <g id=\'Dribbble-Light-Preview\' transform=\'translate(-300.000000, -7442.000000)\' fill=\'#fff\'>
                                    <g id=\'icons\' transform=\'translate(56.000000, 160.000000)\'>
                                        <path d=\'M251.988432,7291.58588 L251.988432,7285.97425 C253.980638,7286.91168 255.523602,7287.8172 257.348463,7288.79353 C255.843351,7289.62824 253.980638,7290.56468 251.988432,7291.58588 M263.090998,7283.18289 C262.747343,7282.73013 262.161634,7282.37809 261.538073,7282.26141 C259.705243,7281.91336 248.270974,7281.91237 246.439141,7282.26141 C245.939097,7282.35515 245.493839,7282.58153 245.111335,7282.93357 C243.49964,7284.42947 244.004664,7292.45151 244.393145,7293.75096 C244.556505,7294.31342 244.767679,7294.71931 245.033639,7294.98558 C245.376298,7295.33761 245.845463,7295.57995 246.384355,7295.68865 C247.893451,7296.0008 255.668037,7296.17532 261.506198,7295.73552 C262.044094,7295.64178 262.520231,7295.39147 262.895762,7295.02447 C264.385932,7293.53455 264.28433,7285.06174 263.090998,7283.18289\' id=\'youtube-[#e74b2c]\'></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </a>
                    "
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>';
        $shortCodeYt .= '</div>';
        $shortCodeYt .= '</div>';

        return $shortCodeYt;
    }
    
}
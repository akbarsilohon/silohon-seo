<?php
/**
 * Theme Function
 * Silohon SEO Wordpress Theme
 * @package silohon-seo
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


// Setup Theme ===============================
// ===========================================
add_action( 'after_setup_theme', 'sls_setup_theme' );
function sls_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'silohon-seo' ),
        'footer'    =>  __( 'Footer Menu', 'silohon-seo' )
    ));

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'responsive-embeds' );
}

// Meta Robot =================================
// ============================================
add_filter( 'wp_robots', 'sls_robots' );
function sls_robots( $robots ){
    $robots = array(
        'index'                 =>  true,
        'follow'                =>  true,
        'max-image-preview'     =>  'large',
        'max-snippet'           =>  '-1',
        'max-video-preview'     =>  '-1'
    );

    return $robots;
}


// Favicon ============================
// ====================================
$icon = get_site_icon_url();
if(empty( $icon )){
    add_action( 'wp_head', 'sls_default_icon' );
    add_action( 'admin_head', 'sls_default_icon' );
}
function sls_default_icon(){
    $defIcon = SLURI . '/asset/img/site/seo-favicon.png'; ?>
    <link rel="shortcut icon" href="<?php echo esc_url( $defIcon ); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo esc_url( $defIcon ); ?>">
    <?php
}

// Render Organization Schema ==========
// =====================================
$og = get_option( 'sls_g_settings' )['og'];
if( !empty( $og ) && $og === 'true' ){
    add_action( 'wp_head', 'sls_render_organization_schema' );
}

function sls_render_organization_schema(){
    $ogName = get_option( 'sls_g_settings' )['ogName'];
    $ogUrl = get_option( 'sls_g_settings' )['ogUrl'];
    $ogSameAs = get_option( 'sls_g_settings' )['ogSameAs'];
    $ogImage = get_option( 'sls_g_settings' )['ogImage'];
    $ogLogo = get_option( 'sls_g_settings' )['ogLogo'];
    $ogDesc = get_option( 'sls_g_settings' )['ogDesc'];
    $ogEmail = get_option( 'sls_g_settings' )['ogEmail'];
    $ogTel = get_option( 'sls_g_settings' )['ogTel'];
    $ogStreet = get_option( 'sls_g_settings' )['ogStreet'];
    $ogLocality = get_option( 'sls_g_settings' )['ogLocality'];
    $ogCountry = get_option( 'sls_g_settings' )['ogCountry'];
    $ogRegion = get_option( 'sls_g_settings' )['ogRegion'];
    $ogPostal = get_option( 'sls_g_settings' )['ogPostal'];
    $ogVat = get_option( 'sls_g_settings' )['ogVat'];
    $ogIso = get_option( 'sls_g_settings' )['ogIso']; ?>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "<?php echo $ogName; ?>",
            "url": "<?php echo $ogUrl; ?>",
            "sameAs": [ "<?php echo $ogSameAs; ?>" ],
            "image": "<?php echo $ogImage; ?>",
            "logo": "<?php echo $ogLogo; ?>",
            "description": "<?php echo $ogDesc; ?>",
            "email": "<?php echo $ogEmail; ?>",
            "telephone": "<?php echo $ogTel; ?>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?php echo $ogStreet; ?>",
                "addressLocality": "<?php echo $ogLocality; ?>",
                "addressCountry": "<?php echo $ogCountry; ?>",
                "addressRegion": "<?php echo $ogRegion; ?>",
                "postalCode": "<?php echo $ogPostal; ?>"
            },
            "vatID": "<?php echo $ogVat; ?>",
            "iso6523Code": "<?php echo $ogIso; ?>"
        }
    </script>

    <?php
}


// Replace Sparator Title ====================
// ===========================================
add_filter( 'document_title_separator', 'sls_document_title_separator' );
function sls_document_title_separator( $sep ) {
    $sep = '|';
    return $sep;
}


// Categoty replace output ====================
// ============================================
// using link
function sls_cat_with_link(){
    $categories = get_the_category();
    $sparator = ', ';
    $output = '';
    $i = 1;

    if(!empty($categories)){
        foreach( $categories as $category ){
            if( $i > 1 ){
                $output .= $sparator;
            }

            $output = '<a class="slsCatlink" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
        }
    }

    echo $output;
}

// Without link
function sls_cat_without_link(){
    $categories = get_the_category();
    $sparator = ', ';
    $output = '';
    $i=1;
    if( !empty($categories) ) :
        foreach( $categories as $category ) :
            if($i > 1 ) : $output .= $sparator; endif;
            $output = $category->name;
            $i++;
        endforeach;
    endif;
    echo $output;
}


/**
 * The Excerpt Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */
// Render count the Excerpt lengkth ================
add_filter( 'excerpt_length', 'sls_excerpt_length' );
function sls_excerpt_length(){
    $excerptLength = !empty( get_option('sls_article_settings')['excertpt-length'] ) ? get_option('sls_article_settings')['excertpt-length'] : 25;
    return $excerptLength;
}

// Add class to the excerpt ========================
add_filter( 'the_excerpt', 'sls_add_excerpt_class' );
function sls_add_excerpt_class() {
    return '<p class="slsexcerpt">' . get_the_excerpt() . '</p>';
}


// Excerpt More ====================================
add_filter( 'excerpt_more', 'sls_excerpt_more' );
function sls_excerpt_more( $more ){
    $excerptMore = !empty(get_option('sls_article_settings')['excertpt-more']) ? get_option('sls_article_settings')['excertpt-more'] : 'Read More';
    return sprintf(
        '<a href="%1$s" title="'. get_the_title(get_the_ID()).'" class="more-link">%2$s <span style="display:none;">'. get_the_title(get_the_ID()) .'</span></a>',
        esc_url( get_permalink( get_the_ID() ) ),
        $excerptMore
    );
}


/**
 * Widgets Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */
add_action( 'widgets_init', 'sls_widget_init' );
function sls_widget_init(){
    register_sidebar(
        array(
            'id'            =>  'home',
            'name'          =>  esc_html__( 'Home Sidebar', 'silohon-seo' )
        )
    );

    register_sidebar(
        array(
            'id'            =>  'archive',
            'name'          =>  esc_html__( 'Archive Sidebar', 'silohon-seo' )
        )
    );


    register_sidebar(
        array(
            'id'            =>  'single',
            'name'          =>  esc_html__( 'Single Sidebar', 'silohon-seo' )
        )
    );


    // Register custom widgets
    register_widget( 'Sls_Widgets_Recent_Post' );
    register_widget( 'Sls_Widget_Popular_posts' );

}


/**
 * Redirect url 404 to homepage
 * 
 * @package silohon-seo
 */
$redirectOption = get_option('sls_article_settings')['404'];
if( !empty( $redirectOption ) && $redirectOption === 'true' ){
    add_action( 'template_redirect', 'sls_redirect_404_to_homepage' );
}

function sls_redirect_404_to_homepage(){
    if(is_404() && $_SERVER['REQUEST_URI'] !== '/404'){
        wp_redirect( home_url() );
        exit();
    }
}


/**
 * Change login logo Wordpress
 * 
 * @package silohon-seo
 */
add_action( 'login_enqueue_scripts', 'sls_logo_login_changes' );
function sls_logo_login_changes(){
    $siteIcon = get_site_icon_url();
    $defIcon = SLURI . '/asset/img/site/seo-favicon.png';
    $favicon = !empty($siteIcon) ? $siteIcon : $defIcon;
    echo '<link rel="shortcut icon" href="'.$defIcon.'" type="image/x-icon">';
    echo '<link rel="apple-touch-icon" href="'.$defIcon.'">';

    $custonLogo = get_option( 'sls_g_settings' )['logo'];
    $defLogo = SLURI . '/asset/img/site/logo.png';
    $logoOutput = !empty($custonLogo) ? $custonLogo : $defLogo;

    echo '<style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url('.esc_url( $logoOutput ).');
                height:60px;
                width:285px;
                background-size: 285px 60px;
                background-repeat: no-repeat;
            }
        </style>';
}


/**
 * Setup Lazyload Image
 * 
 * @package silohon-seo
 */
$optionLazyLoad = get_option('sls_article_settings')['lazy_load_img'];
if(!empty($optionLazyLoad) && $optionLazyLoad === 'true' && ! is_admin()){
    add_filter( 'the_content', 'lazy_load_conten_img' );
    add_filter( 'widget_text', 'lazy_load_conten_img' );

    add_filter( 'wp_get_attachment_image_attributes', 'silo_img_attchment_attributes', 10, 2 );

    function lazy_load_conten_img( $content ){
        $content = preg_replace( '/(<img.+)(src)/Ui', '$1data-$2', $content );
        return $content;
    }

    function silo_img_attchment_attributes( $atts, $attachment ){
        $atts[ 'data-src' ] = $atts[ 'src' ];
        $atts[ 'src' ] = SLURI . '/asset/img/lazy.jpg';

        if( isset( $atts[ 'srcset' ])){
            unset( $atts[ 'srcset' ] );
        }

        return $atts;
    }
}


// Generate Meta IMG Single posts
function sls_generate_meta_img_single($id){
    $thumbnail = null;

    if(has_post_thumbnail($id)){
        $thumbnail .= '<meta itemprop="image" content="'. esc_url( get_the_post_thumbnail_url( $id, 'thumbnail' )) .'" />';
        $thumbnail .= '<meta itemprop="image" content="'. esc_url( get_the_post_thumbnail_url( $id, 'medium' )) .'" />';
        $thumbnail .= '<meta itemprop="image" content="'. esc_url( get_the_post_thumbnail_url( $id, 'large' )) .'" />';
        $thumbnail .= '<meta itemprop="image" content="'. esc_url( get_the_post_thumbnail_url( $id, 'full' )) .'" />';
    } else{
        $getContent = get_the_content( null, false, $id );
        $item = '';

        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $getContent, $item);

        if(!empty($item[1])){
            $thumbnail .= '<meta itemprop="image" content="'. esc_url( $item[1] ) .'" />';
        }
    }

    echo $thumbnail;
}
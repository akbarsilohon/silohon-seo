<?php
/**
 * Header file
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */ ?>

<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php $htmlHeader = get_option('sls_hnf')['header'];
    if( !empty( $htmlHeader ) ){
        echo $htmlHeader;
    } ?>

    <?php wp_head(); ?>

    <?php 
    /**
     * DNS Prefeer
     * 
     * @package silohon-seo
     */
    $thisUrl = get_bloginfo( 'url' );
    $tagReplace = array( 'https://', 'http://' );
    $replaceTo = '//';
    $fixReplace = str_replace( $tagReplace, $replaceTo, $thisUrl );
    
    echo '<link rel="dns-prefetch" href="'. $fixReplace .'"/>';
    ?>
</head>
<body <?php body_class(); ?>>

<header class="sls_header">
    <div class="header_inner container">
        <div class="inner_left">
            <div class="sls_open" id="slsOpen">
                <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                </svg>
            </div>

            <div class="slsBrand" itemscope itemtype="http://schema.org/Organization">
                <a itemprop="url" href="<?php echo home_url('/'); ?>" class="brandUrl">
                    <?php
                        $logo = !empty(get_option('sls_g_settings')['logo']) ? get_option('sls_g_settings')['logo'] : SLURI . '/asset/img/site/logo.png';
                        echo '<img itemprop="logo" class="slsLogo" src="'.$logo.'" width="80" height="60" alt="'.get_bloginfo('name').'"/>';
                    ?>
                </a>
            </div>
        </div>

        <div class="inner_right">
            <form action="<?php echo home_url( '/' ); ?>" method="get" class="slsFormdesk">
                <input type="text" name="s" id="slsInput_search_desk" placeholder="Search here..." required/>
                <button type="submit" class="slsBtnSub">Search</button>
            </form>
        </div>
    </div>
</header>

<?php
/**
 * Menu Flexbox Silohon SEO Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */ ?>

<div id="slsFlexbox" class="slsFlexbox">
    <div class="flexHead">
        <h3 class="flexBrand"><?php echo bloginfo( 'name' ); ?></h3>
        <div class="slsClose" id="slsClose">
            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                <g id="SVGRepo_iconCarrier">
                    <path d="M8.00386 9.41816C7.61333 9.02763 7.61334 8.39447 8.00386 8.00395C8.39438 7.61342 9.02755 7.61342 9.41807 8.00395L12.0057 10.5916L14.5907 8.00657C14.9813 7.61605 15.6144 7.61605 16.0049 8.00657C16.3955 8.3971 16.3955 9.03026 16.0049 9.42079L13.4199 12.0058L16.0039 14.5897C16.3944 14.9803 16.3944 15.6134 16.0039 16.0039C15.6133 16.3945 14.9802 16.3945 14.5896 16.0039L12.0057 13.42L9.42097 16.0048C9.03045 16.3953 8.39728 16.3953 8.00676 16.0048C7.61624 15.6142 7.61624 14.9811 8.00676 14.5905L10.5915 12.0058L8.00386 9.41816Z" fill="#0F0F0F"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#0F0F0F"/>
                </g>
            </svg>
        </div>
    </div>

    <div class="flexSearch" itemscope itemtype="https://schema.org/WebSite">
        <meta itemprop="url" content="<?php echo home_url('/'); ?>"/>
        <form action="<?php echo home_url('/'); ?>" method="get" class="formMobile" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
            <meta itemprop="target" content="<?php echo home_url('/') . '?s={s}'; ?>"/>
            <input itemprop="query-input" type="text" name="s" placeholder="Search here.." required/>
            <input type="submit" value="Search" class="btnsearchMobile" />
        </form>
    </div>

    <?php 
    
    wp_nav_menu( array(
        'theme_location'        =>  'primary',
        'container'             =>  'ul',
        'menu_class'            =>  'slsMenu',
        'menu_id'               =>  'slsMenu',
        'fallback_cb'           =>  false,
        'link_before'           =>  '<span class="menu-link">',
        'link_after'            => '</span>'
    ));
    
    ?>
</div>
<?php
/**
 * Footer File
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


$footerAds = get_option('sls_ads_set')['footer'];
if(!empty($footerAds)){
    echo '<div class="container my-ads">';
    echo $footerAds;
    echo '</div>';
}

?>

<footer class="sls_foo">
    <div class="fooTop">
        <div class="top_inner container">
            <?php 
                wp_nav_menu(
                    array(
                        'theme_location'            =>  'footer',
                        'container'                 =>  'ul',
                        'menu_class'                =>  'slsFooter',
                        'menu_id'                   =>  'slsFooter',
                        'fallback_cb'               =>  false
                    )
                );
            ?>
        </div>
    </div>
    <div class="fooBot">
        <div class="ncopy container">
            &copy; <?php echo date("Y"); ?> <a href="<?php echo bloginfo( 'url' ); ?>"><?php echo bloginfo( 'name' ); ?></a> | All Rights Reserved.
        </div>
    </div>
</footer>

<?php

$footerHtML = get_option('sls_hnf')['footer'];
if(!empty($footerHtML)){
    echo $footerHtML;
}

wp_footer(); ?>

</body>
</html>
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
    <div class="fooBot"></div>
</footer>

<?php
wp_footer(); ?>

</body>
</html>
<?php
/**
 * Custom header search Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

?>

<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $htmlHeader = get_option('sls_hnf')['header'];
    if( !empty( $htmlHeader ) ){
        echo $htmlHeader;
    } ?>

    <?php wp_head(); ?>
</head>
<body>
    <!-- scrolling -->
    <header class="slsGoogle">
        <div class="slsNavig">
            <div class="gInner">
                <div class="gInner_left">
                    <!-- Box Logo -->
                    <a href="<?php echo home_url('/'); ?>" class="slsHomes">
                        <?php 
                            $logo = get_option( 'sls_g_settings' )['logo'];
                            $fixLogo = !empty($logo) ? $logo : SLURI . '/asset/img/site/logo.png';

                            echo '<img width="200" height="200" src="'.$fixLogo.'" class="logoGoogle"/>';
                        ?>
                    </a>

                    <!-- Search form -->
                    <form action="<?php echo home_url('/'); ?>" method="get" class="google-search-box">
                        <input type="text" name="s" id="input-bisa-dihapus" value="<?php echo $s; ?>" autofocus>
                        <i id="hapusInput" class='bx bx-x'></i>
                        <i class='bx bx-microphone'></i>
                        <i class='bx bx-image'></i>
                        <i class='bx bx-search'></i>
                    </form>
                </div>

                <div class="gInner_right">
                    <?php
                        $img = get_site_icon_url();
                        $fixImg = !empty($img) ? $img : SLURI . '/asset/img/site/seo-favicon.png';

                        echo '<img width="150" height="150" src="'.$fixImg.'" class="slsPeople"/>';
                    ?>
                </div>
            </div>
        </div>
    </header>
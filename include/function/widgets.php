<?php
/**
 * Custom Widgets Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


/**
 * Recent Posts Silohon SEO
 * 
 * @package silohon-seo
 */
class Sls_Widgets_Recent_Post extends WP_Widget{
    public function __construct(){
        parent::__construct( 'sls_recent_posts', 'Silohon SEO Recent Posts', array(
            'classname'         =>  'sls-rencet-posts',
            'description'       =>  'Silohon SEO Recent Posts'
        ));
    }


    public function form( $instance ){
        $title = ( !empty( $instance['title'] ) ? $instance['title'] : 'Recent Posts' );
        $tot = ( !empty( $instance['tot'] ) ? absint( $instance['tot'] ) : 4 );

        $output = '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
        $output .= '<input type="text" class="widefat" id="'. esc_attr( $this->get_field_id('title')) .'" name="'. esc_attr( $this->get_field_name('title')) .'" value="'. esc_attr( $title ) .'"/>';
        $output .= '<p>';
        $output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Count:</label>';
        $output .= '<input type="number" class="widefat" id="'. esc_attr( $this->get_field_id('tot')) .'" name="'. esc_attr( $this->get_field_name('tot')) .'" value="'. esc_attr( $tot ) .'"/>';
        $output .= '</p>';


        echo $output;
    }

    public function update( $new_instance, $old_instance ){
        $instance = array();
		$instance['title'] = ( !empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '' );
		$instance['tot'] = ( !empty( $new_instance['tot'] ) ? absint( strip_tags( $new_instance['tot'] ) ) : 0 );

        return $instance;
    }

    public function widget( $args, $instance ){
        $tot = absint( $instance[ 'tot' ] );
        $recent = new WP_Query(
            array(
                'post_type'         =>  'post',
                'posts_per_page'    =>  $tot,
                'post_status'       =>  'publish'
            )
        );

        if( $recent->have_posts()){ ?>
            <div class="slsAside_lpp">
                <div class="aside_judulBox">
                    <span class="asideTitle"><?php echo apply_filters( 'widgets_title', $instance['title'] ); ?></span>
                </div>

                <?php while( $recent->have_posts()){
                    $recent->the_post(); ?>

                    <div class="asideWith_thumb">
                        <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" class="asideUrl">
                            <?php generate_squar_thumnails(get_the_ID(), 'asideThumb'); ?>
                        </a>

                        <div class="asideBody">
                            <div class="asideMeta">
                                <span class="cates"><?php sls_cat_without_link(); ?></span>
                                <span class="sparat">/</span>
                                <span class="datime"><?php echo the_time('F D Y') ?></span>
                            </div>
                            <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" class="titSid">
                                <?php echo the_title('<h3>', '</h3>'); ?>
                            </a>
                        </div>

                    </div>
                    <?php
                } ?>
            </div>
        <?php
        }

        wp_reset_query();
        wp_reset_postdata();
    }
}


/**
 * Popular Posts Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 */
function sls_save_post_veiws( $postID ){
    $metaKey = 'sls_post_views';
    $views = get_post_meta( $postID, $metaKey, true );
    $count = ( empty( $views ) ? 0 : $views );
    $count++;

    update_post_meta( $postID, $metaKey, $count );
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

class Sls_Widget_Popular_posts extends WP_Widget{
    public function __construct(){
        parent::__construct(
            'sls_popular_posts',
            'Silohon SEO Popular Posts Widget',
            array(
                'classname'         =>  'sls-popular-posts',
                'description'       =>  'Silohon SEO Popular Posts Widget'
            )
        );
    }

    public function form( $instance ){
        $title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popular Posts' );
        $tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

        $output = '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
        $output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title')).'" name="'.esc_attr( $this->get_field_name('title')).'" value="'.esc_attr( $title ).'"/>';

        $output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Title:</label>';
        $output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot')).'" name="'.esc_attr( $this->get_field_name('tot')).'" value="'.esc_attr( $tot ).'"/>';

        echo $output;
    }

    public function update( $new_instance, $old_instance ){
        $instance = array();
		$instance['title'] = ( !empty( $new_instance['title']) ? strip_tags( $new_instance['title'] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance['tot']) ? absint( strip_tags( $new_instance['tot'] ) ) : 0 );

		return $instance;
    }

    public function widget( $args, $instance ){
        $tot = absint( $instance[ 'tot' ] );
        $thePopupar = new WP_Query(
            array(
                'posts_per_page'        =>  $tot,
                'post_type'             =>  'post',
                'post_status'           =>  'publish',
                'meta_key'              =>  'sls_post_views',
                'orderby'               =>  'rand',
                'order'                 =>  'DESC'
            )
        );

        if($thePopupar->have_posts()){ ?>

            <div class="slsAside_lpp">
                <div class="aside_judulBox">
                    <span class="asideTitle"><?php echo apply_filters( 'widgets_title', $instance['title'] ); ?></span>
                </div>

                <?php while( $thePopupar->have_posts()){
                    $thePopupar->the_post(); ?>

                    <div class="asideWith_thumb">
                        <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" class="asideUrl">
                            <?php generate_squar_thumnails(get_the_ID(), 'asideThumb'); ?>
                        </a>

                        <div class="asideBody">
                            <div class="asideMeta">
                                <span class="cates"><?php sls_cat_without_link(); ?></span>
                                <span class="sparat">/</span>
                                <span class="datime"><?php echo the_time('F D Y') ?></span>
                            </div>
                            <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" class="titSid">
                                <?php echo the_title('<h3>', '</h3>'); ?>
                            </a>
                        </div>

                    </div>
                    <?php
                } ?>
            </div>

            <?php
        }

        wp_reset_query();
        wp_reset_postdata();
    }
}
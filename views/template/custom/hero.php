<?php
/**
 * Section Hero Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */

$get_meta = get_post_custom( $post->ID );
if( isset( $get_meta['sls_hero'][0] )){
    $hero = false;
    if( !empty( $get_meta['sls_hero'][0] )){
        $hero = $get_meta['sls_hero'][0];
        if( is_serialized( $hero )){
            $hero = unserialize( $hero );
        }
    }
}

if(!empty($hero) && is_array($hero)){
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'no_found_rows'          => true,
        'ignore_sticky_posts'	 => true
    );

    if( !empty( $hero['cat'] )){
        $args['cat'] = $hero['cat'];
    }

    if( !empty( $hero['order'] ) && $hero['order'] == 'true' ){
        $args['orderby'] = 'rand';
    }

    $hero_query = new WP_Query( $args );

    if($hero_query->have_posts()){ ?>

        <section class="carousel">
            <button class="carousel_button left">&#8592;</button>
            <div class="carousel_container">
                <ul class="carousel_track">
                    <?php 
                        $itemActive = true;
                        while($hero_query->have_posts()){
                        $hero_query->the_post(); ?>

                        <li class="carousel_slide <?php if($itemActive) echo 'active'; ?>">
                            <?php hero_generate_img(get_the_ID()); ?>
                            <div class="carausel_body">
                                <span class="c-meta">Post On: <?php echo the_time('F D Y') ?></span>
                                <a href="<?php echo the_permalink(); ?>" class="carousel_link">
                                    <?php echo the_title('<h2 class="carausel_title">', '</h2>'); ?>
                                </a>
                                <?php the_excerpt(); ?>
                            </div>
                        </li>

                        <?php
                        $itemActive = false;
                    } ?>
                </ul>
            </div>
            <button class="carousel_button right">&#8594;</button>

            <div class="carousel_nav">
                <?php
                    $buttonActive = true;
                    while($hero_query->have_posts()){
                    $hero_query->the_post(); ?>
                    <button class="carousel_indicator <?php if($buttonActive) echo 'active'; ?>"></button>
                    <?php
                    $buttonActive = false;
                } ?>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const track = document.querySelector('.carousel_track');
            const slides = Array.from(track.children);
            const nextButton = document.querySelector('.carousel_button.right');
            const prevButton = document.querySelector('.carousel_button.left');
            const navButtons = Array.from(document.querySelectorAll('.carousel_indicator'));

            const slideWidth = slides[0].getBoundingClientRect().width;

            // Function to remove 'active' class from all slides
            const removeAllActiveClasses = () => {
                slides.forEach(slide => {
                    slide.classList.remove('active');
                });
            };

            // Function to add 'active' class to a specific slide
            const setActiveSlide = (index) => {
                removeAllActiveClasses();
                slides[index].classList.add('active');
                updateNavButtons(index);
            };

            // Update active state of nav buttons
            const updateNavButtons = (index) => {
                navButtons.forEach((button, i) => {
                    if (i === index) {
                        button.classList.add('active');
                    } else {
                        button.classList.remove('active');
                    }
                });
            };

            // Move to next slide
            nextButton.addEventListener('click', function () {
                const currentSlide = track.querySelector('.carousel_slide.active');
                const currentIndex = slides.findIndex(slide => slide === currentSlide);
                let nextIndex = (currentIndex + 1) % slides.length;
                setActiveSlide(nextIndex);
            });

            // Move to previous slide
            prevButton.addEventListener('click', function () {
                const currentSlide = track.querySelector('.carousel_slide.active');
                const currentIndex = slides.findIndex(slide => slide === currentSlide);
                let prevIndex = (currentIndex - 1 + slides.length) % slides.length;
                setActiveSlide(prevIndex);
            });

            // Move to specific slide on indicator click
            navButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    setActiveSlide(index);
                });
            });
        });
        </script>

        <?php
    }

    wp_reset_postdata();
    wp_reset_query();
}
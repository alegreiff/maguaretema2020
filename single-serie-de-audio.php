<?php
/**
 * Serie de Audio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maguare
 */

get_header('despliegues'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="mg__bg section__opening">
            <div class="section-page__wrapper">
                <!-- Start Maguare Logo -->
                <div class="mg__logo">
                    <?php if ( get_theme_mod( 'maguare_logo_header' ) ) : ?>
                    <img src="<?php echo get_theme_mod( 'maguare_logo_header');?>" alt="Maguare Logo">
                    <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-maguare.png" alt="Maguare Logo">
                    <?php endif; ?>
                </div>
                <!-- End Maguare Logo -->
                <!-- Start Page title -->
                <div class="heading-page__container">
                    <h1 class="heading-page text-color-brown">
                        Jugar
                    </h1>
                </div>
                <!-- Page title -->
                <!-- Start Audio content -->
                <section class="section-page">
                    <article class="note note--media">
                        <div class="note__content" data-expand>
                            <h2 class="heading-note--bold text-color-brown">
                                <?php the_title();?>
                            </h2>
                            <div class="note__media note__media--audio">
                                <div class="note__media__container">
                                    <figure>
                                        <i class="note__content--icon icon-m-audio"></i>
                                        <?php $image = get_field('thumbnail');
                                        if( !empty($image) ): ?>
                                        <img src="<?php echo $image['url']; ?>" alt="Imagen destacada maguaré">
                                        <?php endif; ?>
                                    </figure>
                                    <div class="note__media__audio-content" data-audio-content>
                                        <div class="visualizer" data-audio-path="<?php the_field('url_audio'); ?>"></div>
                                        <div class="player">
                                            <div class="audio green-audio-player">
                                                <div class="loading">
                                                    <div class="spinner"></div>
                                                </div>
                                                <div class="play-pause-btn" data-play>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                                                        <path fill="#566574" fill-rule="evenodd" d="M18 12L0 24V0" class="play-pause-icon" id="playPause"/>
                                                    </svg>
                                                </div>
                                                <div class="controls">
                                                    <span class="current-time">0:00</span>
                                                    <div class="slider" data-direction="horizontal">
                                                        <div class="progress"></div>
                                                    </div>
                                                    <span class="total-time">0:00</span>
                                                </div>
                                                <div class="volume" data-mute>
                                                    <div class="volume-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <path fill="#566574" fill-rule="evenodd" d="M14.667 0v2.747c3.853 1.146 6.666 4.72 6.666 8.946 0 4.227-2.813 7.787-6.666 8.934v2.76C20 22.173 24 17.4 24 11.693 24 5.987 20 1.213 14.667 0zM18 11.693c0-2.36-1.333-4.386-3.333-5.373v10.707c2-.947 3.333-2.987 3.333-5.334zm-18-4v8h5.333L12 22.36V1.027L5.333 7.693H0z" id="speaker" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-note text-color-brown">
                                    <?php the_field('descripcion'); ?>
                                </p>
                                <div class="note__hidden-content" data-expand-content>
                                    <div class="text-note text-color-brown">
                                        <?php the_field('letra_cancion'); ?>
                                    </div>
                                </div>
                            </div>
                            <button class="button button--yellow note__cta-expand" data-expand-cta >
                                Ver Letra
                            </button>
                        </div>
                        <?php echo social_network(); ?>
                    </article>
                </section>
                <!-- End Audio content -->
                <!-- Start Content page -->
                <section class="section-page content-notes-list">
                    <div class="notes-list notes-list--short">
                        <div class="mg-slider" data-slider-color="yellow">
                            <?php
                            /*Relacionados Maguaré*/
                            $custom_taxterms = wp_get_object_terms( $post->ID, 'relacionados_maguare', array('fields' => 'ids') );
                            
                            $args = array(
                                'post_type'      => 'post',
                                'post_status'    => 'publish',
                                'posts_per_page' => 18,
                                'orderby' => 'rand',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'relacionados_maguare',
                                        'field' => 'id',
                                        'terms' => $custom_taxterms
                                    )
                                ),
                                'post__not_in' => array ($post->ID),
                                );               

                            $my_query = null;
                            $my_query = new WP_Query($args);

                            if( $my_query->have_posts() ) {

                                $i = 0;
                                while ($my_query->have_posts()) : $my_query->the_post();
                                if($i % 3 == 0) { ?> 

                            <div class="notes-list__container">
                                <?php
                                }
                                ?>

                                <?php get_template_part( 'template-parts/content', 'contenidos-relacionados-audio' ); ?>
                                <?php $i++; 
                                if($i != 0 && $i % 3 == 0) { ?>
                            </div><!--/.notes-list__container-->

                            <?php
                                } ?>

                            <?php  
                                endwhile;
                            }
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                </section>
                <!-- Page Content page -->
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

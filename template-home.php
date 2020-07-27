<?php
/** 
 * Template Name: Home Page Maguaré
 * Plantilla Home Page Maguaré

 * @package maguare
 */
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
    <h2 style="background: crimson, color: white; padding 1em; font-size: 2em">IniTZio</h2>
    
    <h2 style="background: crimson, color: white; padding 1em; font-size: 2em">maledetta primavera</h2>
        <!-- Start Opening -->
        <section class="section-page mg__bg mg__bg--farm-1 section__opening">
            <!-- Start Main Slider -->
            <div class="section-page__wrapper">
                <!-- Start Maguare Logo -->
                <!-- <?php get_template_part( 'template-parts/logos', 'ministeriomaguared' ); ?> -->
                <!-- End Maguare Logo -->
                <div class="main-slider-notes-container hero-slider">
                    <div class="main-slider-notes mg-slider" data-slider-color="wine" data-auto="true">
                        <?php if ( get_field( 'activar_slider_custom' ) ): ?>
                            <?php if( have_rows('slider_custom_home') ): ?>
                                <?php while( have_rows('slider_custom_home') ): the_row();
                                // vars
                                $thumbnail_slider = get_sub_field('thumbnail_slider_custom');
                                $titulo_slider = get_sub_field('titulo_slider_custom');
                                $descripcion_slider = get_sub_field('descripcion_slider_custom');
                                $link_slider = get_sub_field('link_slider_custom');
                                $ancla_slider = get_sub_field('ancla_slider_custom');
                                ?>
                                <article class="carrusel-home-maguare">   
                                        <a href="<?php echo $link_slider; ?>" target="<?php if (strpos($link_slider, '#') !== false) {echo ''; } else {echo '_blank';} ?>"> 
                                            <img src="<?php echo $thumbnail_slider['url']; ?>" alt="<?php echo $thumbnail_slider['alt'] ?>" />
                                        </a>
                                    
                                </article>

                                <?php endwhile; ?>

                            <?php endif; ?>

                        <?php else: ?>

                        <?php // WP_Query arguments
                        $destacados = get_field('slider_nivel_1_destacados_home', false, false);
                        $args = array (
                            'post_type'      	     => 'post',
                            'post__in'			     => $destacados,
                            'posts_per_page'         =>	-1,
                            'orderby'        	     => 'post__in',
                        );
                        // The Query
                        $query = new WP_Query( $args );
                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post(); ?>
                        <?php
                                /* Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.*/
                                get_template_part( 'template-parts/content', 'nivel-destacado-home' );
                        ?>
                        <?php   }
                        } else { ?>
                        <?php get_template_part( 'template-parts/content', 'none' ); ?>
                        <?php   }
                        // Restore original Post Data
                        wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- End Main Slider -->
        </section>
        <!-- End Opening -->
        <!-- Start Esta semana -->
        <section class="section-page mg__bg mg__bg--beach-1" id="recomendados">
            <div class="section-page__wrapper">
                <h2 class="section-page__heading text-color-brown"><?php the_field('titulo_nivel_2_home_maguare'); ?></h2>
                <p class="section-page__text text-color-brown"><?php the_field('texto_nivel_2_home_maguare'); ?></p>
                <div class="notes-list">
                    <button class="button button--random"></button>
                    <div class="mg-slider" data-destroy="true" data-slider-color="orange">
                        <div class="notes-list__container">
                            <?php // WP_Query arguments
                            $count=0;
                            $destacados2 = get_field('grilla_nivel_2_destacados_home', false, false);
                            $args2 = array (
                                'post_type'      	     => 'post',
                                'post__in'			     => $destacados2,
                                'order'                  => 'ASC',
                                'orderby'        	     => 'post__in',
                                'posts_per_page'         => '15',
                            );
                            // The Query
                            $query2 = new WP_Query( $args2 );
                            // The Loop
                            if ( $query2->have_posts() ) {
                                while ( $query2->have_posts() ) {
                                    $query2->the_post(); ?>
                            <?php
                                    /* Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.*/
                                    get_template_part( 'template-parts/content', 'nivel-grilla-destacado-home' );
                            ?>
                            <?php
                                    $count++; 
                                    if ($count % 3 == 0 && $count < $query2->found_posts) {echo '</div><!-- /.notes-list__container --><div class="notes-list__container">';}
                            ?>
                            <?php   }
                            } else { ?>
                            <?php get_template_part( 'template-parts/content', 'none' ); ?>
                            <?php   }
                            // Restore original Post Data
                            wp_reset_postdata(); ?>
                        </div><!-- /.notes-list__container -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Esta semana -->
        <!-- Start Juegos -->
        <section class="section-page mg__bg mg__bg--desert-1">
            <div class="section-page__wrapper">
                <h2 class="section-page__heading text-color-brown"><?php the_field('titulo_nivel_3_home_maguare'); ?></h2>
                <div class="section-page__wrapper__shortened mg__home__sgames">
                    <div class="main-slider-notes-container main-slider-notes-container--orange">
                        <div class="main-slider-notes mg-slider" data-slider-color="orange">
                            <?php // WP_Query arguments
                            $destacados3 = get_field('slider_nivel_3_destacados_home', false, false);
                            $args3 = array (
                                'post_type'      	     => 'post',
                                'post__in'			     => $destacados3,
                                'order'                  => 'ASC',
                                'orderby'        	     => 'post__in',
                                'posts_per_page'         => '12',
                            );
                            // The Query
                            $query3 = new WP_Query( $args3 );
                            // The Loop
                            if ( $query3->have_posts() ) {
                                while ( $query3->have_posts() ) {
                                    $query3->the_post(); ?>
                            <?php
                                    /* Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.*/
                                    get_template_part( 'template-parts/content', 'nivel-3-destacados-home' );
                            ?>
                            <?php   }
                            } else { ?>
                            <?php get_template_part( 'template-parts/content', 'none' ); ?>
                            <?php   }
                            // Restore original Post Data
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <?php // WP_Query arguments
                    $destacados4 = get_field('contenido_nivel_3_destacados_home', false, false);
                    $args4 = array (
                        'post_type'      	     => 'post',
                        'post__in'			     => $destacados4,
                        'order'                  => 'ASC',
                        'orderby'        	     => 'post__in',
                        'posts_per_page'         => '2',
                    );
                    // The Query
                    $query4 = new WP_Query( $args4 );
                    // The Loop
                    if ( $query4->have_posts() ) {
                        while ( $query4->have_posts() ) {
                            $query4->the_post(); ?>
                    <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.*/
                            get_template_part( 'template-parts/content', 'contenido-nivel-3-destacados-home' );
                    ?>
                    <?php   }
                    } else { ?>
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                    <?php   }
                    // Restore original Post Data
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <!-- End Juegos -->
        <!-- Start Contact Form -->
        <section class="section-page mg__bg mg__bg--space-1" id="escribenos">
            <div class="section-page__wrapper">
                <h2 class="section-page__heading text-color-white">Escríbenos</h2>
                <p class="section-page__text text-color-white">Deja aquí tus comentarios, preguntas o sugerencias.</p>
                <?php echo do_shortcode( '[contact-form-7 id="1844" title="Formulario de Contacto Home" html_class="contact-form"]' ); ?>
            </div>
        </section>
        <!-- End Contact Form -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
// Omit closing PHP tag to avoid "Headers already sent" issues.
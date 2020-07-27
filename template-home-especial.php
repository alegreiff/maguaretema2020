<?php
/** 
 * Template Name: Home Page Especial Maguaré
 * Plantilla Home Page Especial Maguaré

 * @package maguare
 */
get_header('home-especial'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!-- Start Opening -->
        <div class="mg__bg section__opening">
            <!-- Start Main Slider -->
            <div class="section-page__wrapper">
                <!-- Start Maguare Logo -->
                <!-- <?php get_template_part( 'template-parts/logos', 'ministeriomaguared' ); ?> -->
                <!-- End Maguare Logo -->
                <!-- Start Page title -->
                <div class="heading-page__graphic">
                    <?php $image = get_field('imagen_especial_maguare');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="">
                    <?php endif; ?>
                    <h1 class="section-page__text text-color-white"><?php the_field('texto_especial_maguare'); ?></h1>
                </div>
                <!-- Page title -->
                <div class="main-notes">    
                    <?php // WP_Query arguments
                    $destacados = get_field('slider_nivel_1_destacados_home_especial', false, false);
                    $args = array (
                        'post_type'      	     => 'post',
                        'post__in'			     => $destacados,
                        'posts_per_page'         =>	1,
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
                            get_template_part( 'template-parts/content', 'nivel-destacado-home-especial' );
                    ?>
                    <?php   }
                    } else { ?>
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                    <?php   }
                    // Restore original Post Data
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <!-- End Main Slider -->
        </div>
        <!-- End Opening -->
        <!-- Start Esta semana -->
        <section class="section-page content-notes-list" id="recomendados">
            <div class="section-page__wrapper">
                <div class="notes-list">
                    <button class="button button--random"></button>
                    <div class="mg-slider" data-destroy="true" data-slider-color="orange">
                        <div class="notes-list__container">
                            <?php // WP_Query arguments
                            $count=0;
                            $destacados2 = get_field('grilla_nivel_2_destacados_home_especial', false, false);
                            $args2 = array (
                                'post_type'      	     => 'post',
                                'post__in'			     => $destacados2,
                                'order'                  => 'ASC',
                                'orderby'        	     => 'post__in',
                                'posts_per_page'         => '12',
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
                                    get_template_part( 'template-parts/content', 'nivel-grilla-destacado-home-especial' );
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
        <!-- Start Contact Form -->
        <section class="section-page mg__bg mg__bg--space-1">
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
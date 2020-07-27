<?php
/**
 * Template Name: Jugar Audio
 * Plantilla Jugar Audio.
 *
 * @package maguare
 */
get_header('jugar'); ?>
<?php
global $link_contenido;
if ( is_page('jugar')) {
    $link_contenido = "link-1--yellow";
}
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="mg__bg section__opening">
            <div class="section-page__wrapper">
                <!-- Start Maguare Logo -->
                <!-- <?php get_template_part( 'template-parts/logos', 'ministeriomaguared' ); ?> -->
                <!-- End Maguare Logo -->
                <!-- Start Page title -->
                <div class="heading-page__container">
                    <h1 class="heading-page text-color-brown">
                        Audio Jugar
                    </h1>
                </div>
                <!-- Page title -->
                <!-- Start Featured -->
                <section class="section-page">
                    <div class="notes-list-title-image">
                        <?php // WP_Query arguments
                        $destacados_audio = get_field('destacados_audio', false, false);
                        $args = array (
                            'post_type'      	     => 'post',
                            'post__in'			     => $destacados_audio,
                            'posts_per_page'         =>	 3,
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
                                get_template_part( 'template-parts/content', 'contenidos-destacados-audio' );
                        ?>
                        <?php   }
                        } else { ?>
                        <?php get_template_part( 'template-parts/content', 'none' ); ?>
                        <?php   }
                        // Restore original Post Data
                        wp_reset_postdata(); ?>

                    </div>
                </section>
                <!-- End Page Featured -->

                <!-- Start Content page -->
                <section class="section-page content-notes-list">
                    <div class="notes-list">
                        <button class="button button--random">
                        </button>
                        <div class="notes-list__container">
                            <?php
                            // args
                            $count=0;
                            $audios_seccion = get_field('audios_seccion', false, false);
                            $args = array (
                                'post_type'      	     => 'post',
                                'post__in'			     => $audios_seccion,
                                'posts_per_page'         =>	 -1,
                                'orderby'        	     => 'post__in',
                            );
                            // query
                            $the_query = new WP_Query( $args );
                            ?>
                            <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php
                            /* Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.*/
                            get_template_part( 'template-parts/content', 'audios-seccion' );
                            ?>
                            <?php
                            $count++;
                            if ($count % 3 == 0 && $count < $the_query->found_posts) {
                                echo '</div><!-- /.notes-list__container --><div class="notes-list__container">';
                            } ;
                            ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query();	 // Restore global post data stomped by the_post(). */ ?>

                        </div><!-- ./notes-list__container-->
                    </div><!-- ./notes-list-->
                </section>
                <!-- Page Content page -->
                
                
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->
<?php
//get_sidebar();
get_footer();

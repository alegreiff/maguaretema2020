<?php
/**
 * Serie Audio
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
                <!-- Start Content page -->
                <section class="section-page content-notes-list">
                    <div class="notes-list">
                        <button class="button button--random">
                        </button>
                        <h2 class="heading-note--bold text-color-brown">
                            <?php the_title();?>
                        </h2>
                        <p class="text-section text-color-brown">
                            <?php the_field('descripcion');?>
                        </p>
                        <div class="notes-list__container">
                            <?php
                            // args
                            $count=0;
                            $contenido_series = get_field('contenido_series', false, false);
                            $args = array(
                                'post_type'     => 'post',
                                'showposts'     =>  -1,
                                'post__in'		=> $contenido_series,
                                'order'         => 'DESC',
                                'orderby'       => 'post__in',
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
                            get_template_part( 'template-parts/content', 'contenidos-series' );
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

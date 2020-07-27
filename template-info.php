<?php
/**
 * Template Name: Plantilla Información
 * Plantilla Términos y Condiciones.
 *
 * @package maguare
 */
get_header('info'); ?>
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
                        <?php the_title(); ?>
                    </h1>
                </div>
                <!-- Page title -->
                <?php
                while ( have_posts() ) : the_post(); ?>
                <!-- Start Content page -->
                <section class="section-page">
                    <div class="text-content">
                        <div class="text-note text-color-brown">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section>
                <!-- Page Content page -->
               <?php endwhile; // End of the loop.?>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->
<?php
//get_sidebar();
get_footer();

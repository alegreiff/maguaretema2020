<?php
/**
 * Template Name: Página Buscador Avanzado
 * Plantilla Buscador Avanzado 
 *
 * @package maguare
 */
get_header('buscador'); ?>
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
                        Buscador Avanzado
                    </h1>
                </div>

                <!-- Start Content page -->
                <section class="section-page content-notes-list">
                    <div class="standard-container">
                        <div class="search-inline-content-box">
                            <div class="search-inline-content-box__content search-box">
                                <div class="search-box__image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/monkey-01.png" alt="monkey">
                                </div>
                                <div class="search-box__content">
                                    <div class="search-box__heading">
                                        <p class="text-note text-color-black">¡Saimiri te ayuda a encontrar lo que estás buscando! Escribe la palabra clave y selecciona el tipo de contenido que quieres.</p><br>
                                        <div class="buscador-avanzado">
                                            <?php echo do_shortcode( '[wd_asp id=1]' );?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- standard container-->
                </section> <!-- End section search none--><br><br><br><br><br><br><br><br><br><br><br><br>
                <!-- Page Content page -->

            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->
<?php
//get_sidebar();
get_footer();

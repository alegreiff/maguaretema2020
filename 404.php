<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package maguare
 */
get_header('buscador');?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <div class="mg__bg section__opening">
                <div class="section-page__wrapper">
                    <!-- Start Maguare Logo -->
                    <div class="mg__logo">
                        <?php if ( get_theme_mod( 'maguare_logo_header' ) ) : ?>
                        <a href="<?php echo get_site_url();?>/"><img src="<?php echo get_theme_mod( 'maguare_logo_header');?>" alt="Maguare Logo"></a>
                        <?php else : ?>
                        <a href="<?php echo get_site_url();?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-maguare.png" alt="Maguaré Logo"></a>
                        <?php endif; ?>
                    </div>
                    <!-- End Maguare Logo -->
                    <!-- Start Page title -->
                    <div class="heading-page__container">
                        <h1 class="heading-page text-color-brown">
                            Página No Encontrada
                        </h1>
                    </div>
                    <!-- Page title -->
                    <!-- Start Content page -->
                    <section class="section-page content-notes-list">
                        <div class="notes-list">
                            <h2 class="heading-page text-color-brown">
                                
                            </h2>
                            <div class="search-inline-content-box">
                                <div class="search-inline-content-box__content search-box">
                                    <div class="search-box__image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/monkey-01.png" alt="monkey">
                                    </div>
                                    <div class="search-box__content">
                                        <div class="search-box__heading">
                                            <p class="text-note text-color-white">
                                                ¡Estos filtros te ayudarán a encontrar lo que estás buscando! Puedes elegir entre las distintas actividades que te proponen los contenidos, el formato o un tema en específico sobre el cual quieras obtener resultados. 
                                            </p>
                                        </div>
                                        <div class="search-box__form">
                                            <?php echo do_shortcode( '[wd_asp id=1]' );?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br><br><br><br><br><br><br><br>
                    </section>
                    <!-- Page Content page -->
                </div>
            </div>
        </section><!-- .error-404 -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

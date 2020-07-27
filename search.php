<?php
/**
 * search.php
 *
 * @package maguare
 */
get_header('buscador'); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

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
                        Resultados de Búsqueda
                    </h1>
                </div>
                <!-- Page title -->
                <?php if ( have_posts() ) : ?>
                <!-- Start Content page Search -->
                <section class="section-page content-notes-list">
                    <div class="notes-list">
                        <h2 class="heading-page text-color-brown">
                            <?php printf( esc_html__( 'Resultados de Búsqueda para : %s', 'maguare' ),  get_search_query() ); ?>
                        </h2>
                        <div data-destroy="true" data-slider-pager="false" data-slider-color="blue-dark">
                            <div class="notes-list__container">
                                <?php /* Start the Loop */ 
                                $count=0;
                                ?>                                       
                                <?php while ( have_posts() ) : the_post(); ?>
                                <?php
                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', 'search' );
                                ?>
                                <?php
                                $count++; 
                                if ($count % 3 == 0 ) {echo '</div><!-- /.notes-list__container --><div class="notes-list__container">';}?>
                                <?php endwhile; ?>
                                
                            </div>
                        </div><br><br>
                    </div>
                </section>
                <?php else : ?>
                                    <?php get_template_part( 'template-parts/content', 'search-none' ); ?>
                                <?php endif; ?>
                <!-- Page Content page Search -->
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->
<?php
//get_sidebar();
get_footer();

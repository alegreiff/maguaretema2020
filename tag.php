<?php
/**
 * tag.php
 *
 * @package maguare
 */
get_header('tags'); ?>
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
                        <?php 
                            $tag_title = ucfirst( single_tag_title( '', false ) );
                            printf( __( '   %s', 'maguare' ), '<strong>' . $tag_title . '</strong>' ); 
                        ?>
                    </h1>
                </div>
                <!-- Page title -->
                <?php if ( have_posts() ) : ?>
                <!-- Start Content page -->
                <section class="section-page content-notes-list">
                    <div class="notes-list">
                        <h2 class="heading-page text-color-brown"></h2>
                        <?php if ( tag_description() ) : // Show an optional tag description ?>
                        <div class="archive-meta"><?php echo tag_description(); ?></div>
                        <?php endif; ?>
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
                                <?php else : ?>
                                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                                <?php endif; ?>
                            </div>
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

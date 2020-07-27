<?php
/**
 *  Apps
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
                <!-- Start App content -->
                <section class="section-page">
                    <article class="note note--media">
                        <div class="note__content" data-expand>
                            <h2 class="heading-note--bold text-color-brown"><?php the_title();?></h2>
                            <div class="note__media note__media--apps">
                                <div class="note__media__container">
                                    <figure>
                                        <i class="note__content--icon icon-m-app"></i>
                                        <?php $image = get_field('thumbnail');
                                        if( !empty($image) ): ?>
                                        <img src="<?php echo $image['url']; ?>" alt="Imagen destacada maguaré">
                                        <?php endif; ?>
                                    </figure>
                                    <div class="note__media__apps-content">
                                        <?php if (get_field('enlace_tienda_android')): ?> 
                                        <a class="link-1 button--playstore" href="<?php the_field('enlace_tienda_android'); ?>" target="_blank"></a>
                                        <?php endif; ?>
                                        <?php if (get_field('enlace_tienda_ios')): ?> 
                                        <a class="link-1 button--appstore" href="<?php the_field('enlace_tienda_ios'); ?>" target="_blank"></a>
                                        <?php endif; ?>
                                        <?php if (get_field('enlace_externo')): ?> 
                                        <a class="link-1 button--yellow button--pc" href="<?php the_field('enlace_externo'); ?>" target="_blank">Descargar en PC</a>
                                        <?php endif; ?>                                    
                                    </div>
                                </div>
                                <p class="text-note text-color-brown"><?php the_field('descripcion'); ?></p>
                            </div>
                        </div>
                        <?php echo social_network(); ?>
                    </article>
                </section>
                <!-- End App content -->

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
                                <?php get_template_part( 'template-parts/content', 'contenidos-relacionados-apps' ); ?>
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
<?php
/**
 * Libro Online
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
                <!-- Start Libro Online content -->
                <section class="section-page">
                    <article class="note note--media">
                        <div class="note__content" data-expand>
                            <h2 class="heading-note--bold text-color-brown">
                                <?php the_title();?>
                            </h2>
                            <div class="note__media note__media--book">
                                <div class="note__media__container">
                                    <?php 
                                    $flipbook_shortcode = get_field('shortcode_libro_online', false, false);
                                    echo do_shortcode( $flipbook_shortcode );?>
                                </div>
                                
                                <p class="text-note text-color-brown">
                                    <?php the_field('descripcion'); ?>
                                </p>
                                
                                <?php if (get_field('resena_libro')): ?> 
                                    <p class="text-note text-color-brown maguare_resena">
                                        <?php the_field('resena_libro'); ?>
                                    </p>
                                <?php endif; ?>
                                <?php muestra_autor();?>
                                
                            </div>
                            
                            <div class="acciones_maguare">
                            <?php 
                                $libro1 = get_field('url_descarga_pdf');
                                $libro2 = get_field('url_descarga_pdf_dos');
                                $descarga_1 = get_field('url_descarga_pdf_titulo_uno') ? get_field('url_descarga_pdf_titulo_uno') : 'Descargar';
                                $descarga_2 = get_field('url_descarga_pdf_titulo_dos') ? get_field('url_descarga_pdf_titulo_dos') : 'Descargar';
                                if($libro1 && $libro2){
                                    ?>
                                        
                                        <a href="<?php the_field('url_descarga_pdf'); ?>" target="_blank" class="button button--yellow"><?php echo $descarga_1;?></a>
                                        <a href="<?php the_field('url_descarga_pdf_dos'); ?>" target="_blank" class="button button--yellow"><?php echo $descarga_2;?></a>
                                        
                                    <?php
                                }else{
                                    ?><a href="<?php the_field('url_descarga_pdf'); ?>" target="_blank" class="button button--yellow note__cta-expand"><?php echo $descarga_1;?></a><?php
                                }
                                ?>
                                
                            
                        
                            <?php muestra_lindo_boton(); ?>
                            
                           
                        
                            </div>
                            <?php echo social_network(); ?>
                        </div>
                    </article>
                </section>
                <!-- End Libro Online content -->
                <!-- Start Content page -->
                <section class="section-page content-notes-list">
                    <div class="notes-list notes-list--short">
                        <div class="mg-slider" data-slider-color="">
                            <div class="notes-list__container">
                                <?php
                                /*Relacionados Maguaré*/
                                $count=0;
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

                                // query
                                $the_query = new WP_Query( $args );
                                ?>
                                <?php if( $the_query->have_posts() ): ?>
                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <?php
                                /* Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.*/
                                get_template_part( 'template-parts/content', 'contenidos-relacionados-libro-online' );
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

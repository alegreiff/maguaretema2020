<?php
/**
 * Template Name: Consulta
 * Plantilla Consulta.
 *
 * @package maguare
 */
get_header('search'); ?>
<?php
global $link_contenido;
if ( is_page('consulta')) {
    $link_contenido = "link-1--blue-light";
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
                        Consulta
                    </h1>
                </div>
                <!-- Page title -->
                <!-- Start Content page -->
                <section class="section-page content-notes-list">
                    <div class="notes-list">
                        <button class="button button--random">
                        </button>
                        <div class="mg-slider" data-destroy="true" data-slider-color="orange">
                            <div class="notes-list__container">
                                <?php
                                // args
                                $count=0;
                                $args = array(
                                    'post_type'     =>  'post',
                                    'post_status'   => array( 'publish ', ' private' ),
                                    'showposts'     =>  -1,
                                    'order'         =>  'ASC',
                                );
                                // query
                                $the_query = new WP_Query( $args );
                                ?>
                                <?php if( $the_query->have_posts() ): ?>
                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <article class="note note--short">
                                        <div class="note__content">
                                            <h2 class="heading-note text-color-brown">
                                                <p style="color:red;">NOMBRE : </p><?php  the_title();?><br>
                                                <p style="color:red;"> URL FASE 2 :</p> <?php  the_permalink(); ?><br>
                                                <p style="color:red;">TIPO DE CONTENIDO :</p> <?php $category = get_the_category();
                                                       echo $category[0]->cat_name;?><br>
                                                <p style="color:red;">Intérprete-autor :</p> <?php the_field('interprete_autor'); ?><br>
                                                <p style="color:red;">Descripción - extracto :</p> <?php the_field('descripcion'); ?><br>
                                                <p style="color:red;">duracion-segundos : </p> <?php the_field('duracion'); ?><br>
                                                <p style="color:red;">seccion : </p> <?php the_field('seccion'); ?><br>
                                                <p style="color:red;">TAGS : </p>
                                                  <?php   $posttags = get_the_tags();
                                                  if ($posttags) {
                                                    foreach($posttags as $tag) {
                                                      echo $tag->name . ' - '; 
                                                    }
                                                  }?><br>
                                                <p style="color:red;">licencia : </p> <?php the_field('licencia'); ?><br>  
                                                <p style="color:red;">vigencia : </p> <?php the_field('vigencia'); ?><br>  
                                                <p style="color:red;">guia de uso : </p> <?php the_field('guia_de_uso'); ?><br>
                                                <p style="color:red;">¿Movil? : </p> <?php the_field('movil'); ?><br>
                                                <p style="color:red;">Enlace externo : </p> <?php the_field('enlace_externo'); ?><br>
                                                <p style="color:red;">Enlace tienda IOS : </p> <?php the_field('enlace_tienda_ios'); ?><br>
                                                <p style="color:red;">Enlace tienda Android : </p> <?php the_field('enlace_tienda_android'); ?><br>
                                                <p style="color:red;">Reseña Libro : </p> <?php the_field('resena_libro'); ?><br>
                                                <p style="color:red;">Letra Canción : </p> <?php the_field('letra_cancion'); ?><br>
                                                <p style="color:red;">Reseña Vídeo : </p> <?php the_field('resena_video'); ?><br>
                                                <p style="color:red;">ESTADO ACTIVO ? : </p> <?php the_field('estado_activo'); ?><br>
                                                
                                            </h2>
                                            <figure>
                                                <i class="note__content--icon"></i>
                                                <?php $image = get_field('thumbnail');
                                                if( !empty($image) ): ?>
                                                <img src="<?php echo $image['url']; ?>" alt="">
                                                <?php endif; ?>
                                                <div class="note__overlay">
                                                    <a class="link-1 link-1--dashed__bw" href="<?php the_permalink(); ?>" target="_blank">
                                                        Ver Más
                                                    </a>
                                                </div>
                                            </figure>
                                        </div>
                                    </article>
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
                        </div> <!-- ./mg-slider-->
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

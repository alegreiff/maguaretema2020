<?php
/**
 * Template Name: Página Mapa del sitio
 * Plantilla Mapa del Sitio.
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
                <section class="section-page">
                    <div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>Aplicaciones</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'category_name'          => 'APP',
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>Audios</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'cat'                    => '11,14', 
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>Interactivos</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'category_name'          => 'Interactivo',
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>Libros</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'cat'                    => '15,16', 
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php /*<div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>Series de audio</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'category_name'          => 'Serie Audio',
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>*/ ?>
                    <div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>Series de libros</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'category_name'          => 'Serie Libro',
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>Series de vídeo</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'category_name'          => 'Serie Vídeo',
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="text-content">
                        <br><h1 class='heading-note--bold text-color-brown'>vídeos</h1><br>
                        <?php 
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'post' ),
                            'post_status'            => array( 'publish' ),
                            'cat'                    => '12,13', 
                            'order'                  => 'ASC',
                            'orderby'                => 'title',
                            'posts_per_page'         => -1
                        );

                        // The Query
                        $query = new WP_Query( $args );

                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();?>
                                    <a class="text-note text-color-brown" href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>

                        <?php    }
                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                </section>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->
<?php
//get_sidebar();
get_footer();

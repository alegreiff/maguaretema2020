<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maguare
 */

?>
        <?php
        global $post, $icono_contenido, $cat;
        $post = $post->ID;

        foreach( (get_the_category($post)) as $category) {
            $cat = $category->cat_name;

            if($cat  == 'APP'){
                $icono_contenido = 'icon-m-app';
            }
            if($cat == 'Audio' || $cat == 'Serie de audio' || $cat == 'Serie Audio'){
                $icono_contenido = 'icon-m-audio';
            }
            if($cat == 'Vídeo' || $cat == 'Serie de vídeo' || $cat == 'Serie Vídeo' || $cat == 'Lista de Video'){
                $icono_contenido = 'icon-m-video';
            }
            if($cat == 'Libro Online' || $cat == 'Serie de libro' || $cat == 'Serie Libro'){
                $icono_contenido = 'icon-m-libro';
            }
            if($cat == 'Interactivo'){
                $icono_contenido = 'icon-m-interactivo';
            }
            if(get_field('mag_contenido_relacionado_maguared')){
                $clase_actividad=' mag_contenido_relacionado_maguared';
            }else{
                $clase_actividad='';
            }
            $icono_contenido = $icono_contenido.$clase_actividad;
        }
        ?>
        <article class="note note--short">
            <?php if($cat == 'APP') { ?>
            <div class="note__content" data-note-modal='app' data-url-appstore="<?php the_field('enlace_tienda_ios'); ?>" data-url-playstore="<?php the_field('enlace_tienda_android'); ?>" data-url-pc="<?php the_field('enlace_externo'); ?>">
                <h2 class="heading-note text-color-brown" data-note-head>
                    <?php the_title();?>
                </h2>
                <figure data-note-image >
                    <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                    <?php
                    $image = get_field('thumbnail');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="">
                    <?php endif; ?>
                    <div class="note__overlay">
                        <a class="link-1 link-1--dashed__bw" href="<?php the_permalink(); ?>">
                            Ver más
                        </a>
                    </div>
                </figure>
                <p class="text-note text-color-white note__hidden-content" data-note-body>
                    <?php
                    $content = get_field('descripcion');
                    $trimmed_content = wp_trim_words($content, 50, '...');
                    echo $trimmed_content;
                    ?>
                </p>
            </div>
            <?php } ?>
            <?php if($cat == 'Interactivo') { ?>
            <div class="note__content" data-note-modal='interactive' data-url-interactive="<?php the_field('url_interactivo'); ?>">
                <h2 class="heading-note text-color-brown" data-note-head>
                    <?php the_title();?>
                </h2>
                <figure data-note-image >
                    <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                    <?php 
                    $image = get_field('thumbnail');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="">
                    <?php endif; ?>
                    <div class="note__overlay">
                        <a class="link-1 link-1--dashed__bw" href="<?php the_permalink(); ?>">
                            Ver más
                        </a>
                    </div>
                </figure>
            </div>
            <?php } ?>
            <?php if($cat == 'Audio' || $cat == 'Serie de audio' || $cat == 'Vídeo' || $cat == 'Serie de vídeo' || $cat == 'Libro Online' || $cat == 'Serie de libro' || $cat == 'Serie Audio' || $cat == 'Serie Vídeo' || $cat == 'Serie Libro' || $cat == 'Lista de Video' ) { ?>
            <div class="note__content">
                <h2 class="heading-note text-color-brown">
                    <?php the_title();?>
                </h2>
                <figure>
                    <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                    <?php 
                    $image = get_field('thumbnail');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="">
                    <?php endif; ?>
                    <div class="note__overlay">
                        <a class="link-1 link-1--dashed__bw" href="<?php the_permalink(); ?>">
                            Ver más
                        </a>
                    </div>
                </figure>
            </div>
            <?php } ?>
        </article>
        
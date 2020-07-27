<?php
/**
 * Template part for displaying page content in content-interactivos-seccion.php
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
            if($cat == 'Vídeo' || $cat == 'Serie de vídeo' || $cat == 'Serie Vídeo'){
                $icono_contenido = 'icon-m-video';
            }
            if($cat == 'Libro Online' || $cat == 'Serie de libro' || $cat == 'Serie Libro'){
                $icono_contenido = 'icon-m-libro';
            }
            if($cat == 'Interactivo'){
                $icono_contenido = 'icon-m-interactivo';
            }
        }
        ?>
        <article class="note note--short" data-note-modal='interactive' data-url-interactive="<?php the_field('url_interactivo'); ?>">
            <div class="note__content">
                <h2 class="heading-note text-color-brown" data-note-head>
                    <?php the_title();?>
                </h2>
                <figure data-note-image>
                    <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                    <?php $image = get_field('thumbnail');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="Contenido Destacado Maguaré">
                    <?php endif; ?>
                    <div class="note__overlay">
                        <a class="link-1 link-1--dashed__bw" href="#">
                            Ver más
                        </a>
                    </div>
                </figure>
            </div>
        </article>
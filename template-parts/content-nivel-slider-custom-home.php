<?php
/**
 * Template part for displaying page content in content-nivel-slider-custom-home.php
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
        <article class="note note--standard ">
            <figure data-note-image>
                <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                <?php $image = get_field('thumbnail_slider_custom');
                if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="Contenido Destacado Maguaré">
                <?php endif; ?>
            </figure>
            <div class="note__content">
                <h2 class="heading-note--bold text-color-white" data-note-head>
                    <?php the_field('titulo_slider_custom');?>
                </h2>
                <p class="text-note text-color-white" data-note-body>
                    <?php
                    $content = get_field('descripcion_slider_custom');
                    $trimmed_content = wp_trim_words($content, 50, '...');
                    echo $trimmed_content;
                    ?>
                </p>
                <a class="link-1 link-1--wine" href="<?php the_field('link_slider_custom'); ?>">
                    Ver más
                </a>
            </div>
        </article>

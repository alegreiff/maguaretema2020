<?php
/**
 * Template part for displaying page content in content-contenidos-destacados-audio.php
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

        <article class="note"> 
            <div class="note__content">
                <h2 class="heading-note--bold text-color-brown">
                    <?php the_title();?>
                </h2>
                <figure data-note-image>
                    <i class="note__content--icon <?php echo $icono_contenido; ?>">
                    </i>
                    <?php $image = get_field('thumbnail');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="Imagen destacada maguaré">
                    <?php endif; ?>
                </figure>
                <p class="text-note text-color-brown">
                    <?php
                         $content = get_field('descripcion');
                         $trimmed_content = wp_trim_words($content, 20, '...');
                         echo $trimmed_content;
                    ?>
                </p>
                <a class="link-1 link-1--yellow" href="<?php the_permalink(); ?>">
                    Ver más
                </a>
            </div>
        </article>
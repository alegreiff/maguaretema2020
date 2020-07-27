<?php
/**
 * Template part for displaying page content in content-nivel-destacado-home-especial.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maguare
 */

?>
        <?php
        global $post, $icono_contenido, $cat, $modal;
        $post = $post->ID;

        foreach( (get_the_category($post)) as $category) {
            $cat = $category->cat_name;

            if($cat  == 'APP'){
                $icono_contenido = 'icon-m-app';
                $modal = 'app';
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
                $modal = 'interactive';
            }
        }
        ?>
        <?php if($cat  == 'APP' || $cat == 'Interactivo'){ ?>
        <article class="note note--standard " data-note-modal='<?php echo $modal; ?>' data-url-appstore="<?php the_field('enlace_tienda_ios'); ?>" data-url-playstore="<?php the_field('enlace_tienda_android'); ?>" data-url-pc="<?php the_field('enlace_externo'); ?>" data-url-interactive="<?php the_field('url_interactivo'); ?>">
        <?php } else { ?>
        <article class="note note--standard ">
        <?php } ?>
            <figure data-note-image>
                <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                <?php $image = get_field('thumbnail');
                if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="Contenido Destacado Maguaré">
                <?php endif; ?>
            </figure>
            <div class="note__content">
                <h2 class="heading-note--bold text-color-brown" data-note-head>
                    <?php the_title();?>
                </h2>
                <p class="text-note text-color-brown" data-note-body>
                    <?php
                    $content = get_field('descripcion');
                    $trimmed_content = wp_trim_words($content, 50, '...');
                    echo $trimmed_content;
                    ?>
                </p>
                <?php if($cat  == 'APP' || $cat == 'Interactivo'){ ?>
                <a class="link-1 link-1--blue-light" href="#">
                    Ver más
                </a>
                <?php } else { ?>
                <a class="link-1 link-1--blue-light" href="<?php the_permalink(); ?>">
                    Ver más
                </a>
                <?php } ?>
            </div>
        </article>

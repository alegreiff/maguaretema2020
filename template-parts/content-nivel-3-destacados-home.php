<?php
/**
 * Template part for displaying page content in content-nivel-3-destacados-home.php
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
        <?php if($cat == 'APP') { ?>
        <article class="note note--standard short-slider" data-note-modal='app' data-url-appstore="<?php the_field('enlace_tienda_ios'); ?>" data-url-playstore="<?php the_field('enlace_tienda_android'); ?>" data-url-pc="<?php the_field('enlace_externo'); ?>">
            <figure data-note-image>
                <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                <?php
                $image = get_field('thumbnail');
                if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="Imagen destacada maguaré">
                <?php endif; ?>
            </figure>
            <div class="note__content">
                <h2 class="heading-note--bold text-color-brown" data-note-head>
                    <?php the_title();?>
                </h2>
                <p class="text-note text-color-brown" data-note-body>
                    <?php
                     $content = get_field('descripcion');
                     $trimmed_content = wp_trim_words($content, 20, '...');
                     echo $trimmed_content;
                    ?>
                </p>
                <a class="link-1 link-1--orange" href="#">
                    Ver más
                </a>
            </div>
        </article>
        <?php } ?>
        <?php if($cat == 'Interactivo') { ?>
        <article class="note note--standard short-slider" data-note-modal='interactive' data-url-interactive="<?php the_field('url_interactivo'); ?>">
            <figure data-note-image>
                <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                <?php
                                 $image = get_field('thumbnail');
                                 if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="Imagen destacada maguaré">
                <?php endif; ?>
            </figure>
            <div class="note__content">
                <h2 class="heading-note--bold text-color-brown" data-note-head>
                    <?php the_title();?>
                </h2>
                <p class="text-note text-color-brown" data-note-body>
                    <?php
                     $content = get_field('descripcion');
                     $trimmed_content = wp_trim_words($content, 20, '...');
                     echo $trimmed_content;
                    ?>
                </p>
                <a class="link-1 link-1--orange" href="#">
                    Ver más
                </a>
            </div>
        </article>
        <?php } ?>
        <?php if($cat == 'Audio' || $cat == 'Serie de audio' || $cat == 'Vídeo' || $cat == 'Serie de vídeo' || $cat == 'Libro Online' || $cat == 'Serie de libro' || $cat == 'Serie Audio' || $cat == 'Serie Vídeo' || $cat == 'Serie Libro' ) { ?>
        <article class="note note--standard short-slider">
            <figure data-note-image>
                <i class="note__content--icon <?php echo $icono_contenido; ?>"></i>
                <?php $image = get_field('thumbnail');
                                        if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="Imagen destacada maguaré">
                <?php endif; ?>
            </figure>
            <div class="note__content">
                <h2 class="heading-note--bold text-color-brown" data-note-head>
                    <?php the_title();?>
                </h2>
                <p class="text-note text-color-brown" data-note-body>
                    <?php
                    $content = get_field('descripcion');
                    $trimmed_content = wp_trim_words($content, 20, '...');
                    echo $trimmed_content;
                    ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="link-1 link-1--orange"  target="_self">
                    Ver más
                </a>
            </div>
        </article>
        <?php } ?>
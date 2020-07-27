<?php 
function miniatura_general($icono_contenido){
    ?>
        <div class="note__contentido">
            <a class="link-1 link-1--dashed__bw" href="<?php the_permalink(); ?>">
                <h2 class="heading-note text-color-brown">
                <?php the_title();?>
                </h2>
                <div class="contienefigure">
                    <figure style="background-image: url('<?php echo get_field('thumbnail')['url']; ?>')">
                        <p class="note__content--icon <?php echo $icono_contenido; ?>"></p>
                    </figure>
                </div>
            </a>
        </div>    
    <?php
}

function miniatura_interactivo($icono_contenido){
    ?>
    <div class="note__content" data-note-modal='interactive' data-url-interactive="<?php the_field('url_interactivo'); ?>">
        <a href="#" class="link-1 ">
            <h2 class="heading-note text-color-brown" data-note-head>
                <?php the_title();?>
            </h2>
            <div class="contienefigure">
                <figure data-note-image style="background-image: url('<?php echo get_field('thumbnail')['url']; ?>')">
                    <p class="note__content--icon <?php echo $icono_contenido; ?>"></p>
                </figure>
            </div>
        </a>
    </div>
    <?php
}

function miniatura_app($icono_contenido){
    ?>
    <div class="note__content" data-note-modal='app' data-url-appstore="<?php the_field('enlace_tienda_ios'); ?>" data-url-playstore="<?php the_field('enlace_tienda_android'); ?>" data-url-pc="<?php the_field('enlace_externo'); ?>">
        <a class="link-1 link-1--dashed__bw" href="#">
            <h2 class="heading-note text-color-brown" data-note-head>
                <?php the_title();?>
            </h2>
            <div class="contienefigure">
                <figure data-note-image style="background-image: url('<?php echo get_field('thumbnail')['url']; ?>')">
                    <p class="note__content--icon <?php echo $icono_contenido; ?>"></p>
                    <?php
                    $image = get_field('thumbnail');
                    if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="">
                    <?php endif; ?>
                </figure>
            </div>
                <p class="text-note text-color-white note__hidden-content" data-note-body>
                    <?php
                    $content = get_field('descripcion');
                    $trimmed_content = wp_trim_words($content, 50, '...');
                    echo $trimmed_content;
                    ?>
                </p>
        </a>
    </div>
    <?php
}

function header_maguare() {
    
    
    ?>
        <a class="logo-ministerioenhome" href="http://www.mincultura.gov.co" target="_blank">
        <img src="<?php echo get_stylesheet_directory_uri();?>/images/logosfooter/logo371x102maguare.png" alt="Ministerio de Cultura" class="">
        </a>

        <a class="link-home" href="<?php echo get_theme_mod( 'maguare_logo_1_url_institucional_header');?>" target="_self"> <img src="<?php echo get_template_directory_uri(); ?>/images/fox-header.png" alt="image"></a>
    
        <h2 class="heading-note text-color-brown">Maguaré</h2>
    
        <!-- <a class="logo-magua" href="<?php echo get_theme_mod( 'maguare_logo_2_url_institucional_header');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-magua-01.png" alt="image"></a> -->
    <?php
}
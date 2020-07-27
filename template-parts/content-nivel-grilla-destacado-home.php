<?php
/**
 * Template part for displaying page content in content-nivel-grilla-destacado-home.php
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
                <?php miniatura_app($icono_contenido);?>
            <?php } ?>
            <?php if($cat == 'Interactivo') { ?>
                <?php miniatura_interactivo($icono_contenido);?>
            
            <?php } ?>
            <?php if($cat == 'Audio' || $cat == 'Serie de audio' || $cat == 'Vídeo' || $cat == 'Serie de vídeo' || $cat == 'Libro Online' || $cat == 'Serie de libro' || $cat == 'Serie Audio' || $cat == 'Serie Vídeo' || $cat == 'Serie Libro' || $cat == 'Lista de Video' ) { ?>
                
                
                <?php miniatura_general($icono_contenido);?>
                    
            <?php } ?>
        </article>
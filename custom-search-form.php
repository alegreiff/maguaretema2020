<?php
/**
 * Plantilla para Buscador Avanzado Maguaré V 1.0
 * Esta Plantilla esta desactivada debido al buscador 2.0 https://maguare.gov.co/buscador-avanzado/
 * Para Usarlo en cualquier plantilla : <?php get_template_part('custom-search-form'); ?>  
 * @package maguare
 *
 */
?>
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>">
        <?php   wp_dropdown_categories( array(
                    'show_option_none' => __( 'Selecciona tipo de contenido' ),
                    'orderby' => 'name',
                    'exclude' => '1',
                    'echo' => 1,
                    'name' => 'cat',
                    'selected' => isset( $_GET['cat'] ) ? $_GET['cat'] : '', 
                    'hierarchical' => true,
                    'class'	=> 'select',
                    'id'	=> 'custom-cat-drop',
                    'value_field' => 'term_id'
                ) ); ?>
          <?php   wp_dropdown_categories( array(
                    'show_option_none' => __( 'Selecciona palabra clave' ),
                    'taxonomy'=> 'post_tag',
                    'hide_empty' => 0,
                    'name' => 's',
                    'orderby' => 'name',
                    'exclude' => '1',
                    'echo' => 1,
                    'selected' => isset( $_GET['s'] ) ? $_GET['s'] : '',
                    'hierarchical' => true,
                    'class'	=> 'select',
                    'id'	=> 's',
                    'value_field' => 'name'
                ) ); ?>
                <select class="select" id="custom-cat-drop-3" name="s_actividad">
                <option value="-1">Selecciona una actividad</option>
                <?php 
                $field_key = "field_5a19cce869274";
                $field = get_field_object($field_key);
                $actividades = $field['choices']; ?>
                    <?php 
                    $selectOption = isset($_GET['s_actividad']);
                        foreach ( $actividades as $actividad ) {
                            echo '<option value="'.$actividad.'"';
                                if(isset($_GET['s_actividad']) && $selectOption == $actividad ){
                                    echo ' selected="selected" ';
                            }
                            echo '>'. $actividad .'</option>';
                        } 
                    ?>
                </select>           
        <input type="submit" id="searchsubmit" class="button button--blue button--small" value="Buscar" />
    </form>
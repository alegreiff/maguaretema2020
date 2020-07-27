<?php
/**
 * Template part for displaying menu content-menu-maguare.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maguare
 */

?>
<?php /*        <ul class="nav__list">
            <li class="nav__item nav__home"><a class="active" href="<?php echo get_site_url();?>"><span></span><p>Inicio</p></a></li>
            <li class="nav__item nav__watch"><a href="<?php echo get_site_url();?>/ver/"><span></span><p>Ver</p></a></li>
            <li class="nav__item nav__listen"><a href="<?php echo get_site_url();?>/escuchar/"><span></span><p>Escuchar</p></a></li>
            <li class="nav__item nav__read"><a href="<?php echo get_site_url();?>/leer/"><span></span><p>Leer</p></a></li>
            <li class="nav__item nav__sing"><a href="<?php echo get_site_url();?>/cantar/"><span></span><p>Cantar</p></a></li>
            <li class="nav__item nav__dance"><a href="<?php echo get_site_url();?>/bailar/"><span></span><p>Bailar</p></a></li>
            <li class="nav__item nav__play"><a href="<?php echo get_site_url();?>/jugar/"><span></span><p>Jugar</p></a></li>
            <li class="nav__item nav__create"><a href="<?php echo get_site_url();?>/crear/"><span></span><p>Crear</p></a></li>
        </ul>
        */ ?>
        

<?php 
if( have_rows('menu_principal','option') ): ?>
    <ul class="nav__list"> 
        <?php while( have_rows('menu_principal','option') ): the_row();
            // vars
            $texto_link = get_sub_field('texto_link','option');
            $link_item_menu = get_sub_field('link_item_menu','option');
            $clase_svg = get_sub_field('clase_svg','option');
            foreach( $link_item_menu as $p ):
        ?>
        <li class="nav__item <?php echo $clase_svg; ?>"><a href="<?php echo get_permalink( $p->ID ); ?>"><span></span><p><?php echo $texto_link; ?></p></a></li>
        <?php 
            endforeach;    
        endwhile; ?>
    </ul>    
<?php endif; ?> 
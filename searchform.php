<?php
/**
 * Plantilla para Buscador Maguaré
 *
 * @package maguare
 *
 */
?>
	<form class="desktop-only" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input class="input input__search" type="text" name="s" id="s"  value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( '¿Qué estás buscando?', 'maguare' ); ?>" />
		<input type="submit" class="button button--red-salmon button--small button--search" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Buscar', 'maguare' ); ?>" />
	</form>
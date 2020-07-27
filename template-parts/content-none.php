<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maguare
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title text-color-brown"><?php esc_html_e( 'Contenido no encontrado', 'maguare' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Listo para publicar contenido ? <a href="%1$s">Comienza aquí</a>.', 'maguare' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Lo sentimos, pero nada coincide con tus términos de búsqueda. Inténtalo de nuevo con algunas palabras clave diferentes.', 'maguare' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p class="text-color-brown"><?php esc_html_e( 'Parece que no podemos encontrar lo que estás buscando. Quizás usando nuestro buscador pueda ayudar.', 'maguare' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

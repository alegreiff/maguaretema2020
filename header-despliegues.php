<?php
/**
 * Header : despliegues
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maguare
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1, maximum-scale=1">
        <?php 
        if(has_tag()) {
            if (is_single()) {
                foreach((get_the_tags()) as $tag) {$keywords[] = strtolower($tag->name);}
                foreach((get_the_category()) as $category) {$keywords[] = strtolower($category->cat_name);} ?>
        <meta name="keywords" content="<?php echo implode(", ", array_unique($keywords)); ?>" /><?php } ?>
        <?php    } else { ?><meta name="keywords" content="juegos infantiles, juegos para niños, rondas, arullos, cuentos para niños, canciones infantiles">
        <?php } ?><meta name="author" content="www.maguare.gov.co">
        <meta name="language" content="es">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <meta property="og:locale" content="es_CO" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php the_title();?>" />
        <meta property="og:description" content="<?php the_field('descripcion'); ?>" />
        <meta property="og:url" content="<?php the_permalink();?>" />
        <meta property="og:site_name" content="Maguaré - Ministerio de Cultura de Colombia" />
        <?php $image = get_field('thumbnail'); if( !empty($image) ): ?><meta property="og:image" content="<?php $image = get_field('thumbnail'); echo esc_url( $image['url'] ); ?>" /><?php endif; ?>
        <meta property="fb:app_id" content="2050097928600714"/>
            
        <?php wp_head(); ?>
    </head>

    <body <?php body_class('mg'); ?>>
        <div id="page" class="site">
            <main class="mg__section-page">
                <!-- Start Global Header -->
                <header class="header">
                    <div class="header__wrapper">
                        <div class="header__welcome">
                        <?php header_maguare();?>
                            <button class="button button--red-salmon button--menu"></button>
                        </div>
                        <div class="header__search">
                            <?php get_search_form(); ?>
                            <a class="link-1 button--red-salmon button--small button--search-mobile mobile-only" href="<?php echo get_site_url();?>/buscador-avanzado/">Buscar</a>
                            <a class="button button--red-salmon button--small button--advanced-search" href="<?php echo get_site_url();?>/buscador-avanzado/">Búsqueda Avanzada</a>
                        </div>
                        <div class="header__share">
                            <!-- <a href="<?php echo get_site_url();?>/mapa-del-sitio" class="button button--share button--sitemap"></a> -->
                            <a href="<?php echo get_theme_mod( 'url_social_facebook');?>" class="button button--share button--share-fb" target="_blank"></a>
                            <a href="<?php echo get_theme_mod( 'url_social_twitter');?>" class="button button--share button--share-tw" target="_blank"></a>
                            <a href="<?php echo get_theme_mod( 'url_social_youtube');?>" class="button button--share button--share-yt" target="_blank"></a>
                        </div>
                        <!-- Start Global Nav -->
                        <nav class="nav">
                            <?php get_template_part( 'template-parts/content', 'menu-maguare' );?>
                            <button class="button button--close">X</button>
                        </nav>
                        <!-- End Global Nav -->
                    </div>
                </header>
                <!-- End Global Header -->
                <div id="content" class="site-content">
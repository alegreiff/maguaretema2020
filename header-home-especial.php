<?php
/**
 * Header Home Especial
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
        <meta name="keywords" content="juegos infantiles, juegos para niños, rondas, arullos, cuentos para niños, canciones infantiles">
        <meta name="author" content="www.maguare.gov.co">
        <meta name="language" content="es">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <meta property="og:locale" content="es_CO" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Maguaré - Ministerio de Cultura de Colombia" />
        <meta property="og:description" content="Maguaré, descubre imagina y crea, portal infantil de la Estrategia Digital de Cultura y Primera Infancia del Ministerio de Cultura de Colombia." />
        <meta property="og:url" content="https://maguare.gov.co/" />
        <meta property="og:site_name" content="Maguaré - Ministerio de Cultura de Colombia" />
        <meta property="og:image" content="https://maguare.gov.co/wp-content/uploads/2018/02/op_maguare.jpg" />
        <meta property="fb:app_id" content="2050097928600714"/>
       
        <?php wp_head(); ?>
    </head>

    <body <?php body_class('mg'); ?>>
        <div id="page" class="site">

            <!-- Start Modal Home -->
            <div class="mg__modal" data-modal>
                <!-- Modal APP -->
                <div class="mg__modal__content" data-modal-notes>
                    <div class="modal-content-box light-box">
                        <div class="modal-content-box__top">
                            <h1 class="heading-section text-color-white">Contenido APP</h1>
                            <button class="button button--close" data-button-close-modal >X</button>
                        </div>
                        <div class="light-box__image"><img src="<?php echo get_template_directory_uri(); ?>/images/lightbox.jpg" alt="lightbox"></div>
                        <div class="light-box__content">
                            <p class="text-note text-color-white"></p>
                            <div class="light-box__buttons">
                                <a class="link-1 button--playstore" href="" target="_blank"></a>
                                <a class="link-1 button--appstore" href="" target="_blank"></a>
                                <a class="link-1 button--yellow button--pc" href="" target="_blank">Descargar en PC</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Interactivos -->
                <div class="mg__modal__content" data-modal-frame>
                    <div class="modal-content-box game-box">
                        <div class="modal-content-box__top">
                            <h1 class="heading-section text-color-white">Contenido Interactivo</h1>
                            <button class="button button--close" data-button-close-modal >X</button>
                        </div>
                        <div class="modal-content-box__content" data-frame-content>
                            <div class="modal-content-box__iframe-container"><iframe src=""></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Home -->
            <main class="mg__section-page mg__home-especial" data-page-modal>
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
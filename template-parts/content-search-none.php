<?php
/**
 * No resultados Buscador content-search-none.php
 *
 * @package maguare
 */
?>
<!-- Start Content page -->
<section class="section-page content-notes-list">
    <div class="standard-container">
        <h2 class="heading-page text-color-brown">
            No existen resultados para tu búsqueda, por favor intenta de nuevo
        </h2>
        <div class="search-inline-content-box">
            <div class="search-inline-content-box__content search-box">
                <div class="search-box__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/monkey-01.png" alt="monkey">
                </div>
                <div class="search-box__content">
                    <div class="search-box__heading">
                        <p class="text-note text-color-black">¡Saimiri te ayuda a encontrar lo que estás buscando! Escribe la palabra clave y selecciona el tipo de contenido que quieres.</p><br>
                    </div>
                    <div class="search-box__form">
                        <?php echo do_shortcode( '[wd_asp id=1]' );?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- standard container-->
</section> <!-- End section search none--><br><br><br><br><br><br>
<!-- Page Content page -->
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maguare
 */
    $ruta_imagenes_aliados =  get_stylesheet_directory_uri().'/images/aliados/';
?>

    </div><!-- #content -->

        <!-- Start Footer -->
        <footer id="colophon" class="footer">
        
        <div class="container aliados_maguared">
  <h1 class="heading-note text-color-brown aliados-izquierda">Amigos de Maguaré</h1>
  
   <section class="customer-logos slider">
       <div class="aliado_mag slide">
        <a href="https://www.icbf.gov.co/bienestar/primera-infancia" target="_blank" title="Instituto Colombiano de Bienestar Familiar (ICBF)">
        <img src="<?php echo $ruta_imagenes_aliados; ?>icbf.jpg"" alt="Instituto Colombiano de Bienestar Familiar (ICBF)">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://www.aeiotu.com/" target="_blank" title="aeioTU">
        <img src="<?php echo $ruta_imagenes_aliados; ?>aeiotu.jpg"" alt="aeioTU">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="http://www.computadoresparaeducar.gov.co/" target="_blank" title="Computadores para educar">
        <img src="<?php echo $ruta_imagenes_aliados; ?>computadorescpe.jpg"" alt="Computadores para educar">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://medellin.edu.co/buen-comienzo/inicio-buen-comienzo" target="_blank" title="Programa Buen Comienzo">
        <img src="<?php echo $ruta_imagenes_aliados; ?>buencomienzo.jpg"" alt="Programa Buen Comienzo">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://fundalectura.org/" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>fundalectura-negro.jpg"" alt="">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://www.misenal.tv/" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>misenal.jpg"" alt="">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://fiestadellibroylacultura.com/" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>fiestadellibro.jpg"" alt="">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://camlibro.com.co/" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>camaracolombianadellibro.jpg"" alt="">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://www.facebook.com/zorroconejo/" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>zorroconejo.jpg"" alt="">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://www.caroycuervo.gov.co/" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>caroycuervo.jpg"" alt="">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://www.colsubsidio.com/afiliados/cultura-y-ciencia/red-de-bibliotecas" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>colsubsidio.jpg"" alt="">
        </a>
    </div>
    <div class="aliado_mag slide">
        <a href="https://www.cafam.com.co/cultura/Paginas/personas.aspx" target="_blank" title="">
        <img src="<?php echo $ruta_imagenes_aliados; ?>cafam.jpg"" alt="">
        </a>
    </div>
   </section>

        </div>
            <div class="section-page__wrapper"> 
                
                <div class="footer__buttons">
                    <a class="link-1 button--dashed__brown" href="<?php echo get_site_url();?>/terminos-condiciones/">Términos y condiciones</a>
                    <a class="link-1 button--dashed__brown" href="<?php echo get_site_url();?>/habeas-data/">Habeas data</a>
                    <a class="link-1 button--dashed__brown" href="<?php echo get_site_url();?>/acerca-de/">Acerca de</a>
                    <a href="<?php echo get_site_url();?>/mapa-del-sitio" class="link-1 button--dashed__brown">Mapa del sitio</a>
                </div>
                <p class="footer__legal text-section text-color-brown"><?php echo get_theme_mod( 'maguare_datos_contacto_creditos');?></p>
                
            </div>
            <div class="logos-maguare-institucionales">
                <div><a href="http://www.mincultura.gov.co/" target="_blank" title="Ministerio de Cultura"><img src="<?php echo get_template_directory_uri(); ?>/images/logosfooter/logo371x102maguare.png" alt="Logo Gobierno de Colombia"></a></div>
                <div><a href="http://unimedios.unal.edu.co/" target="_blank" title="Unimedios - Universidad Nacional de Colombia"><img src="<?php echo get_template_directory_uri(); ?>/images/logosfooter/unimedios.png" alt="Logo Unimedios - Universidad Nacional de Colombia"></a></div>
                <div><a href="http://www.deceroasiempre.gov.co/Paginas/deCeroaSiempre.aspx" target="_blank" title="De cero a Siempre"><img src="<?php echo get_template_directory_uri(); ?>/images/logosfooter/cero.png" alt="Logo De Cero a Siempre" class="bnimage"></a></div>
                <div><a href="http://www.mincultura.gov.co/leer-es-mi-cuento/Paginas/default.aspx" target="_blank" title="Leer es mi cuento"><img src="<?php echo get_template_directory_uri(); ?>/images/logosfooter/leer.png" alt="Logo Leer es mi cuento" class="bnimage"></a></div>
                <div><a href="https://maguare.gov.co" target="_self" title="Descubre, imagina y crea con Maguaré"><img src="<?php echo get_template_directory_uri(); ?>/images/logosfooter/maguare.png" alt="Logo Maguaré" ></a></div>
                <div><a href="https://maguared.gov.co" target="_blank" title="MaguaRED - Cultura y primera infancia en la red"><img src="<?php echo get_template_directory_uri(); ?>/images/logosfooter/maguared.png" alt="Logo MaguaRED" ></a></div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/logosfooter/premio.png" alt="logo"></div>
            </div> 
            
        </footer><!-- #colophon -->
        <div class="link-loorlab">
            <div class="section-page__wrapper">
              <a href="http://www.loorlab.com/" target="_blank">Diseño § Desarrollo | <span>www.loorlab.com</span></a>
            </div>
         </div>
        <!-- End Footer -->
    </main>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

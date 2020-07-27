<?php
/**
 * maguare functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package maguare
 */

if ( ! function_exists( 'maguare_setup' ) ) :
/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function maguare_setup() {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on maguare, use a find and replace
		 * to change 'maguare' to the name of your theme in all the template files.
		 */
    load_theme_textdomain( 'maguare', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support( 'title-tag' );

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'maguare' ),
    ) );

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'maguare_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
endif;
add_action( 'after_setup_theme', 'maguare_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function maguare_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'maguare_content_width', 640 );
}
add_action( 'after_setup_theme', 'maguare_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function maguare_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'maguare' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'maguare' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'maguare_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function maguare_scripts() {

    // Load jquery.bxslider.css 4.2.12
    wp_enqueue_style( 'maguare-bxslider', esc_url_raw( '//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css' ), array(), null );

    wp_enqueue_style( 'maguare-style', get_stylesheet_uri() );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Load our main JavaScript

    // wavesurfer v1.4.0 JS
    wp_enqueue_script( 'maguare-wavesurfer-js', get_template_directory_uri() . '/js/wavesurfer.min.js', array(), '1.4.0', true );
    //CDN wp_enqueue_script('maguare-wavesurfer-js', '//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js', array(), '1.4.0', true);

    // jQuery v3.2.1 JS
    //wp_enqueue_script( 'maguare-jquery-js', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '3.2.1', true );
    //CDN 
    wp_enqueue_script('maguare-jquery-js', '//code.jquery.com/jquery-1.12.4.min.js', array(), '1.12.4', true);

    // jQuery bxslider v4.2.12 JS
    //wp_enqueue_script( 'maguare-bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), '4.2.12', true );
    wp_enqueue_script( 'maguare-bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.4.2.15.js', array(), '4.2.15', true );
    
    //CDN  wp_enqueue_script('maguare-bxslider-js', '//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array(), '4.2.12', true);

    // Script Maguare JS
    //wp_enqueue_script( 'maguare-maguare-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'maguare_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
* Cambiar Nombre por defecto WordPress desde el envio de email
*/

add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from($old) {
    return 'info@maguare.gov.co';
}
function new_mail_from_name($old) {
    return 'MinCultura-Saimiri-Maguaré';
}

/**
* CATEGORY SINGLE TEMPLATES :: single-{category_slug}.php
*/
add_filter( 'single_template', create_function( '$t', 'foreach( (array) get_the_category() as $cat ) {
        if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-{$cat->slug}.php";
    } return $t;' ) );

/**
* FIX HTTP MEDIA 
*/
add_filter( 'wp_image_editors', 'change_graphic_lib' );
function change_graphic_lib($array) {
    return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}

/**
* Move Yoast to bottom
*/
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/**
 * Conexión PHP - JS
 */
add_action( 'wp_enqueue_scripts', 'variables_php_js');
// Función de puesta en cola
function variables_php_js(){
    global $secciones , $duracion_despliegues , $link , $post;

    // Random Contenidos Maguaré
    /*$args = new WP_Query(array(
        'post_type'             => array( 'post' ),
        'posts_per_page' 		=> '1',
        'no_found_rows' 		=> true,
        'meta_key'              => 'duracion',
        'meta_value'            => '',
        'meta_compare'          => '!=',
        'orderby'				=> 'rand',
        'ignore_sticky_posts' 	=> true,
    ));*/
    
    // Validación de object para variable global $post
    $post = is_singular() ? get_queried_object() : false;    
    if ( ! empty($post) && is_a($post, 'WP_Post') ) {
        
        // Random Relacionados Maguaré
        $custom_taxterms = wp_get_object_terms( $post->ID, 'relacionados_maguare', array('fields' => 'ids') );

        $args = new WP_Query(array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => '1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'relacionados_maguare',
                    'field' => 'id',
                    'terms' => $custom_taxterms
                )
            ),
            'post__not_in' => array ($post->ID),
            'orderby'	   => 'rand',
            'ignore_sticky_posts' 	=> true,
        ));   

        if ( $args->have_posts() ) :
        while ( $args->have_posts() ) : $args->the_post();
        $link = get_permalink(); 
        endwhile;
        endif; wp_reset_query();

        // Obtener Duración de despliegues
        $duracion_despliegues = get_field('duracion'); 
        if(is_null($duracion_despliegues ) || $duracion_despliegues=="Indefinido" ){ $duracion_despliegues = "notime";}
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url,'?') !== false) {
            $duracion_despliegues = "notime";
        }

        // Secciones Maguaré 
        $secciones = get_field('seccion');
        if(is_null($secciones )){ $secciones = "home-seccion";}
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url,'?') !== false) {
            $secciones = "home-seccion";
        }

        // ID Video YouTube
        $link_youtube = get_field('url_video', $post->ID);
        $loc = explode( "/", $link_youtube  );
        $videoid = end($loc);


        // Envio de variables JS
        wp_enqueue_script( 'variables-php-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
        wp_localize_script( 'variables-php-js', 'secciones',array(
            'url'       => $link,
            'categoria' => $secciones,
            'id_video_youtube' => $videoid,
            'url_duracion' => $duracion_despliegues
        )
                          );

    }  // Fin Validación de object para variable global $post
} // Fin Función Envio de Variables PHP / JS

/**
* Relacionados Maguaré
*/
function relacionados_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Relacionados', 'Nombre general de taxonomía', 'maguare' ),
        'singular_name'              => _x( 'Relacionado', 'Nombre Singular de Taxonomía', 'maguare' ),
        'menu_name'                  => __( 'Relacionados Maguaré', 'maguare' ),
        'all_items'                  => __( 'Todos los items', 'maguare' ),
        'parent_item'                => __( 'Item Padre', 'maguare' ),
        'parent_item_colon'          => __( 'Item Padre:', 'maguare' ),
        'new_item_name'              => __( 'Nombre de nuevo Item', 'maguare' ),
        'add_new_item'               => __( 'Añadir nuevo Item', 'maguare' ),
        'edit_item'                  => __( 'Editar Item', 'maguare' ),
        'update_item'                => __( 'Actualizar Item', 'maguare' ),
        'view_item'                  => __( 'Ver Item', 'maguare' ),
        'separate_items_with_commas' => __( 'Separar items con comas', 'maguare' ),
        'add_or_remove_items'        => __( 'Añadir o eliminar items', 'maguare' ),
        'choose_from_most_used'      => __( 'Seleccionar el item más usado', 'maguare' ),
        'popular_items'              => __( 'Items Populares', 'maguare' ),
        'search_items'               => __( 'Items de búsqueda', 'maguare' ),
        'not_found'                  => __( 'No Encontrado', 'maguare' ),
        'no_terms'                   => __( 'No existen items', 'maguare' ),
        'items_list'                 => __( 'Lista de Items', 'maguare' ),
        'items_list_navigation'      => __( 'Lista de navegación de Items', 'maguare' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'relacionados_maguare', array( 'post' ), $args );

}
add_action( 'init', 'relacionados_taxonomy', 0 );

/**
 * ACF Opciones Maguaré
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Opciones Maguaré',
        'menu_title'	=> 'Opciones Maguaré',
        'menu_slug' 	=> 'opciones-maguare',
        'capability'	=> 'edit_posts',
        'redirect'		=> true
    ));

    // Menú Principal
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Menu Principal',
        'menu_title'	=> 'Menu Principal',
        'parent_slug'	=> 'opciones-maguare',
    ));

    // Reportes Maguaré
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Reportes Maguaré',
        'menu_title'	=> 'Reportes Maguaré',
        'parent_slug'	=> 'opciones-maguare',
    ));



}

/**
* Display n post WordPress tags
*/
add_action('pre_get_posts','myfunc');
function myfunc($query){ 
    if ($query->is_main_query() && $query->is_archive){
        $query->set( 'posts_per_page', 1000);
    }
    return $query;
}

/**
* Exclude pages from WordPress Search
*/
if (!is_admin()) {
    function wpb_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts','wpb_search_filter');
}
function muestra_autor(){
    if(get_field('interprete_autor')){
        echo '<p class="autoria_maguared">';
        echo the_field('interprete_autor');
        echo '</p>';
    }
}

function muestra_lindo_boton(){
    if(get_field('mag_contenido_relacionado_maguared')){
        $enlace = get_field('mag_contenido_relacionado_maguared');
        ?>
            <a class="button actividad_sugerida_button button--yellow" href="<?php echo $enlace;?>"
            target="_blank">
            Explorar contenidos relacionados
            </a>
        <?php
    }
}

function maguare_aliados_carrusel(){
    wp_enqueue_script('slickjs', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
    wp_enqueue_script('aliados', get_stylesheet_directory_uri() . '/js/aliados.js');
}
add_action('wp_enqueue_scripts', 'maguare_aliados_carrusel');

/* function aliados_maguare(){
    wp_enqueue_style('aliados-css', get_stylesheet_directory_uri() . '/css/aliados.css');
}
add_action( 'wp_enqueue_scripts', 'aliados_maguare' ); */

add_action( 'wp_enqueue_scripts', 'cultura_estilos_css', 20 );
function cultura_estilos_css() {
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/maguare.css' );
}


require_once get_stylesheet_directory() . '/funcionesmaguared/generales.php';
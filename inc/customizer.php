<?php
/**
 * maguare Theme Customizer
 *
 * @package maguare
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function maguare_customize_register( $wp_customize ) {
    
    
    // Logo upload header - Footer Institucional
    $wp_customize->add_section( 'maguare_logos_header_institucionales_section' , array(
	    'title'       => __( 'Logos Header - Footer Institucional', 'maguare' ),
	    'priority'    => 30,
	    'description' => 'Subir Logos Header - Footer Institucionales  Tamaños recomendados Logos :                                                                                                                                <br>Logo 1 - Bienvenida : <br><b>Ancho: 157px -  Alto: 147px</b> 
                            <br>Logo 2 - Maguared : <br><b>Ancho: 124px -  Alto: 29px</b>
                            <br>Logo 3 - Maguaré Footer : <br><b>Ancho: 86px -  Alto: 65px</b>
                            <br>Logo 4 - Institucional Footer : <br><b>Ancho: 243px -  Alto: 29px</b>',
	) );
    
    // Logo 1
	$wp_customize->add_setting( 'maguare_logo_1_institucional_header', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'maguare_logo_1_institucional_header', array(
		'label'    => __( 'Subir Logo 1', 'maguare_logo_1_institucional_header' ),
		'section'  => 'maguare_logos_header_institucionales_section',
		'settings' => 'maguare_logo_1_institucional_header',
	) ) );
    
    // URL LOGO 1
    $wp_customize->add_setting( 'maguare_logo_1_url_institucional_header' , array(
        'default'     => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maguare_logo_1_url_institucional_header', array(
        'label'        => __( 'URL Logo 1', 'maguare' ),
        'section'    => 'maguare_logos_header_institucionales_section',
        'settings'   => 'maguare_logo_1_url_institucional_header',
    ) ) );
    
    // Logo 2
    $wp_customize->add_setting( 'maguare_logo_2_institucional_header', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'maguare_logo_2_institucional_header', array(
		'label'    => __( 'Subir Logo 2', 'maguare_logo_2_institucional_header' ),
		'section'  => 'maguare_logos_header_institucionales_section',
		'settings' => 'maguare_logo_2_institucional_header',
	) ) );
    
    // URL LOGO 2
    $wp_customize->add_setting( 'maguare_logo_2_url_institucional_header' , array(
        'default'     => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maguare_logo_2_url_institucional_header', array(
        'label'        => __( 'URL Logo 2', 'maguare' ),
        'section'    => 'maguare_logos_header_institucionales_section',
        'settings'   => 'maguare_logo_2_url_institucional_header',
    ) ) );
    
    // Logo 3
    $wp_customize->add_setting( 'maguare_logo_3_institucional_header', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'maguare_logo_3_institucional_header', array(
		'label'    => __( 'Subir Logo 3', 'maguare_logo_3_institucional_header' ),
		'section'  => 'maguare_logos_header_institucionales_section',
		'settings' => 'maguare_logo_3_institucional_header',
	) ) );
    
    // URL LOGO 3
    $wp_customize->add_setting( 'maguare_logo_3_url_institucional_header' , array(
        'default'     => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maguare_logo_3_url_institucional_header', array(
        'label'        => __( 'URL Logo 3', 'maguare' ),
        'section'    => 'maguare_logos_header_institucionales_section',
        'settings'   => 'maguare_logo_3_url_institucional_header',
    ) ) );
    
    // Logo 4
    $wp_customize->add_setting( 'maguare_logo_4_institucional_header', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'maguare_logo_4_institucional_header', array(
		'label'    => __( 'Subir Logo 4', 'maguare_logo_4_institucional_header' ),
		'section'  => 'maguare_logos_header_institucionales_section',
		'settings' => 'maguare_logo_4_institucional_header',
	) ) );
    
    // URL LOGO 4
    $wp_customize->add_setting( 'maguare_logo_4_url_institucional_header' , array(
        'default'     => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maguare_logo_4_url_institucional_header', array(
        'label'        => __( 'URL Logo 4', 'maguare' ),
        'section'    => 'maguare_logos_header_institucionales_section',
        'settings'   => 'maguare_logo_4_url_institucional_header',
    ) ) );
    
    // Redes Sociales - Header
	$wp_customize->add_section( 'maguare_social_section' , array(
	    'title'       => __( 'Redes Sociales', 'maguare' ),
	    'priority'    => 30,
	    'description' => 'Ingrese la URL correspondiente a cada Red Social.',
	) );
	
	// Facebook
	$wp_customize->add_setting( 'url_social_facebook' , array(
		'default'     => '',
		'sanitize_callback' => 'esc_url_raw',
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'url_social_facebook', array(
		'label'        => __( 'Facebook URL', 'maguare' ),
		'section'    => 'maguare_social_section',
		'settings'   => 'url_social_facebook',
	) ) );

	//Twitter
	$wp_customize->add_setting( 'url_social_twitter' , array(
		'default'     => '',
		'sanitize_callback' => 'esc_url_raw',
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'url_social_twitter', array(
		'label'        => __( 'Twitter URL', 'maguare' ),
		'section'    => 'maguare_social_section',
		'settings'   => 'url_social_twitter',
	) ) );
    
    //Instagram
	$wp_customize->add_setting( 'url_social_instagram' , array(
		'default'     => '',
		'sanitize_callback' => 'esc_url_raw',
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'url_social_instagram', array(
		'label'        => __( 'Instagram URL', 'maguare' ),
		'section'    => 'maguare_social_section',
		'settings'   => 'url_social_instagram',
	) ) );
    
    //YouTube
	$wp_customize->add_setting( 'url_social_youtube' , array(
		'default'     => '',
		'sanitize_callback' => 'esc_url_raw',
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'url_social_youtube', array(
		'label'        => __( 'YouTube URL', 'maguare' ),
		'section'    => 'maguare_social_section',
		'settings'   => 'url_social_youtube',
	) ) );
    
    // Datos Contacto Maguaré
    $wp_customize->add_section( 'maguare_datos_contacto_section' , array(
		'title'      => __( 'Datos de Contacto Maguaré', 'maguare' ),
		'priority'    => 40,
		'description' => 'Aquí debe ingresar relacionados con Maguaré',
	) );
    
    // Créditos Footer
	$wp_customize->add_setting( 'maguare_datos_contacto_creditos' , array(
		'default'     => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maguare_datos_contacto_creditos', array(
		'label'        => __( 'Ingrese Texto Footer ', 'maguare' ),
		'section'    => 'maguare_datos_contacto_section',
		'settings'   => 'maguare_datos_contacto_creditos',
	) ) );
    
    // Logo upload header
    $wp_customize->add_section( 'maguare_logo_header_section' , array(
	    'title'       => __( 'Logo Header', 'maguare' ),
	    'priority'    => 30,
	    'description' => 'Subir Logo Header . El mejor tamaño para el logo es Ancho: 157px, Alto: 147px.',
	) );
	$wp_customize->add_setting( 'maguare_logo_header', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'maguare_logo_header', array(
		'label'    => __( 'Logo', 'maguare_logo_header' ),
		'section'  => 'maguare_logo_header_section',
		'settings' => 'maguare_logo_header',
	) ) );
    
    
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'maguare_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'maguare_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'maguare_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function maguare_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function maguare_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function maguare_customize_preview_js() {
	wp_enqueue_script( 'maguare-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'maguare_customize_preview_js' );

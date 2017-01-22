<?php
/**
 * Simple Professional Theme Customizer
 *
 * @package Simple Professional
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simpleprofessional_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// add theme background color picker
	$wp_customize->add_section( 'simpleprofessional_theme_colors', array(
		'title' => __( 'SP Theme Colors', 'simpleprofessional' ),
		'priority' => 100,
	) );

	// add color picker setting
	$wp_customize->add_setting( 'sp_background_color', array(
		'default' => '#ffffff'
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_background_color', array(
		'label' => 'Simple Professional Theme Background Color',
		'section' => 'simpleprofessional_theme_colors',
		'settings' => 'sp_background_color',
	) ) );
}
add_action( 'customize_register', 'simpleprofessional_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simpleprofessional_customize_preview_js() {
	wp_enqueue_script( 'simpleprofessional_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simpleprofessional_customize_preview_js' );

function simpleprofessional_customizer_head_styles() {
	$sp_background_color = get_theme_mod( 'sp_background_color' ); 
	
	if ( $sp_background_color != '#ff0000' ) :
	?>
		<style type="text/css">
			#page, #page-inner, body {
				background-color: <?php echo $sp_background_color; ?>;
			}
		</style>
	<?php
	endif;
}
add_action( 'wp_head', 'simpleprofessional_customizer_head_styles' );




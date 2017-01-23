<?php 

/* Add theme logo */

function simpleprofessional_add_logo(){
	$args = array(
		'width'         => 150,
		'height'        => 100,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
		'uploads'       => true,
	);
	add_theme_support( 'custom-header', $args );
}

add_action( 'after_setup_theme', 'simpleprofessional_add_logo' );


?>
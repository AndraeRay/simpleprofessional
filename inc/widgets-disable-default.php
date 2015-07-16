<?php

/**
 * Remove default wordpress widgets
 *
 * @package Simple Professional
 */

remove_action( 'init', 'wp_widgets_init', 1 );
add_action( 'init', function() { do_action( 'widgets_init' ); }, 1 );


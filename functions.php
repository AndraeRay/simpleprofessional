<?php
/**
 * Simple Professional functions and definitions
 *
 * @package Simple Professional
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'simpleprofessional_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simpleprofessional_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Simple Professional, use a find and replace
	 * to change 'simpleprofessional' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'simpleprofessional', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'simpleprofessional' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'simpleprofessional_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // simpleprofessional_setup
add_action( 'after_setup_theme', 'simpleprofessional_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function simpleprofessional_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Default Sidebar', 'simpleprofessional' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$args = array(
		'name'          => __('SP Sidebar %d'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	);

	register_sidebar( array(
		'name'          => 'Homepage Widget Area',
		'id'            => 'sp-homepage-widget-area',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebars( 2, $args );
}

add_action( 'widgets_init', 'simpleprofessional_widgets_init' );

function simpleprofessional_load_no_sidebar_styles() {
	wp_enqueue_style( 'content-nosidebar', get_template_directory_uri() . '/layouts/content-nosidebar.css', false, '1.1', 'all' );
}

function simpleprofessional_load_sidebar_styles() {

	$left_sidebar = file_get_contents(get_template_directory().'/css/layout/sidebar-content.css');
	$right_sidebar = file_get_contents(get_template_directory().'/css/layout/content-sidebar.css');
	if( get_option('sidebar-position', 'left') == 'left' ) {
		$sidebar = $left_sidebar;
	} else {
		$sidebar = $right_sidebar;
	}

	?>
	<style type="text/css">
		<?php echo $sidebar; ?>
	</style>
	<?php
}

add_action('wp_head', 'simpleprofessional_load_sidebar_styles');


/**
 * Enqueue scripts and styles.
 */

function simpleprofessional_scripts() {

	wp_enqueue_script('jquery');

	wp_enqueue_style( 'poppins_google', 'https://fonts.googleapis.com/css?family=Poppins:300,500', false, '1.1', 'all' );

	wp_enqueue_style( 'simpleprofessional-style', get_stylesheet_uri() );

	wp_enqueue_script( 'simpleprofessional-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'simpleprofessional-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'simpleprofessional-common', get_template_directory_uri() . '/js/common.js', array(), '20160906', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simpleprofessional_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * wpi_stylesheet_uri
 * overwrite default theme stylesheet uri
 * filter stylesheet_uri
 * @see get_stylesheet_uri()
 */
function wpi_stylesheet_uri($stylesheet_uri, $stylesheet_dir_uri){

    return $stylesheet_dir_uri.'/css/style.css';
}
add_filter('stylesheet_uri','wpi_stylesheet_uri',10,2);

/**
 * Remove Default wordpess widgets
 */
require get_template_directory() . '/inc/widgets-disable-default.php';

/**
 * Post helpers
 */
require get_template_directory() . '/inc/post-helpers.php';

/**
 * Random testimonial widget
 */
require  get_template_directory() . '/inc/widget_random_testimonial.php';

/**
*
*/

/**
*	Add logo to theme
*/

require get_template_directory() . '/inc/theme-logo.php';


/**
*	Add theme options page
*/

require get_template_directory() . '/inc/theme-options.php';


/***
* Remove Emojis
*/
remove_action( 'wp_print_styles', 'print_emoji_styles');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );



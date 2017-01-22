<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Simple Professional
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div id="page-header">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
				<div class="clear-fix"></div>
			</div><!-- .site-branding -->

			<?php $github_url = get_option('github_url'); 
			$linkedin_url = get_option('linkedin_url');
			$phone_number = get_option('phone_number'); ?>
			<?php if ( $github_url || $linkedin_url || $phone_number ) : ?>
				<span class="header-social">
					<?php if ($github_url) : ?>
						<a href="<?php echo $github_url ?>" target="_blank"><span class="icon github"></span></a>
					<?php endif ?>
					<?php if ($linkedin_url) : ?>
						<a href="<?php echo $linkedin_url ?>" target="_blank"><span class="icon linkedin"></span></a>
					<?php endif ?>
					<?php if ($phone_number) : ?>
						<a href="tel:+<?php echo $phone_number ?>"<span class="phone_number"><?php echo $phone_number ?></span></a>
					<?php endif ?>
				</span>
			<?php endif; ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( '', 'simpleprofessional' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	</div>
	<div id="page-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'simpleprofessional' ); ?></a>

		<div id="content" class="site-content">

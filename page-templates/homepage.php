<?php
/**
 *
 * Template Name: Homepage template
 *
 * @package Simple Professional
 */

get_header(); ?>



<?php if ( is_active_sidebar( 'sp-homepage-widget-area' ) ) : ?>
	<div id="homepage-widget-area" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sp-homepage-widget-area' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

<?php get_footer(); ?>

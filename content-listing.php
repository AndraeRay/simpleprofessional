<?php
/**
 * @package Simple Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php simpleprofessional_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			$term = get_field('category');
		?>
		<?php the_content(); ?>

				<?php
					$args = array( 'post_type' => 'sp_listing', 'posts_per_page' => 10, 'cat' => $term );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					  // the_title();
					  // echo '<div class="entry-content">';
					  // the_content();
					  // echo '</div>';
					  get_template_part( 'listing', 'body' );
					endwhile;
				?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'simpleprofessional' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php simpleprofessional_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

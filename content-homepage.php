<?php
/**
 * @package Simple Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<?php the_content(); ?>
				<?php edit_post_link( __( 'Edit', 'simpleprofessional' ), '<span class="edit-link">', '</span>' ); ?>


	</header><!-- .entry-header -->

	<?php 
		$args = array( 'post_type' => 'post', 'posts_per_page' => 1, 'cat' => $term );
					$loop = new WP_Query( $args ); 
	?>
	<?php if ($loop->have_posts()) :?>
		<hr>
		<span> Check out my most recent blog post: </span>
	<?php endif ?>
	<div class="entry-content">
		<?php 
			$term = get_field('category');
		?>

				<?php
					while ( $loop->have_posts() ) : $loop->the_post();
					  the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
					  echo '<div class="entry-content">';
					  the_content();
					  echo '</div>';
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

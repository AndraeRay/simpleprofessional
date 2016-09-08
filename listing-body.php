<?php
/**
 * @package Simple Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<div class="entry-meta">
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php 

		$image = get_field('image');

		if( !empty($image) ): ?>
		<div class="listing-container">
			<section class="left-33"> 
				<img src="<?php echo $image['url']; ?>" align="middle" alt="<?php echo $image['alt']; ?>" />
			</section>
			<section class="right-66">
				<h2><?php the_title(); ?></h2>
				<span class="Desc"> description </span>
				<span class="additional"> Technologies used </span>
			 </section>
			 <div class="clear-fix"></div>
		</div>
		<?php else: ?>
			<div class="listing-container">
				<section class="right-100">
					<h2><?php the_title(); ?></h2>
					<span class="Desc"> description </span>
					<span class="additional"> Technologies used </span>
				 </section>
				 <div class="clear-fix"></div>
			</div>
		<?php endif; ?>



		<?php the_content(); ?>

		<?php 
		$desc = get_field('description');

		echo $desc;
		?>

	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'simpleprofessional' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post-## -->

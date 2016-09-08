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
		$link = get_field('link');
		$desc = get_field('description'); ?>


		<div class="listing-container">
		<?php if( !empty($image) ): ?>
			<section class="left-33"> 
				<?php if ( !empty($link)) : echo "<a href='$link' target='_blank'>"; endif; ?>
					<img src="<?php echo $image['url']; ?>" align="middle" alt="<?php echo $image['alt']; ?>" />
				<?php if ( !empty($link)) : echo "</a>"; endif; ?>
			</section>
			<section class="right-66">
		<?php else: ?>
				<section class="right-100">
		<?php endif; ?>
					<?php if ( !empty($link)) : echo "<a href='$link' target='_blank'>"; endif; ?>
					<h2><?php the_title(); ?></h2>
					<?php if ( !empty($link)) : echo "</a>"; endif; ?>
					<span class="Desc"> <?php echo $desc; ?> </span>
					<span class="additional"> Technologies used </span>
				 </section>
				 <div class="clear-fix"></div>
			</div>


	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'simpleprofessional' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post-## -->

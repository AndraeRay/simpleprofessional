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

		?>


		<div class="listing-container equalH-parent">
		<?php if( !empty($image) ): ?>
			<section class="sp-col w25 equalH-dependent"> 
				<span class="img-helper">
				<?php if ( !empty($link)) : echo "<a href='$link' target='_blank'>"; endif; ?>
					<img src="<?php echo $image['url']; ?>" align="middle" alt="<?php echo $image['alt']; ?>" />
				<?php if ( !empty($link)) : echo "</a>"; endif; ?>
				</span>
			</section>
			<section class="sp-col w75 equalH-free">
		<?php else: ?>
				<section class="sp-col w100">
		<?php endif; ?>
					<?php if ( !empty($link)) : echo "<a href='$link' target='_blank'>"; endif; ?>
					<h2><?php the_title(); ?></h2>
					<?php if ( !empty($link)) : echo "</a>"; endif; ?>
					<span><?php the_content(); ?></span>
					<span class="additional"> Technologies used </span>
				 </section>
				 <div class="clear-fix"></div>
			</div>


	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'simpleprofessional' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post-## -->

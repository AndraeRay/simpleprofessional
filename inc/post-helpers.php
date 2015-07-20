<?php

/**
 * Post Helpers
 *
 * @package Simple Professional
 */


/**
 * Returns a random offset for given post type
 * @param string type - Custom post type
 * @return int a random intergerget to offset post types
 */
function get_random_post_offset( $post_type ){
	$post_count_obj = wp_count_posts($post_type);
	$num_posts = $post_count_obj->publish;
	$random_offset = rand(0, $num_posts - 1);
	return $random_offset;
};

/**
 * Does post lookup and displays posts
 */
function sp_retrieve_post($post_type, $posts_per_page, $offset) {
	$query_args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page, 'offset' => $offset );
	$loop = new WP_Query( $query_args );
	while ( $loop->have_posts() ) : $loop->the_post();
	  the_title();
	  echo '<div class="entry-content">';
	  the_content();
	  echo '</div>';
	endwhile;
};